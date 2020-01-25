<?php

namespace App\Http\Controllers\Admin\Works;

use App\Helpers\PrintHelper;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Works\WorkRequest;
use App\Models\Works\Category;
use App\Models\Works\Work;
use App\Models\Commons\CepStates;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;

class WorkController extends Controller {

	public $entity = "works";
	public $sex = "M";
	public $name = "Trabalho";
	public $names = "Trabalhos";
	public $main_folder = 'admin.works';
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
		$this->page->response = Work::with( 'owner' )->get()->map( function ( $s ) {
			return [
				'id'              => $s->id,
				'title'           => $s->getShortTitle(),
				'blockchain_text' => $s->getBlockchainStatusText(),
				'name'            => $s->getShortName(),
				'descriptions'    => $s->getShortDescriptions(),
				'category'        => $s->getShortCategoryName(),
				'owner'           => $s->getShortOwnerName(),
				'created_at'      => $s->getCreatedAtFormatted(),
				'created_at_time' => $s->getCreatedAtTime()
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
		$work                               = Work::with( 'owner' )->findOrFail( $id );
		$this->page->auxiliar['categories'] = Category::getAlltoSelectList();

		return view( $this->main_folder . '.master' )
			->with( 'Page', $this->page )
			->with( 'Data', $work );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\Admin\Works\WorkRequest $request
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( WorkRequest $request, $id ) {
		$data = Work::findOrFail( $id );
		$data->update( $request->all() );

		return $this->redirect( 'UPDATE', $data );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function generateBlockchain( $id ) {
		$data = Work::findOrFail( $id );
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
		$data = Work::findOrFail( $id );
		return PrintHelper::workExport( $data);
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
		$data = Work::findOrFail( $id );
		return PrintHelper::workExport( $data , $HTML = true);
	}
}
