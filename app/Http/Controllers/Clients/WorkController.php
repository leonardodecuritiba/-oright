<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\PrintHelper;
use App\Http\Requests\Client\WorkRequest;
use App\Models\Works\Category;

class WorkController extends Controller {

	public $entity = "client_works";
	public $sex = "M";
	public $name = "Trabalho";
	public $names = "Trabalhos";
	public $main_folder = 'client.works';
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
			'page_title'  => 'Meus Trabalhos',
			'main_title'  => 'Meus Trabalhos',
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
		$this->page->auxiliar['registers'] = $this->client->registers;
		$this->page->response = $this->client->works->map( function ( $s ) {
			return [
				'id'              => $s->id,
				'title'           => $s->getShortTitle(),
				'blockchain_text' => $s->getBlockchainStatusText(),
				'name'            => $s->getShortName(),
				'descriptions'    => $s->getShortDescriptions(),
				'category'        => $s->getShortCategoryName(),
				'created_at'      => $s->getCreatedAtFormatted(),
				'created_at_time' => $s->getCreatedAtTime()
			];
		} );
		return view( 'client.works.index' )
			->with( 'Page', $this->page );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if(!$this->client->canAddWork()){
			return response()->error([trans( 'messages.new_work_error' )]);
		} else if(!$this->client->hasCredit()){
			return response()->error([trans( 'messages.credit_error' )]);
		}
		$this->page->auxiliar['registers'] = $this->client->registers;
		$this->page->auxiliar['categories'] = Category::getAlltoSelectList();
		$this->page->main_title .= ' - Novo';
		return view( 'client.works.create' )
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
		$Work                               = $this->client->findMyWork( $id );
		$this->page->auxiliar['registers'] = $this->client->registers;
		$this->page->auxiliar['categories'] = Category::getAlltoSelectList();
		$this->page->main_title .= ' - Editar';
		return view( 'client.works.edit' )
			->with( 'Data', $Work )
			->with( 'Page', $this->page );
	}

	/**
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Client\WorkRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( WorkRequest $request ) {
		$data = $this->client->createWork( $request->all() );
		return response()->success( $this->getMessageFront( 'STORE' ), $data, route( $this->entity . '.edit', $data->id ) );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Client\WorkRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( WorkRequest $request, $id ) {
		$data = $this->client->findMyWork( $id );
		$data->update( $request->all() );
		if($request->get('generate') == 1){
			if(!$this->client->hasCredit()){
				return response()->error([trans( 'messages.credit_generate_blockchain_error' )]);
			}
			$data->generateBlockchain();


			return response()->success(trans( 'global.blockchain' ), $data, route( $this->entity . '.edit', $data->id ) );
		}
		return response()->success( $this->getMessageFront( 'UPDATE' ), $data, route( $this->entity . '.edit', $data->id ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function generateBlockchain( $id ) {
		DD($id);
		if(!$this->client->hasCredit()){
			return response()->error([trans( 'messages.credit_generate_blockchain_error' )]);
		}
		$data = $this->client->findMyWork( $id );
		$data->generateBlockchain( );
		return response()->success(trans( 'global.blockchain' ), $data, route( $this->entity . '.edit', $data->id ) );
	}

	/**
	 * Print a listing of the resource.
	 *
	 * @param $id
	 *
	 * @return \App\Helpers\PrintHelper
	 */
	public function generatePDF($id)
	{
		$data = $this->client->findMyWork( $id );
		return PrintHelper::workExport( $data );
	}

	/**
	 * Print a listing of the resource.
	 *
	 * @param $id
	 *
	 * @return \App\Helpers\PrintHelper
	 */
	public function generateHTML($id)
	{
		$data = $this->client->findMyWork( $id );
		return PrintHelper::workExport( $data , $HTML = true);
	}

}
