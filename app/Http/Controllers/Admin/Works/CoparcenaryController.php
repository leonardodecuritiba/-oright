<?php

namespace App\Http\Controllers\Admin\Works;

use App\Http\Controllers\Admin\Controller;
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
		$data = Coparcenary::create( $request->all() );
		return response()->success( $this->getMessageFront( 'STORE' ), $data, route('works.edit', $data->work_id ) );
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
		return response()->success( trans('global.email_coparcenay_resent'), $data, route('works.edit', $data->work_id ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Works\Coparcenary $coparcenary
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Coparcenary $coparcenary ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $coparcenary->getShortName() );
		$coparcenary->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
