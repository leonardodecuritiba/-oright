<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Blog\CommentRequest;
use App\Models\Blog\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {


	/**
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Blog\CommentRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( CommentRequest $request )
	{
		$request->merge(['user_id' => Auth::user()->id]);
		$data = Comment::create( $request->all() );
		return redirect()->to($data->post->getShortUrl());
	}

}
