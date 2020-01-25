<?php

namespace App\Observers\Blogs;

use App\Helpers\DataHelper;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Blog\BlogCategory $blog_category
	 *
	 * @return void
	 */
	public function saving( BlogCategory $blog_category )
	{
		$blog_category->slug_url = DataHelper::slugify($blog_category->title);
	}
	/**
	 * Listen to the Group deleting event.
	 *
	 * @param  \App\Models\Blog\BlogCategory $blog_category
	 *
	 * @return void
	 */
	public function deleting( BlogCategory $blog_category ) {
		$blog_category->posts->each( function ( $w ) {
			$w->delete();
		} );
	}

}