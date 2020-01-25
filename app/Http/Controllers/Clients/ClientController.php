<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\MoipHelper;
use App\Helpers\PagchainHelper;
use App\Http\Requests\Client\ClientRequest;
use App\Http\Requests\Client\UpdatePasswordRequest;
use App\Models\Commons\CepStates;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller {

	public $entity = "clients";
	public $sex = "M";
	public $name = "Perfil";
	public $names = "Perfils";
	public $main_folder = 'clients';
	public $page = [];

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->page = (object) [
			'entity'      => $this->entity,
			'main_folder' => $this->main_folder,
			'name'        => $this->name,
			'names'       => $this->names,
			'sex'         => $this->sex,
			'auxiliar'    => array(),
			'response'    => array(),
			'page_title'  => 'Meu Perfil',
			'main_title'  => 'Meu Perfil',
			'noresults'   => '',
			'tab'         => 'data'
		];
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return redirect()->route('client_works.index');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function profile() {
		$this->page->auxiliar['states'] = CepStates::getAlltoSelectList( [ 'id', 'description' ] );
		$view = view( 'client.profile' )
			->with( 'Data', $this->client )
			->with( 'Page', $this->page );
		return $view;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @param \App\Http\Requests\Client\ClientRequest $request ;
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( ClientRequest $request )
	{
		$data = $this->client->update( $request->all() );
		return response()->success( $this->getMessageFront( 'UPDATE' ), $data, route( 'profile.my' ) );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function remove() {
		return view( 'client.disable' )
			->with( 'Page', $this->page );
	}

	/**
	 * Show the application dashboard.
	 *
	 */
	public function disable() {
		$this->client->user->disable();
		Auth::logout();

		return redirect()->route( 'index' );
	}
}
