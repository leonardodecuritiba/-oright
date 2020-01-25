<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Clients\ClientRequest;
use App\Http\Requests\Admin\Clients\ClientStoreRequest;
use App\Models\Clients\Client;
use App\Models\Commons\CepStates;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class ClientController extends Controller {

	public $entity = "clients";
	public $sex = "M";
	public $name = "Cliente";
	public $names = "Clientes";
	public $main_folder = 'admin.clients';
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
		$this->page->response = Client::get()->map( function ( $s ) {
			return [
				'id'              => $s->id,
				'name'            => $s->getShortName(),
				'email'           => $s->getShortEmail(),
				'document'        => $s->getShortDocument(),
				'plan'            => $s->getActiveAssignName(),
				'n_works'         => $s->getShortWorksCount(),
				'created_at'      => $s->getCreatedAtFormatted(),
				'created_at_time' => $s->getCreatedAtTime(),
				'verified'        => $s->getVerifiedText(),
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
		$this->page->auxiliar['states'] = CepStates::getAlltoSelectList();

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
		$client                         = Client::with( 'address', 'contact', 'user','works','user.comments' )->findOrFail( $id );
		$this->page->auxiliar['states'] = CepStates::getAlltoSelectList();

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $client );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Clients\ClientRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( ClientRequest $request, $id ) {
		$data = Client::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}

	/**
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Clients\ClientStoreRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( ClientStoreRequest $request )
	{
		$request->merge(['verified'=>1]);
		$data = Client::_create( $request->all() );
		return $this->redirect( 'STORE', $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Clients\Client $client
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Client $client ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $client->getShortName() );
		$client->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
