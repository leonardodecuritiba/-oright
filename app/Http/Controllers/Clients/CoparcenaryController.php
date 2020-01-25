<?php

namespace App\Http\Controllers\Clients;

use App\Http\Requests\Admin\Works\CoparcenaryRequest;
use App\Models\Works\Coparcenary;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class CoparcenaryController extends Controller {

	public $entity = "coparcenaries";
	public $sex = "F";
	public $name = "Coparticipação";
	public $names = "Coparticipações";
	public $page = [];

	public function __construct( Route $route ) {
		parent::__construct();
		$this->page = (object) [
			'entity'      => $this->entity,
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
	 * Store the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Works\CoparcenaryRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( CoparcenaryRequest $request )
	{
//		return $request->all();
		if($request->get('user_id') != NULL){
			$coparcenaries = Coparcenary::where('work_id',$request->get('work_id'))
			                            ->where('user_id',$request->get('user_id'))->first();
		} else {
			$coparcenaries = Coparcenary::where('work_id',$request->get('work_id'))
			                            ->where('email',$request->get('email'))->first();
		}
		if($coparcenaries != NULL){
			return response()->error('Esse colaborador já foi adicionado!');
		}
		$data = Coparcenary::create( $request->all() );
		return response()->success('Cliente cadastrado!', $data, route('client_works.edit', $data->work_id ) );
	}
	/**
	 * Store the specified resource in storage.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function resend( $id )
	{
		$data = Coparcenary::sendEmail( $id );
		return response()->success( trans('global.email_coparcenay_resent'), $data, route('client_works.edit', $data->work_id ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( $id ) {
		$data = $this->client->getMyCoparticenary($id);
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $data->getShortName() );
		$data->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
