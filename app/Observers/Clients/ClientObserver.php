<?php

namespace App\Observers\Clients;

use App\Helpers\DataHelper;
use App\Helpers\MoipHelper;
use App\Helpers\PagchainHelper;
use App\Models\Admins\Admin;
use App\Models\Clients\Client;
use App\Models\Commons\Address;
use App\Models\Commons\Contact;
use App\Models\Users\User;
use App\Notifications\NotifyAdminsNewClient;
use App\Notifications\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ClientObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}

	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Clients\Client $client
	 *
	 * @return void
	 */
	public function creating( Client $client )
	{
		$contact            = Contact::create( $this->request->all() );
		$address            = Address::create( $this->request->all() );
		$user               = User::create( [
			'email'    => $this->request->get( 'email' ),
			'password' => bcrypt( $this->request->get( 'password' ) ),
			'verify_token' => str_random(40)
		] );
		$user->attachRole( 2 );
		if($user->verified){
			if($client->type){
				$client->birthday = NULL;
				$client->cpf = NULL;
				$client->rg = NULL;
			} else {
				$client->company_name = NULL;
				$client->fantasy_name = NULL;
				$client->cnpj = NULL;
				$client->ie = NULL;
				$client->foundation = NULL;
				$client->isention_ie = 1;
			}
		}

		$client->private_key = DataHelper::NewGuid();
		$client->contact_id = $contact->id;
		$client->address_id = $address->id;
		$client->user_id    = $user->id;
	}
	/**
	 * Listen to the Client created event.
	 *
	 * @param  \App\Models\Clients\Client $client
	 *
	 * @return void
	 */
	public function created( Client $client )
	{
		if(!$client->user->verified){
			$client->user->notify(new RegisteredUser($client->user));
			$admin_ids = Admin::active()->pluck('user_id');
			$users = User::whereIn('id',$admin_ids)->get();
			Notification::send($users, new NotifyAdminsNewClient($client));
		}
	}

	/**
	 * Listen to the Client updating event.
	 *
	 * @param  \App\Models\Clients\Client $client
	 *
	 * @return void
	 */
	public function saving( Client $client ) {
		if ( $client->address != null ) {
			$client->address->update( $this->request->all() );
			$client->contact->update( $this->request->all() );
			if($client->user->verified){
				if($client->type){
					$client->birthday = NULL;
					$client->cpf = NULL;
					$client->rg = NULL;
				} else {
					$client->company_name = NULL;
					$client->fantasy_name = NULL;
					$client->cnpj = NULL;
					$client->ie = NULL;
					$client->foundation = NULL;
					$client->isention_ie = 1;
				}

                if (!$client->finished) {

	                //PAGCHAIN CREATE
	                try {
		                $data = $client->createPagchainUser();
		                $client->pagchain_address = $data['address'];
		                $client->pagchain_userId = $data['userId'];
		                $client->finished = 1;
	                } catch (\Exception $e) {
		                dd($e->getMessage());
		                return false;
	                }


	                //MOIP CREATE
	                /*
                    try {
                        $MoipCustumer = (new MoipHelper())->custumers();
                        $MoipCustumer->create($client->toMoipArray(), false);
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                        return false;
                    }
                    */
                } else {
	                //MOIP UPDATE
	                /*
                    $MoipHelper = new MoipHelper();
                    $MoipCustumer = $MoipHelper->custumers();
                    $MoipCustumer->update($client->code, $client->toMoipArray());
					*/

                }


			}
		}
	}

	/**
	 * Listen to the Client deleting event.
	 *
	 * @param  \App\Models\Clients\Client $client
	 *
	 * @return void
	 */
	public function deleting( Client $client ) {
		$client->address->delete();
		$client->contact->delete();
		$client->works->each( function ( $w ) {
			$w->delete();
		} );
		$client->user->comments->each( function ( $w ) {
			$w->delete();
		} );
		$client->assigns->each( function ( $w ) {
			$w->delete();
		} );
		$client->user->delete();
	}
}