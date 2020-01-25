<?php

namespace App\Http\Controllers\Auth;

use App\Mail\VerifyEmail;
use App\Models\Clients\Client;
use App\Http\Controllers\Controller;
use App\Models\Plans\Plan;
use App\Models\Users\User;
use App\Notifications\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     *
     * @return \App\Models\Users\User
     */
	protected function create(array $data)
	{
		$client = Client::_create( $data );
		return $client->user;
	}

	public function verifyUser($token)
	{
		$User = User::where('verify_token', $token)->first();
		if(isset($User) ){
			if(!$User->verified) {
				$User->verified = 1;
				$User->save();
				$status = trans('global.email_verification_set');;
			}else{
				$status = trans('global.email_verification_ok');
			}
		}else{
			return redirect('login')
				->with('warning', trans('global.email_token_error'));
		}

		return redirect('login')
			->with('success', $status);
	}

	protected function registered(Request $request, $user)
	{
		$this->guard()->logout();
		return redirect('login')
			->with('success', trans('global.email_verification_sent'));
	}


	/**
	 * Show the application registration form.
	 *
	 * @param $plan_id
	 * @return \Illuminate\Http\Response
	 */
	public function showRegistrationForm($plan_id = NULL)
	{
		if($plan_id != NULL){
			$Plan = Plan::findOrFail($plan_id);
			view()->share('Plan',$Plan);
		}
		return view('auth.register');
	}
}
