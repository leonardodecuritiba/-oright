<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $client;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
		$this->middleware( function ( $request, $next ) {
			$this->client = Auth::user()->client;
			$route = $request->route()->getName();

			View::share('client', $this->client);

			//VERIFICAR SE NÃO É A PÁGINA DE PERFIL
			if(($route != 'profile.my') && ($route != 'profile.update')){

				if(!$this->client->isFinished()){
					//VERIFICAR SE O USUÁRIO AINDA NÃO FINALIZOU O CADASTRO
					//CASO NÃO TENHA SIDO, REDIRECIONAR PARA PÁGINA DO PERFIL E APRESENTAR A MENSAGEM DE ERRO
					return redirect()->route('profile.my')
					                 ->withErrors(trans('global.client_need_finish'))->withInput();
				} else if(($route != 'assigns.create')
				          && ($route != 'assigns.index')
				          && ($route != 'assigns.store')
				          && ($route != 'assigns.choose')
				          && (!$this->client->hasPlan())){
					//VERIFICAR SE O USUÁRIO AINDA POSSUI NÃO UM PLANO
					return redirect()->route('assigns.create')
					                 ->withErrors(trans('global.client_need_plan'))->withInput();
				} else if(($route != 'assigns.index')
                          && ($route != 'assigns.create')
				          && ($route != 'assigns.store')
                          && ($route != 'assigns.cancel')
                          && ($route != 'assigns.pay')
				          && ($route != 'assigns.choose')
				          && !$this->client->hasActivePlan()){
					return redirect()->route('assigns.index')
					                 ->withErrors(trans('global.client_need_payment_plan'))->withInput();
//					dd(1);
//					return redirect()->route('assigns.index');
				}

			}

			return $next( $request );
		} );
	}

	/**
	 * Define getMessageFront.
	 *
	 * @param $type
	 * @param $data
	 *
	 * @return string
	 *
	 */
	public function redirect( $type, $data ) {
		return response()->success( $this->getMessageFront( $type ), $data, route( $this->entity . '.edit', $data->id ) );
	}

	/**
	 * Define getMessageFront.
	 *
	 * @param $type
	 *
	 * @return string
	 *
	 */
	public function getMessageFront( $type, $name = null ) {
		if ( $type == 'DELETE' ) {
			return trans( 'messages.crud.' . $this->sex . '.' . strtoupper( $type ) . '.SUCCESS', [ 'name' => $name ] );
		}

		return trans( 'messages.crud.' . $this->sex . '.' . strtoupper( $type ) . '.SUCCESS', [ 'name' => $this->name ] );
	}

	/**
	 * Define breadcrumb.
	 *
	 * @param  \Illuminate\Routing\Route $route
	 *
	 */
	public function breadcrumb( $route ) {
		$action                 = $route->getActionMethod();
		$this->page->page_title = trans( 'pages.view.' . strtoupper( $action ), [ 'name' => $this->names ] );
		$this->page->main_title = trans( 'pages.view.' . strtoupper( $action ), [ 'name' => $this->name ] );
		$this->page->noresults  = trans( 'pages.view.NORESULTS.' . $this->sex, [ 'name' => $this->name ] );

		switch ( $action ) {
//			case 'index':
//				$this->PageResponse->breadcrumb = [
//					['route'=>route('index'),'text'=>'Home'],
//					['route'=>NULL,'text'=> $this->names]
//				];
//				break;
			case 'create':
				$this->page->breadcrumb = [
					[ 'route' => route( 'index' ), 'text' => 'Home' ],
					[ 'route' => route( $this->entity . '.index' ), 'text' => $this->names ],
					[ 'route' => null, 'text' => trans( 'pages.view.CREATE', [ 'name' => $this->name ] ) ],
				];
				break;
			case 'edit':
				$this->page->breadcrumb = [
					[ 'route' => route( 'index' ), 'text' => 'Home' ],
					[ 'route' => route( $this->entity . '.index' ), 'text' => $this->names ],
					[ 'route' => null, 'text' => trans( 'pages.view.EDIT', [ 'name' => $this->name ] ) ],
				];
				break;
			default:
				$this->page->breadcrumb = [
					[ 'route' => route( 'index' ), 'text' => 'Home' ],
					[ 'route' => null, 'text' => $this->names ]
				];
				break;
		}
	}
}
