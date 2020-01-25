<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Routing\Route;

class RegisterController extends Controller {

	public $entity = "registers";
	public $sex = "F";
	public $name = "Movimentação";
	public $names = "Movimentações";
	public $main_folder = 'client.registers';
	public $page = [];

	public function __construct( Route $route ) {
		parent::__construct();
		$this->page = (object) [
			'entity'      => $this->entity,
			'main_folder' => $this->main_folder,
			'name'        => $this->name,
			'names'       => $this->names,
			'sex'         => $this->sex,
			'auxiliar'    => array(),
			'response'    => array(),
			'page_title'  => 'Minhas Movimentações',
			'main_title'  => 'Minhas Movimentações',
			'noresults'   => '',
			'tab'         => 'data'
		];
	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->page->response = $this->client->registers_all->map( function ( $s ) {
			return [
				'id'                => $s->id,
				'type'              => $s->getType(),
				'description'       => $s->getDescription(),
				'url'               => $s->getUrl(),
				'value'             => $s->getValue(),
				'value_formatted'   => $s->getValue2Currency(),
				'quantity'          => $s->quantity,
				'color'             => $s->getColor(),
			];
		} );

		$this->page->auxiliar['registers'] = $this->client->registers;
		$view = view( 'client.registers.index' )
			->with( 'Page', $this->page );
		if(!$this->client->hasActivePlan()){
			$view->withErrors(trans('global.client_need_plan'));
		}
		return $view;
	}
}
