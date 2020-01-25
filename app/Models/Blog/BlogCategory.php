<?php

namespace App\Models\Blog;

use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	use SlugTrait;
	public $timestamps = true;
	protected $fillable = [
		'title',
		'slug_url',
		'descriptions',
		'active'
	];

	static public function getAlltoSelectList() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortName()
			];
		} )->pluck( 'description', 'id' );
	}

	public function getShortUrl()
	{
		return route('blog.category.show',$this->attributes['slug_url']);
	}

	public function getPostsActiveCount()
	{
		return $this->postsActive->count();
	}

	public function getPostsCount()
	{
		return $this->posts->count();
	}

	public function getShortName()
	{
		return $this->getShortTitle();
	}

	public function getShortTitle()
	{
		return str_limit( $this->getAttribute( 'title' ), 20 );
	}

	public function getShortDescriptions()
	{
		return str_limit( $this->getAttribute( 'descriptions' ), 20 );
	}
	// ******************** RELASHIONSHIP ******************************
	public function posts()
	{
		return $this->hasMany( Post::class, 'category_id' );
	}
	public function postsActive()
	{
		return $this->posts()->active();
	}
}