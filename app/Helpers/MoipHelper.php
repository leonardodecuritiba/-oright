<?php

namespace App\Helpers;

use Prettus\Moip\Subscription\MoipClient;
use Prettus\Moip\Subscription\Api;

class MoipHelper {

	static public $_DEBUG_ = true;

	private $api;

	public function __construct()
	{
		die('DIE-MOIP-ERROR');
		$client = new MoipClient(env('MOIP_TOKEN'),env('MOIP_KEY'), self::$_DEBUG_ ? MoipClient::SANDBOX : MoipClient::PRODUCTION);
		$this->api = new Api($client);
	}


	public function customers()
	{
		return $this->api->customers();
	}

	public function invoices()
	{
		return $this->api->invoices();
	}

	public function payments()
	{
		return $this->api->payments();
	}

	public function plans()
	{
		return $this->api->plans();
	}

	public function preferences()
	{
		return $this->api->preferences();
	}

	public function subscriptions()
	{
		return $this->api->subscriptions();
	}




}
