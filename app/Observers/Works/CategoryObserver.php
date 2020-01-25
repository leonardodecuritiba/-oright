<?php

namespace App\Observers\Works;

use App\Models\Works\Category;
use Illuminate\Http\Request;

class CategoryObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Group deleting event.
	 *
	 * @param  \App\Models\Works\Category $category
	 *
	 * @return void
	 */
	public function deleting( Category $category ) {
		$category->works->each( function ( $w ) {
			$w->delete();
		} );
	}

}