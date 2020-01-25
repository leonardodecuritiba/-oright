<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Plans\PlanRequest;
use App\Models\Plans\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class PlansController extends Controller {

	public $entity = "plans";
	public $sex = "M";
	public $name = "Plano";
	public $names = "Planos";
	public $main_folder = 'admin.plans';
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
		$this->page->response = Plan::get()->map( function ( $s ) {
			return [
				'id'           => $s->id,
				'name'         => $s->getShortName(),
				'title'        => $s->getShortTitle(),
				'descriptions' => $s->getShortDescriptions(),
				'value'        => $s->getValue2Currency(),
				'n_clients'    => 0,
				'created_at'        => $s->getCreatedAtFormatted(),
				'created_at_time'   => $s->getCreatedAtTime(),
				'active'            => $s->getActiveFullResponse()
			];
		} );

		return view( $this->main_folder . '.index' )
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
		$this->page->auxiliar['descriptions'] = Plan::$_DESCRIPTIONS_;
		$Plan = Plan::findOrFail( $id );

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $Plan );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Plans\PlanRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( PlanRequest $request, $id ) {
		$data = Plan::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Plans\Plan $plan
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Plan $plan ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $plan->getShortName() );
		$plan->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
