<?php

namespace App\Http\Controllers\Commons;

use App\Helpers\PagchainHelper;
use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Models\Works\Work;
use Illuminate\Http\Request;

class PagChainController extends Controller
{
	public function createCompany()
	{
		return PagchainHelper::createCompany();
	}

	public function getNode()
	{
		$pagchain = new PagchainHelper();
		return $pagchain->getNodeInfo();
	}

	public function createAsset()
	{
		$pagchain = new PagchainHelper();
		return $pagchain->createAsset(['qtd' => 50000]);
	}

	public function getAssetBalance()
	{
		$pagchain = new PagchainHelper();
		return $pagchain->getAssetBalance();
	}

	public function probeTransaction(Work $work)
	{
		$pagchain = new PagchainHelper();
		return $pagchain->probeTransaction($work->getTransactionId());
	}


	public function getStream(Work $work)
	{
		$pagchain = new PagchainHelper();
		return $pagchain->getStream($work->getTransactionId());
	}

	public function createUser(Client $client)
	{
		$pagchain = new PagchainHelper();
		return $pagchain->createUser($client);
	}
}
