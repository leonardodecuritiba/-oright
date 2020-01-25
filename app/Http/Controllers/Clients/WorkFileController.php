<?php

namespace App\Http\Controllers\Clients;

use App\Http\Requests\Admin\Works\WorkFileRequest;
use App\Models\Works\WorkFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class WorkFileController extends Controller {

	public $entity = "work_files";
	public $sex = "M";
	public $name = "Anexo";
	public $names = "Anexos";
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
	 * @param  \App\Http\Requests\Admin\Works\WorkFileRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( WorkFileRequest $request )
	{
		$data = WorkFile::create( $request->all() );
		return response()->success( $this->getMessageFront( 'STORE' ), $data, route('client_works.edit', $data->work_id ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy( $id ) {

		$work_file = WorkFile::findOrFail($id);
		$message = $this->getMessageFront( 'DELETE', $this->name . ': ' . $work_file->getShortName() );
		$work_file->delete();

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message,
		], 200 );
	}
}
