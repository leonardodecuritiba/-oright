<?php

namespace App\Observers\Blogs;

use App\Models\Blog\Comment;
use Illuminate\Http\Request;

class CommentObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Blog\Comment $comment
	 *
	 * @return void
	 */
	public function creating( Comment $comment )
	{
		$comment->active = 0;
	}


}