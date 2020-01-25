<?php

namespace App\Traits\Relashionship;

use App\Models\Clients\Client;

trait ClientTrait {


	public function getClientPagchainAddress()
	{
		return $this->client->pagchain_address;
	}

	public function getClientName()
	{
		return $this->client->getName();
	}

	public function getClientShortName()
	{
		return $this->client->getShortName();
	}

	public function client()
	{
		return $this->belongsTo(Client::class);
	}


}