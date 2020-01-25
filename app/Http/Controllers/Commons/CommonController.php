<?php

namespace App\Http\Controllers\Commons;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commons\UpdatePasswordRequest;
use App\Models\Works\Coparcenary;
use App\Models\Works\Work;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller {



	/**
	 * Show the application dashboard.
	 *
	 * @param \App\Http\Requests\Commons\UpdatePasswordRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function updatePassword( UpdatePasswordRequest $request )
	{
		$user = Auth::user();
		$user->updatePassword( $request->get( 'password' ) );
		if($user->hasRole('client')){
			$route = route( 'profile.my' );
		} else {
			$route = route( 'admin.profile.my' );
		}
		return response()->success( $this->getMessageFront( 'UPDATE-PASSWORD'), NULL, $route );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @param $private_key
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function viewWork( $private_key )
	{
		$Work = Work::where('private_key',$private_key)->first();
		if($Work != NULL){
			return redirect()->to($Work->getGenerateHtmlLink());
//			return response()->success( trans('global.coparcenay_confirmed'), $Coparcenary, route('works.view_coparcenay',[$Coparcenary->id,$Coparcenary->token]) );
		}
		return abort(403);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @param $token
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function confirmCoparcenary($id, $token )
	{
		$Coparcenary = Coparcenary::findOrFail($id);
		if($Coparcenary->token == $token){
			$Coparcenary->confirm();
			return redirect()->to($Coparcenary->work->getGenerateHtmlLink());
//			return response()->success( trans('global.coparcenay_confirmed'), $Coparcenary, route('works.view_coparcenay',[$Coparcenary->id,$Coparcenary->token]) );
		}
		return abort(403);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @param $token
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function viewWorkCoparcenary($id, $token )
	{
		$Coparcenary = Coparcenary::findOrFail($id);
		if($Coparcenary->token == $token){
			return view('guest.works.show')
				->with('Data',$Coparcenary);
		}
		return abort(403);
	}
}
