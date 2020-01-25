<?php

namespace App\Helpers;

use App\Models\Clients\Client;
use App\Models\Commons\Config;

class PagchainHelper {

	// Your ID and token
	static public $api_url      = 'https://api.pagchain.com/v1';
	static public $_DEBUG_      = false;

	static public $username     = 'wendelltoledo@me.com';
	static public $pwd          = 'a1234567';

	public $endpoint;
	public $assetName;
	public $userPwd             = '123';
	public $userRole            = 5;
	public $qtdAmount           = 1;
	public $assetAddress;
	public $curl;
	public $authToken;


	public function __construct()
	{
		//Begin Communication
		$this->authToken = $this->authToken = Config::getValueByField('pagchain-token');
		$asset = json_decode(Config::getValueByField('pagchain-asset-name'));
		$this->assetName = $asset->name;
		$this->assetAddress = $asset->address;
		$this->curl = curl_init();

		//login
		$this->login();
	}

	//	================================================================
	//	=================== ACCESS =====================================
	//	================================================================

	public function createUser( Client $client)
	{

		$data = $client->getFormattedPagchainUser();

		$this->endpoint = "/service";
		$postData = array(
			'service'=>'createUser',
			'data'=>[
				'userFirstName' => $data['first_name'],
				'userLastName'  => $data['last_name'],
				'userRole'      => $this->userRole,
				'cellPhone'     => $data['cellphone'],
				'userEmail'     => $data['email'],
				'userPassword'  => $this->userPwd,
			],
		);


		$data = $this->send($postData);

		/*
		 *
		    {
			    "success": true,
			    "timeRequest": "276ms",
			    "data": {
			        "isMaster": false,
			        "assetType": "userWallet",
			        "balances": [],
			        "isSpent": false,
			        "companyId": "lgTUZp6B9jQNe3BbyxbUEJSbdZxKbbCy",
			        "userId": "nXMeeZE16r7uXOsam8i8E8efCC_LJI9r",
			        "created": "2018-03-07T17:45:48.633Z",
			        "address": "1CAdYkzVv4vCCyQ4ZMsLi2ogT81iTmkcYerLUL",
			        "label": "ÚltimoNome wallet ",
			        "active": true,
			        "isOpen": false,
			        "adminActive": true,
			        "assetId": "163VuDh5t6nnG_IW1t-_eypPbKmVRNv0",
			        "grantTransactionId": "9e96891ea572a046b8f1cf7d9cfb4bde12a9e2bf5f736671af37bcada657b42f",
			        "hotAddress": "2647f4995453a41a9dd88eafd05b08fd296496e70cc2d6767e07e349f0cf21ee3d85bb031469421736db7b0eb691486c9a05b4bd5f3e9ccc",
			        "details": "Default user wallet"
			    }
			}
		 */

		return $data['data'];

	}

	public function checkStatus( )
	{

		$this->endpoint = "/check";
		$postData = [
			'service'=>'checkToken'
		];

		return $this->send($postData);

	}

	public function login( )
	{

		$this->endpoint = "";
		$status = $this->checkStatus();

		if(!$status['success']){
			$userData = [
				'username' => self::$username,
				'password' => self::$pwd,
			];

			$data = $this->getNewToken($userData);
			$newToken = $data['data']['token'];

			//UPDATE CONFIG
			Config::updateByField('pagchain-token', $newToken);

			//UPDATE LOCAL TOKEN
			$this->authToken = $newToken;
		}
	}

	public function getNewToken( array $data)
	{

		$this->endpoint = "/auth";
		$postData = [
			'data'=>[
				'username' => $data['username'],
				'password' => $data['password'],
			],
		];

		return $this->send($postData);

	}

	//	================================================================
	//	=================== DATASTREAM =================================
	//	================================================================

	public function createAsset( array $data)
	{

		$this->endpoint = "/service";
		$postData = [
			'service'=>'createAsset',
			'data'=>[
				'name'      => $this->assetName, //Nome do meu asset
				'assetType' => "materialItem", //É sempre o mesmo? É uma unidade de Registro
				'qtd'       => $data['qtd'],
				'details'   => $this->assetName // Usado para facilitar buscas futuras
			],
		];

		$data = $this->send($postData);
		/*
		    success: true,
			timeRequest: "232ms",
			data: {
				txnId: "43bd38bcd88a1100654bec11b1012da7c3d01fbc4d4534df4669c734b9e543f5",
				address: "1Rbw31UQyUm2YZQFpkSJzkXFrt29BcBzVriwQc"
			}
		 */

		$this->assetAddress = $data['data']['address'];


		Config::updateByField('pagchain-asset-name', json_encode([
			'name'      => $this->assetName,
			'address'   => $this->assetAddress
		]));

		return $data;
	}

	public function getAssetBalance( )
	{
		//$address = "1Z46tma4W5Dg2HnqTvibqbqpaqopwuao1UKtJz"
		$this->endpoint = "/service";
		$postData = array(
			'service'=>'getAssetBalance',
			'data'=>[
				'address' => $this->assetAddress
			],
		);

//		dd($postData );
		return $this->send($postData);

	}

	public function getBlockData( $blockHash )
	{

		$this->endpoint = "/service";
		$postData = [
			'service'=>'getBlockData',
			'data'=>[
				'blockHash' => $blockHash,
				'deep'      => 1,
			],
		];

		return $this->send($postData);
	}

	public function createStream(array $header, array $body )
	{
		$this->endpoint = "/service";
		$postData = [
			'service'=>'assetTransferComplete',
			'data'=>[
				'details'       => $header['details'],
				'assetName'     => $this->assetName,
				'streamName'    => $header['title'],
				'isDeposit'     => true,
				'from'          => $header['from'],
				'to'            => $header['to'],
				'qtdAmount'     => $this->qtdAmount,
				'open'          => false, //open to update?
				'documentBody'  => $body,
			],
		];

		$data = $this->send($postData);

		if(!$data['success']){
			abort(500, 'Erro ao gerar novo Registro Blockchain! (' . $data['data']['message'] . ')');
		}

		return $data['data'];

	}

//	public function createStream(array $header, array $body )
//	{
//		$this->endpoint = "/service";
//		$postData = [
//			'service'=>'ases',
//			'data'=>[
//				'title'     => $header['title'],
//				'details'   => $header['details'],
//				'assetName' => $this->assetName,
//				'addressTo' => $header['addressTo'],
//				'assetQty'  => $this->qtdAmount,
//				'open'      => false, //open to update?
//				'body'      => $body,
//			],
//		];
//
//		$data = $this->send($postData);
//
//		if(!$data['success']){
//			abort(500, 'Erro ao gerar novo Registro Blockchain! (' . $data['data']['message'] . ')');
//		}
//
//		return $data['data'];
//
//	}

	public function getStream( $transactionId )
	{

        $this->endpoint = "/service";
        $postData = array(
            'service'=>'getStream',
            'data'=>[
                'transactionId' => $transactionId
            ],
        );

        return $this->send($postData);


    }

	public function probeTransaction( $transactionId )
	{

		$this->endpoint = "/service";
		$postData = array(
			'service'=>'probeTransaction',
			'data'=>[
				'transactionId' => $transactionId
			],
		);

        $data = $this->send($postData);
        return $data['data'];

	}

	//	================================================================
	//	===================== FUNCTIONS ================================
	//	================================================================

	public function checkBlockchainApiHealth( )
	{

		$this->endpoint = "/service";
		$postData = [
			'service'=>'checkBlockchainApiHealth'
		];

		return $this->send($postData);

	}

	public function getNodeInfo( )
	{

		$this->endpoint = "/service";
		$postData = [
			'service'=>'getNodeInfo'
		];

		return $this->send($postData);

	}

	//	================================================================
	//	================================================================
	//	================================================================

	public function send( $postData )
	{
		curl_setopt($this->curl, CURLOPT_URL, self::$api_url . $this->endpoint);
		curl_setopt_array($this->curl, array(
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => array(
				'Authorization: '.$this->authToken,
				'Content-Type: application/json'
			),
			CURLOPT_POSTFIELDS => json_encode($postData)
		));

		// Send the request
		$response = curl_exec($this->curl);

		// Check for errors
		if($response === FALSE){
			die(curl_error($this->curl));
		}

		// Decode the response
		$responseData = json_decode($response, TRUE);

		// Print the date from the response
		return $responseData;
	}




	//	================================================================
	//	=================== REGISTER ===================================
	//	================================================================

	static public function createCompany( )
	{
		$postData = [
			'data'=> [
				'companyName'               =>  'Artluv Representações Eireli',
				'companyCountry'            =>  'BR',
				'companyCity'               =>  'Santana de Parnaíba',
				'companyAddress'            =>  'Alameda Franca, 1197',
				'companyComplement'         =>  'd',
				'companyDocument'           =>  '43.374.768/0003-08',
				'companyPhone'              =>  '+ 55 11 94141 3137',
				'companyType'               =>  'Innovation Startup',
				'companyEmployeesNumber'    =>  '1',
				'companyState'              =>  'São Paulo',
				'userFirstName'             =>  'Wendell',
				'userLastName'              =>  'Toledo',
				'cellPhone'                 =>  '+ 55 11 94141 3137',
				'userEmail'                 =>  self::$username,
				'userPassword'              =>  self::$pwd,
			],
		];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, self::$api_url . '/createCompany');
		curl_setopt_array($curl, array(
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
			CURLOPT_POSTFIELDS => json_encode($postData)
		));

		// Send the request
		$response = curl_exec($curl);

		// Check for errors
		if($response === FALSE){
			die(curl_error($curl));
		}

		// Decode the response
		$responseData = json_decode($response, TRUE);

		// Print the date from the response
		return $responseData;
	}


}
