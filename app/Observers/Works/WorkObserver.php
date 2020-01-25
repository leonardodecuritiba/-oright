<?php

namespace App\Observers\Works;

use App\Helpers\DataHelper;
use App\Models\Works\Work;
use Illuminate\Http\Request;

class WorkObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Works\Work $work
	 *
	 * @return void
	 */
	public function creating( Work $work )
	{
		$work->private_key = DataHelper::NewGuid();
	}

	/**
	 * Listen to the Client updating event.
	 *
	 * @param  \App\Models\Works\Work $work
	 *
	 * @return void
	 */
	public function saving( Work $work ) {
	}

	/**
	 * Listen to the WorkFile creating event.
	 *
	 * @param  \App\Models\Works\Work $work
	 *
	 * @return void
	 */
	public function deleting( Work $work ) {

		if (!empty($work->cover)) {
			$work->deleteCover();
		}

		$work->coparticionaries->each( function ( $w ) {
			$w->delete();
		} );

		$work->work_files->each( function ( $w ) {
			$w->delete();
		} );
	}


}