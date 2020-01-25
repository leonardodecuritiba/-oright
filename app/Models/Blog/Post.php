<?php

namespace App\Models\Blog;

use App\Helpers\DataHelper;
use App\Models\Users\User;
use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	use SlugTrait;
	public $timestamps = true;
	protected $dates = ['published_at'];
	protected $fillable = [
		'creator_id',
		'category_id',
		'title',
		'slug_url',
		'content',
		'short_image',
		'short_content',
		'visualizations',
		'published_at',
		'active'
	];

	static public function getAlltoSelectList() {
		return self::get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortName()
			];
		} )->pluck( 'description', 'id' );
	}

	static public function popularPosts($limit = 3) {
		return self::orderBy('visualizations','DESC')->active()->limit($limit);
	}


	static public function getPath()
	{
		return 'uploads' . DIRECTORY_SEPARATOR . 'files'
		       . DIRECTORY_SEPARATOR . 'blog'
		       . DIRECTORY_SEPARATOR;
	}

	public function visualize()
	{
		$this->update(['visualizations', $this->attributes['visualizations']++ ]);
		$this->save();
	}

	public function deleteShortImage()
	{
		return File::Delete(Post::getPath() . $this->getOriginal('short_image'));
	}

	public function getShortImage($size = 'normal')
	{
		return asset(self::getPath() . $this->getAttribute('short_image'));
	}

	public function hasShortImage()
	{
		return ($this->getAttribute('short_image') != NULL);
	}

	public function getFullShortImagePath()
	{
		return public_path(self::getPath()) . $this->getAttribute('short_image');
	}

	public function setShortImageAttribute($file)
	{
		try {
			$filename = md5(time()) .'.'. $file->getClientOriginalExtension();
			$path = public_path(self::getPath());

			if($this->getOriginal('short_image') != NULL){ //DELETAR
				$this->deleteShortImage();
			}

			// ---------------- PATH ----------------------------
			$this->attributes['short_image'] = $filename;

			File::makeDirectory($path, $mode = 0777, true, true);
			$file->move($path, $filename);
		} catch (\Exception $e) {
			dd($e->getMessage());
			$this->attributes['cover'] = null;
			return false;
		}
		return true;
	}


	public function getPublishedAt($format = 'd F')
	{
		return $this->published_at->format($format);
	}

	public function getTags()
	{
		return [];
		return [
			[
				'title' => 'tag1',
				'url' => '#'
			],
			[
				'title' => 'tag2',
				'url' => '#'
			],
			[
				'title' => 'tag3',
				'url' => '#'
			]
		];
	}

	public function getShortUrl()
	{
		return route('blog.show',$this->attributes['slug_url']);
	}


	public function getCommentsCount()
	{
		return $this->comments->count();
	}

	public function getCommentsActiveCount()
	{
		return $this->commentsActive->count();
	}

	public function getCommentsActive()
	{
		return $this->commentsActive->map(function($c){
			return [
				'id'          => $c->id,
				'author_name' => $c->getUserName(),
				'author_image' => $c->getUserImage(),
				'content'     => $c->content,
				'created_at'  => $c->created_at,
			];
		});
	}


	public function getCommentsCountText()
	{
		$n = $this->getCommentsCount();
		if($n > 1){
			$text = $n . ' Comentários';
		} else if($n == 1){
			$text = $n . ' Comentário';
		} else {
			$text = 'Nenhum Comentário';
		}
		return $text;
	}


	public function getCommentsActiveCountText()
	{
		$n = $this->getCommentsActiveCount();
		if($n > 1){
			$text = $n . ' Comentários';
		} else if($n == 1){
			$text = $n . ' Comentário';
		} else {
			$text = 'Nenhum Comentário';
		}
		return $text;
	}

	public function getPublishedAtFormatted()
	{
		return DataHelper::getPrettyDateTime( $this->attributes['published_at'] );
	}

	public function getPublishedAtTime()
	{
		return strtotime( $this->attributes['published_at'] );
	}

	public function getShortContent()
	{
		return str_limit( $this->getAttribute( 'short_content' ), 120 );
	}


	public function getShortName()
	{
		return $this->getShortTitle();
	}

	public function getShortTitle()
	{
		return str_limit( $this->getAttribute( 'title' ), 20 );
	}

	// ******************** RELASHIONSHIP ******************************
	public function creator()
	{
		return $this->belongsTo( User::class, 'creator_id' );
	}
	public function category()
	{
		return $this->belongsTo( BlogCategory::class, 'category_id' );
	}
	public function comments()
	{
		return $this->hasMany( Comment::class, 'post_id' );
	}
	public function commentsActive()
	{
		return $this->comments()->active();
	}
}