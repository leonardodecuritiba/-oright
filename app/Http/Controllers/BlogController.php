<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Works\BlogCategoryRequest;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\Post;
use App\Models\Works\Category;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class BlogController extends Controller {

	public $entity = "blogs";
	public $sex = "M";
	public $name = "Blog";
	public $names = "Blogs";
	public $main_folder = 'guest.blogs';
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
		$this->page->auxiliar = [
			'blog_categories' => BlogCategory::active()->get()->map( function ( $s ) {
				return [
					'id'        => $s->id,
					'title'     => $s->getShortTitle(),
					'n_post'    => $s->getPostsActiveCount(),
					'short_url' => $s->getShortUrl(),
				];}),
			'popular_posts' => Post::popularPosts()->get()->map( function ( $s ) {
				return [
					'id'            => $s->id,
					'title'         => $s->getShortTitle(),
					'image'         => $s->getShortImage(),//'http://placehold.it/730x511',
					'published_at'  => $s->published_at,
					'short_url'     => $s->getShortUrl(),
				];}),
		];
//		$this->breadcrumb( $route );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {

//		return view( 'guest.blog.index' );
		$this->page->response = Post::active()->get()->map( function ( $s ) {
			return [
				'id'                 => $s->id,
				'title'              => $s->getShortTitle(),
				'short_content'      => $s->getShortContent(),
				'image'              => $s->getShortImage(),//'http://placehold.it/730x511',
				'n_comments_text'    => $s->getCommentsActiveCountText(),
				'tags'               => $s->getTags(),
				'published_at'       => $s->published_at,
				'created_at'         => $s->created_at,
				'short_url'          => $s->getShortUrl(),
			];
		} );


		//http://placehold.it/730x511

		return view( $this->main_folder . '.index' )
			->with( 'Page', $this->page );

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  $name
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $name ) {
		$data = Post::findOrFailBySlugName($name);
		$data->visualize();

//		return $data->getComments();
		return view( $this->main_folder . '.show' )
			->with( 'Page', $this->page )
			->with( 'Data', $data );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  $name
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showCategory( $name ) {
		$data = BlogCategory::findOrFailBySlugName($name);

//		return $data->posts;
		$this->page->response = $data->postsActive->map( function ( $s ) {
			return [
				'id'                 => $s->id,
				'title'              => $s->getShortTitle(),
				'short_content'      => $s->getShortContent(),
				'image'              => $s->getShortImage(),//'http://placehold.it/730x511',
				'n_comments_text'    => $s->getCommentsActiveCountText(),
				'tags'               => $s->getTags(),
				'published_at'       => $s->published_at,
				'created_at'         => $s->created_at,
				'short_url'          => $s->getShortUrl(),
			];
		} );
//		return $data->getComments();

		return view( $this->main_folder . '.category' )
			->with( 'Page', $this->page )
			->with( 'Data', $data );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Works\BlogCategoryRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( BlogCategoryRequest $request, $id ) {
		$data = Category::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
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
