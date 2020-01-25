<?php

namespace App\Http\Controllers\Clients;

use App\Http\Requests\Client\AssignPayRequest;
use App\Models\Plans\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AssignController extends Controller {

	public $entity = "assigns";
	public $sex = "F";
	public $name = "Assinatura";
	public $names = "Assinaturas";
	public $main_folder = 'client.assigns';
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
			'page_title'  => 'Minhas Assinaturas',
			'main_title'  => 'Minhas Assinaturas',
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
		$assigns = $this->client->assigns;
		$this->page->response = $assigns->map( function ( $s ) {
			return [
				'id'                    => $s->id,
				'name'                  => $s->getPlanNameDetails(),
				'paypal_button'         => $s->getPlanPaypalButton(),
				'value'                 => $s->getValue(),
				'value_formatted'       => $s->getValue2Currency(),
				'pendent'               => $s->isPaymentPendent(),
				'can_cancel'            => $s->canCancel(),
				'status_text'           => $s->getStatusText(),
				'status_color'          => $s->getStatusColor(),
				'expiration_date'       => $s->getExpirationDateFormatted(),
				'expiration_date_time'  => $s->getExpirationDateTime(),
			];
		} );


		$this->page->auxiliar['registers'] = $this->client->registers;
		$view = view( 'client.assigns.index' )
			->with( 'Page', $this->page );
//		if(!$this->client->hasPlan()){
//			$view->withErrors(trans('global.client_need_plan'));
//		} else if(!$this->client->hasActivePlan()){
//			$view->withErrors(trans('global.client_need_payment_plan'));
//		}
		return $view;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$this->page->page_title = 'Assinar Plano';
		$this->page->main_title = 'Assinar Plano';
		$this->page->auxiliar =[
			'plans' => Plan::active()->get()->map( function ( $s ) {
				return [
					'id'                    => $s->id,
					'name'                  => $s->getName(),
					'registers'             => $s->registers,
//					'value'                 => $s->getValue(),
					'value_formatted'       => $s->getValue2Currency(),
					'value_formatted_front' => $s->getValueFormattedFront(),
					'options'               => $s->options,
				];
			} ),
			'descriptions'  => Plan::$_DESCRIPTIONS_,
			'registers'     => $this->client->registers
		];

//		return $this->page->auxiliar;

		$view = view( 'client.assigns.create' )
			->with( 'Page', $this->page );
//		if(!$this->client->hasPlan()){
//			$view->withErrors(trans('global.client_need_plan'));
//		} else if(!$this->client->hasActivePlan()){
//			$view->withErrors(trans('global.client_need_payment_plan'));
//		}
		return $view;
	}

	/**
	 * Choose the specified resource in storage.
	 *
	 * @param $plan_id
	 * @return \Illuminate\Http\Response
	 */
	public function choose( $plan_id )
	{
		$data = $this->client->newAssign( ['plan_id' => $plan_id] );
		return response()->success(trans('global.plan_confirmed') , $data, route('client_works.index') );
	}

	/**
	 * Store the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request )
	{
		dd($request->all());
		$data = $this->client->newAssign($request->all());
		return response()->success(trans('global.plan_confirmed') , $data, route('client_works.index') );
	}

	/**
	 * Store the specified resource in storage.
	 *
	 * @param \App\Http\Requests\Client\AssignPayRequest $request
	 * @param $id
	 * @return \Illuminate\Http\Response
	 */
	public function pay(AssignPayRequest $request, $id )
	{
		$data = $this->client->payAssign($id, $request->all());
		return response()->success(trans('global.payment_confirmed') , $data, route('client_works.index') );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function cancel( $id ) {
		$assign = $this->client->findMyAssign($id);
		$assign->cancel();
		return response()->success($this->getMessageFront( 'CANCEL', $this->name . ': ' . $assign->getShortName() ) , $assign, route('assigns.index') );
	}
}
