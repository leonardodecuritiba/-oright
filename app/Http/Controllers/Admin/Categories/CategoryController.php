<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Works\CategoryRequest;
use App\Models\Works\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class CategoryController extends Controller {

	public $entity = "categories";
	public $sex = "F";
	public $name = "Categoria";
	public $names = "Categorias";
	public $main_folder = 'admin.categories';
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
		$this->page->response = Category::get()->map( function ( $s ) {
			return [
				'id'              => $s->id,
				'name'            => $s->getShortName(),
				'title'           => $s->getShortTitle(),
				'descriptions'    => $s->getShortDescriptions(),
				'n_works'         => $s->getWorksCount(),
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
	public function edit( $id ) {
		$category = Category::findOrFail( $id );

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $category );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Works\CategoryRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( CategoryRequest $request, $id ) {
		$data = Category::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}
	/**
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Works\CategoryRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( CategoryRequest $request )
	{
		$data = Category::create( $request->all() );
		return $this->redirect( 'STORE', $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Works\Category $category
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Category $category ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $category->getShortName() );
		$category->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
