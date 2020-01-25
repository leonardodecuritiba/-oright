<?php

namespace App\Observers\Admins;

use App\Models\Admins\Admin;
use App\Models\Commons\Address;
use App\Models\Commons\Contact;
use App\Models\Users\User;
use Illuminate\Http\Request;

class AdminObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}

	/**
	 * Listen to the Admin creating event.
	 *
	 * @param  \App\Models\Admins\Admin $admin
	 *
	 * @return void
	 */
	public function creating( Admin $admin )
	{
		$user = User::create( [
			'email'    => $this->request->get( 'email' ),
			'password' => bcrypt( $this->request->get( 'password' ) ),
		] );
		$user->attachRole( 1 );
		$admin->user_id = $user->id;
	}

	/**
	 * Listen to the Admin deleting event.
	 *
	 * @param  \App\Models\Admins\Admin $admin
	 *
	 * @return void
	 */
	public function deleting( Admin $admin )
	{
		$admin->user->comments->each( function ( $w ) {
			$w->delete();
		} );
		$admin->user->delete();
	}
}