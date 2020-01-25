<?php

namespace App\Http\Controllers\Commons;

use App\Http\Controllers\Controller;
use App\Models\Clients\Job;
use App\Models\Clients\Unit;
use App\Models\Commons\CepCities;
use App\Models\Commons\SubGroup;
use App\Models\Works\Coparcenary;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller {
	/**
	 * gET the specified resource from storage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getStateCityToSelect() {
		$state_id = Input::get( 'id' );
		return ( $state_id == null ) ? $state_id : CepCities::where( 'state_id', $state_id )->get();
	}

	/**
	 * Active the specified resource from storage.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function setActive() {

		$model  = Input::get( 'model' );
		$id     = Input::get( 'id' );
		$Entity = $model::findOrFail( $id );

		return new JsonResponse( [
			'status'  => 1,
			'message' => $Entity->updateActive()
		], 200 );
	}
	/**
	 * gET the specified resource from storage.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getCoparcenary() {
		$work_id = Input::get( 'work_id' );
		$email = Input::get( 'email' );
		$message = Coparcenary::verifyEmailCoparcenaryIsSetted($work_id, $email);

		return new JsonResponse( [
			'status'  => 1,
			'message' => $message
		], 200 );
		return ;
	}
//	/**
//	 * get the specified resource from storage.
//	 *
//	 * @return \Illuminate\Http\Response
//	 */
//	public function getCLientJobsToSelect()
//	{
//		$client_id = Input::get('id');
//		if($client_id == NULL) return $client_id;
//		$unit_ids = Unit::where('client_id',$client_id)->pluck('id');
//		return ($unit_ids == NULL) ? $unit_ids : Job::whereIn('unit_id',$unit_ids)->get()->map(function($p){
//			$p->text = $p->unit->name . ' / ' . $p->name;
//			return $p;
//		});
//	}
//	/**
//	 * get the specified resource from storage.
//	 *
//	 * @return \Illuminate\Http\Response
//	 */
//	public function getGroupsSubgroupsToSelect()
//	{
//		$group_id = Input::get('id');
//		if($group_id == NULL) return $group_id;
//		return $subgroup = SubGroup::where('group_id',$group_id)->get()->map(function($p){
//			$p->text = $p->name;
//			return $p;
//		});
//	}
}
