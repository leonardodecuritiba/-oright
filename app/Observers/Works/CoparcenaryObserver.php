<?php

namespace App\Observers\Works;

use App\Models\Works\Coparcenary;
use Illuminate\Http\Request;

class CoparcenaryObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Works\Coparcenary $coparcenary
	 *
	 * @return void
	 */
	public function creating( Coparcenary $coparcenary )
	{
		$coparcenary->token = str_random(40);
	}

	/**
	 * Listen to the Client created event.
	 *
	 * @param  \App\Models\Works\Coparcenary $coparcenary
	 *
	 * @return void
	 */
	public function created( Coparcenary $coparcenary )
	{
		$coparcenary->sendConfirmationEmail();
	}


}