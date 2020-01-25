<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Blogs\PostRequest;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class PostController extends Controller {

	public $entity = "posts";
	public $sex = "F";
	public $name = "Publicação";
	public $names = "Publicações";
	public $main_folder = 'admin.posts';
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
		$this->page->response = Post::get()->map( function ( $s ) {
			return [
				'id'              => $s->id,
				'name'            => $s->getShortTitle(),
				'title'           => $s->getShortTitle(),
				'published_at'      => $s->getPublishedAtFormatted(),
				'published_at_time' => $s->getPublishedAtTime(),
				'created_at'      => $s->getCreatedAtFormatted(),
				'created_at_time' => $s->getCreatedAtTime(),
				'n_comments'        => $s->getCommentsCount(),
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
		$this->page->auxiliar['blog_categories'] = BlogCategory::getAlltoSelectList();
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
		$Post = Post::findOrFail( $id );
		$this->page->auxiliar['blog_categories'] = BlogCategory::getAlltoSelectList();

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $Post );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Blogs\PostRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( PostRequest $request, $id ) {
		$data = Post::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}

	/**
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Blogs\PostRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( PostRequest $request )
	{
		$data = Post::create( $request->all() );
		return $this->redirect( 'STORE', $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Blog\Post $Post
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Post $Post ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $Post->getShortName() );
		$Post->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
