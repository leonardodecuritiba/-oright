<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Admin\Controller;
use App\Models\Blog\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class CommentController extends Controller {

	public $entity = "comments";
	public $sex = "M";
	public $name = "Comentário";
	public $names = "Comentários";
	public $main_folder = 'admin.comments';
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
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Blog\Comment $comment
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Comment $comment ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $comment->getShortName() );
		$comment->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
