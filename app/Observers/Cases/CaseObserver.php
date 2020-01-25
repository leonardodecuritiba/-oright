<?php

namespace App\Observers\Cases;

use App\Models\Cases\Casex;
use Illuminate\Http\Request;

class CaseObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Cases\Casex $casex
	 *
	 * @return void
	 */
	public function creating( Casex $casex )
	{
		$casex->setImageAttribute($this->request->file('cover'));
	}

	/**
	 * Listen to the Client updating event.
	 *
	 * @param  \App\Models\Cases\Casex $casex
	 *
	 * @return void
	 */
	public function saving( Casex $casex ) {
		if ( $this->request->hasFile('cover') ) {
			$casex->updateImageAttribute($this->request->file('cover'));
		}
	}

	/**
	 * Listen to the WorkFile creating event.
	 *
	 * @param  \App\Models\Cases\Casex $casex
	 *
	 * @return void
	 */
	public function deleting( Casex $casex )
	{
		if (!empty($casex->cover)) {
			File::Delete($casex->getFullLinkPath());
		}
	}


}