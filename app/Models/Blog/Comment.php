<?php

namespace App\Models\Blog;

use App\Models\Users\User;
use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'user_id',
		'post_id',
		'content',
		'active'
	];

	public function getShortContent()
	{
		return str_limit( $this->getAttribute( 'content' ), 20 );
	}

	public function getUserImage()
	{
		return 'http://placehold.it/100x100';
	}

	public function getPostShortName() {
		return $this->post->getShortName();
	}

	public function getUserShortName() {
		return $this->user->getShortName();
	}

	public function getUserName() {
		return $this->user->getName();
	}

	public function getShortName() {
		return $this->getUserShortName();
	}

	// ******************** RELASHIONSHIP ******************************
	public function user()
	{
		return $this->belongsTo( User::class, 'user_id' );
	}

	public function post()
	{
		return $this->belongsTo( Post::class, 'post_id' );
	}
}