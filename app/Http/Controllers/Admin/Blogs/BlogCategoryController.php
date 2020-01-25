<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Blogs\BlogCategoryRequest;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class BlogCategoryController extends Controller {

	public $entity = "blog_categories";
	public $sex = "F";
	public $name = "Categoria do Blog";
	public $names = "Categorias do Blog";
	public $main_folder = 'admin.blog_categories';
	public $page = [];

	public function __construct( Route $route ) {
		$this->page = (object) [
			'entity'      => $this->entity,
			'main_folder' => $this->main_folder,
			'name'        => $this->name,
			'names'       => $this->names,
			'sex'         => $this->sex,
			'auxiliar'    => array(),
			'response'    => array(),
			'page_title'  => '',
			'main_title'  => '',
			'noresults'   => '',
			'tab'         => 'data',
			'breadcrumb'  => array(),
		];
		$this->breadcrumb( $route );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
		$this->page->response = BlogCategory::get()->map( function ( $s ) {
			return [
				'id'              => $s->id,
				'name'            => $s->getShortTitle(),
				'title'           => $s->getShortTitle(),
				'descriptions'    => $s->getShortDescriptions(),
				'n_posts'         => $s->getPostsCount(),
				'created_at'      => $s->getCreatedAtFormatted(),
				'created_at_time' => $s->getCreatedAtTime(),
				'active'          => $s->getActiveFullResponse()
			];
		} );

		return view( $this->main_folder . '.index' )
			->with( 'Page', $this->page );
	}

	/**
	 * Display the specified resource.
	 *
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id )
	{
		$BlogCategory = BlogCategory::findOrFail( $id );

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $BlogCategory );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Blogs\BlogCategoryRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( BlogCategoryRequest $request, $id )
	{
		$data = BlogCategory::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}
	/**
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Blogs\BlogCategoryRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( BlogCategoryRequest $request )
	{
		$data = BlogCategory::create( $request->all() );
		return $this->redirect( 'STORE', $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Blog\BlogCategory $BlogCategory
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( BlogCategory $BlogCategory ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $BlogCategory->getShortName() );
		$BlogCategory->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
