<?php

namespace App\Observers\Blogs;

use App\Helpers\DataHelper;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}

	/**
	 * Listen to the Admin creating event.
	 *
	 * @param  \App\Models\Blog\Post $post
	 *
	 * @return void
	 */
	public function creating( Post $post ) {
		$post->creator_id = Auth::user()->id;

//		dd($this->request->file('short_image'));

//		$post->short_image = $this->request->file('short_image');

	}

	/**
	 * Listen to the Admin creating event.
	 *
	 * @param  \App\Models\Blog\Post $post
	 *
	 * @return void
	 */
	public function saving( Post $post ) {
		$post->slug_url = DataHelper::slugify($post->title);
	}

	/**
	 * Listen to the Group deleting event.
	 *
	 * @param  \App\Models\Blog\Post $post
	 *
	 * @return void
	 */
	public function deleting( Post $post ) {
		$post->comments->each( function ( $w ) {
			$w->delete();
		} );

		if (!empty($post->short_image)) {
			$post->deleteShortImage();
		}
	}

}