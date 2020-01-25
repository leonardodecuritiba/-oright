<?php

namespace App\Http\Controllers\Admin\Cases;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Cases\CaseRequest;
use App\Models\Cases\Casex;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class CasesController extends Controller {

	public $entity = "cases";
	public $sex = "M";
	public $name = "Case";
	public $names = "Cases";
	public $main_folder = 'admin.cases';
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
		$this->page->response = Casex::get()->map( function ( $s ) {
			return [
				'id'                => $s->id,
				'name'              => $s->getShortName(),
				'content'           => $s->getShortContent(),
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
		$Case = Casex::findOrFail( $id );

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $Case );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Cases\CaseRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( CaseRequest $request, $id ) {
		$data = Casex::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Cases\Casex $casex
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( Casex $casex ) {
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $casex->getShortName() );
		$casex->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
