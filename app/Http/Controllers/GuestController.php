<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Works\BlogCategoryRequest;
use App\Models\Admins\Admin;
use App\Models\Blog\Post;
use App\Models\Cases\Casex;
use App\Models\Plans\Plan;
use App\Models\Users\User;
use App\Notifications\NotifyAdminContact;
use App\Notifications\NotifyAdminNewsletter;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Notification;

class GuestController extends Controller {

	public $page = [];

	public function __construct( Route $route ) {
		$this->page = (object) [
			'auxiliar'    => array(),
			'response'    => array(),
			'page_title'  => '',
			'main_title'  => '',
			'noresults'   => '',
			'tab'         => 'data',
			'breadcrumb'  => array(),
		];
//		$this->breadcrumb( $route );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
//		return Plan::active()->get()->map( function ( $s ) {
//			return [
//				'id'           => $s->id,
//				'name'         => $s->getShortName(),
//				'title'        => $s->getShortTitle(),
//				'descriptions' => $s->getShortDescriptions(),
//				'value'        => $s->getValueFormattedFront(),
//				'registers'    => $s->registers,
//				'free_days'    => $s->free_days,
//				'free'         => $s->free,
//				'options'      => $s->options,
//			];
//		} );
		$this->page->auxiliar = [
			'cases' => Casex::getAllToHome()->map( function ( $s ) {
				return [
					'id'                => $s->id,
					'name'              => $s->getShortName(),
					'function'          => $s->function,
					'image'             => $s->getLinkDownload(),
					'content'           => $s->content,
					'created_at'        => $s->getCreatedAtFormatted(),
					'created_at_time'   => $s->getCreatedAtTime(),
					'active'            => $s->getActiveFullResponse()
				];
			} ),
			'posts' => Post::popularPosts(2)->get()->map( function ( $s ) {
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
			} ),
			'plans' => Plan::active()->get()->map( function ( $s ) {
				return [
					'id'           => $s->id,
					'name'         => $s->getShortName(),
					'title'        => $s->getShortTitle(),
					'descriptions' => $s->getShortDescriptions(),
					'value'        => $s->getValueFormattedFront(),
					'registers'    => $s->registers,
					'free_days'    => $s->free_days,
					'free'         => $s->free,
					'options'      => $s->options,
				];
			} ),
			'descriptions' => Plan::$_DESCRIPTIONS_

		];
		return view( 'guest.welcome' )
			->with( 'Page', $this->page );

	}

	public function sendEmail(Request $request)
	{
//		return $request->all();
		$users = User::getAdmins();
		Notification::send($users, new NotifyAdminContact($request->all()));

		return redirect()->route('index');

	}

	public function sendNewsletter(Request $request)
	{
		$users = User::getAdmins();
		Notification::send($users, new NotifyAdminNewsletter($request->get('email')));

		return redirect()->route('index');

	}

	public function terms()
	{
		return view( 'guest.terms' )
			->with( 'Page', $this->page );

	}
}
