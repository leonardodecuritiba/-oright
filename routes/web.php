<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser')->name( 'user.verify' );

Route::get('register/plan/{plan_id}', 'Auth\RegisterController@showRegistrationForm')->name( 'register.plan' );

/*
|--------------------------------------------------------------------------
| Comments Routes
|--------------------------------------------------------------------------
|
*/
Route::resource( 'client_comments', 'Clients\CommentController' );


Route::get( '/', 'GuestController@index' )->name( 'index' );
Route::get( 'terms', 'GuestController@terms' )->name( 'terms' );
Route::post( 'send-email', 'GuestController@sendEmail' )->name( 'index.sendemail' );
Route::post( 'send-newsletter', 'GuestController@sendNewsletter' )->name( 'index.sendnewsletter' );


Route::group( [ 'prefix' => 'ajax', 'middleware' => [ 'role:admin|client' ] ], function () {
	Route::get( 'state-city', 'Commons\AjaxController@getStateCityToSelect' )->name( 'ajax.get.state-city' );
	Route::get( 'set-active', 'Commons\AjaxController@setActive' )->name( 'ajax.set.active' );
	Route::post( 'get-coparcenary', 'Commons\AjaxController@getCoparcenary' )->name( 'ajax.get.coparcenary' );
} );



/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
*/
Route::resource( 'blog', 'BlogController' );
Route::get( 'blog/categoria/{name}', 'BlogController@showCategory' )->name('blog.category.show');
Route::get( 'blog/{name}', 'BlogController@show' )->name('blog.show');

Route::get( 'view-work-bykey/{token}', 'Commons\CommonController@viewWork' )->name( 'works.view_work' );
Route::get( 'confirm-coparcenary/{id}/{token}', 'Commons\CommonController@confirmCoparcenary' )->name( 'works.confirm_coparcenay' );
Route::get( 'view-work-coparcenary/{id}/{token}', 'Commons\CommonController@viewWorkCoparcenary' )->name( 'works.view_coparcenay' );


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group( [ 'prefix' => 'admin', 'middleware' => [ 'role:admin' ] ], function () {





	Route::get( '/', function () {
		return view( 'admin.dashboard' );
	} )->name( 'admin.index' );//->middleware('auth');
	/*
	|--------------------------------------------------------------------------
	| Client Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'clients', 'Admin\Clients\ClientController' );
	/*
	|--------------------------------------------------------------------------
	| Admin Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'admins', 'Admin\Admins\AdminController' );
	Route::get( 'my-admin-profile', 'Admin\Admins\AdminController@profile' )->name( 'admin.profile.my' );
	/*
	|--------------------------------------------------------------------------
	| Work Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'works', 'Admin\Works\WorkController' );
	Route::get( 'works/{id}/generate-blockchain', 'Admin\Works\WorkController@generateBlockchain' )->name('works.gen_blockchain');
	Route::get( 'works-get-pdf/{id}', 'Admin\Works\WorkController@generatePDF' )->name( 'works.gen_pdf' );
	Route::get( 'works-get-html/{id}', 'Admin\Works\WorkController@generateHTML' )->name( 'works.gen_html' );
	/*
	|--------------------------------------------------------------------------
	| Category Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'categories', 'Admin\Categories\CategoryController' );
	/*
	|--------------------------------------------------------------------------
	| BlogCategory Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'blog_categories', 'Admin\Blogs\BlogCategoryController' );
	/*
	|--------------------------------------------------------------------------
	| Posts Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'posts', 'Admin\Blogs\PostController' );
	/*
	|--------------------------------------------------------------------------
	| Comments Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'comments', 'Admin\Blogs\CommentController' );
	/*
	|--------------------------------------------------------------------------
	| Plans Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'plans', 'Admin\Plans\PlansController' );
	/*
	|--------------------------------------------------------------------------
	| Plans Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'cases', 'Admin\Cases\CasesController' );
	/*
	|--------------------------------------------------------------------------
	| WorkFiles Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'work_files', 'Admin\Works\WorkFileController' );
	/*
	|--------------------------------------------------------------------------
	| Coparcenaries Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'coparcenaries', 'Admin\Works\CoparcenaryController' );
	Route::get( 'coparcenaries-resend/{id}', 'Admin\Works\CoparcenaryController@resend' )->name( 'coparcenaries.resend' );
} );

Route::group( [ 'prefix' => 'admin', 'middleware' => 'auth' ], function () {
	Route::post( 'password-change', 'Commons\CommonController@updatePassword' )->name( 'change.password' );
} );


/*
|--------------------------------------------------------------------------
| Clients Routes
|--------------------------------------------------------------------------
|
*/
Route::group( [ 'group' => 'clients', 'middleware' => [ 'role:client' ] ], function () {
	Route::get( 'home', 'Clients\ClientController@index' )->name( 'home' );
	/*
	|--------------------------------------------------------------------------
	| Profile Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'profile', 'Clients\ClientController' );
	Route::patch( 'profile/update', 'Clients\ClientController@update' )->name( 'profile.update' );
	Route::get( 'my-profile', 'Clients\ClientController@profile' )->name( 'profile.my' );
	Route::get( 'disable-profile', 'Clients\ClientController@disable' )->name( 'profile.disable' );
	/*
	|--------------------------------------------------------------------------
	| CLients-Works Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'client_works', 'Clients\WorkController' );
	Route::get( 'client_works/{id}/generate-blockchain', 'Clients\WorkController@generateBlockchain' )->name('client_works.gen_blockchain');
	Route::get( 'client_works-get-pdf/{id}', 'Clients\WorkController@generatePDF' )->name( 'client_works.gen_pdf' );
	Route::get( 'client_works-get-html/{id}', 'Clients\WorkController@generateHTML' )->name( 'client_works.gen_html' );
	/*
	|--------------------------------------------------------------------------
	| CLients-WorkFiles Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'client_work_files', 'Clients\WorkFileController' );
	/*
	|--------------------------------------------------------------------------
	| CLients-Coparcenaries Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'client_coparcenaries', 'Clients\CoparcenaryController' );
	Route::get( 'client_coparcenaries-resend/{id}', 'Clients\CoparcenaryController@resend' )->name( 'client_coparcenaries.resend' );
//	Route::get('/meus-trabalhos', 'Clients\WorkController@index')->name('trabalhos');
	/*
	|--------------------------------------------------------------------------
	| Assigns Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'assigns', 'Clients\AssignController' );
	Route::get( 'assigns-cancel/{id}', 'Clients\AssignController@cancel' )->name( 'assigns.cancel' );
    Route::post('assigns-pay/{id}', 'Clients\AssignController@pay')->name('assigns.pay');

    Route::get('assigns-choose/{id}', 'Clients\AssignController@choose')->name('assigns.choose');
	/*
	|--------------------------------------------------------------------------
	| Registers Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource( 'registers', 'Clients\RegisterController' );
} );




Route::group( [ 'prefix' => 'teste'], function () {

    Route::get('/assigns/{id}', function ($id) {
        $assign = \App\Models\Clients\Assign::find($id);


        $MoipHelper = new \App\Helpers\MoipHelper();
        $MoipSubscription = $MoipHelper->subscriptions();
        $moipAssign = $MoipSubscription->find($assign->code);


        return $moipAssign;

    });


    Route::get('/assigns', function () {
        $invoice = \App\Models\Clients\Invoice::find(3);
        $client = $invoice->assign->client;
        return $client->user->notify(new \App\Notifications\NotifyPayInvoice($invoice));

    });

	Route::get('/mailable', function () {
		$client = \App\Models\Clients\Client::find(1);
		$admin_ids = \App\Models\Admins\Admin::active()->pluck('user_id');
		$users = \App\Models\Users\User::whereIn('id',$admin_ids)->get();

		Notification::send($users, new \App\Notifications\NotifyAdminsNewClient($client));
	});

	Route::get('sendemail', function () {

		$user = array(
			'email' => "silva.zanin@gmail.com",
			'name' => "Leonardo",
			'mensagem' => "TESTE OK",
		);

		Mail::raw($user['mensagem'], function ($message) use ($user) {
			$message->to($user['email'], $user['name'])->subject('Welcome!');
			$message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
		});

		return "Your email has been sent successfully";

	});

	Route::get('notification', function () {

		$user = \App\Models\Users\User::where('email','silva.zanin@gmail.com')->first();
		$client = \App\Models\Clients\Client::all()->first();

		\Illuminate\Support\Facades\Notification::send($user, new \App\Notifications\NotifyAdminsNewClient($client));

		return $user->email . " Your email has been sent successfully " .$client->user->email;

	});

	Route::get('pagchain/create-company', 'Commons\PagChainController@createCompany')->name('pagchain.create-company');

	//ASSET
	Route::get('pagchain/create-asset', 'Commons\PagChainController@createAsset');
	Route::get('pagchain/get-asset-balance', 'Commons\PagChainController@getAssetBalance');

	//ASSET
//	Route::get('pagchain/create-user/{client}', 'Commons\PagChainController@createUser');

	Route::get('pagchain/get-node', 'Commons\PagChainController@getNode');
	Route::get('pagchain/create-document/{work}', 'Commons\PagChainController@createStream');
	Route::get('pagchain/probe-document/{work}', 'Commons\PagChainController@probeTransaction')->name('pagchain.probe');
	Route::get('pagchain/get-document/{work}', 'Commons\PagChainController@getStream');

	//address
	//1Yt6325R6jwyAZxFbYRUtTkGWvStQK3GudjXfK

	//userId
	//ek63Lk3llXLJi1BVloJDeyzR9Zyspaue

	Route::get('moip/plans/create', function(){
		$attributes = [
			'name'          => 'xBásico',
			'description'   => 'xPlano Básico',
			'amount'        => 45 * 100,
			'setup_fee'     => 0,
			'interval'      => [
				'length'=>  1,
				'unit'  =>  "MONTH",
			],
			'billing_cycles'=> 12,
			'trial'         => [
				'days'          =>  7,
				'enabled'       =>  true,
				'hold_setup_fee'=>  true,
			],
            'payment_method' => "ALL",
			'options'       => [true,true,true,true,true,true,true,false,false,false],
			'registers'     => 10,
			'status'=> 1,
			'active'=> 1,
		];
		return App\Models\Plans\Plan::create($attributes);
	});

	Route::get('moip/customers/create', function(){

		$client = \App\Models\Clients\Client::find(1);
		$data = $client->getFormattedMoipUser();

		$moip = new \App\Helpers\MoipHelper();
		$customers = $moip->customers();
		return $customers->create($data);

	});

	Route::get('moip/plans/{id}', function($id){
		$Plan = App\Models\Plans\Plan::find(1);
		return $Plan;
	});

	Route::get('moip/plans', function(){
		return $Plans = App\Models\Plans\Plan::all();
	});

} );
