<?php

namespace App\Traits;

use App\Helpers\DataHelper;
use App\Helpers\PagchainHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait BlockChainTrait {

	public function createBlockChainStream()
	{
		$header = array(
            'title'     => $this->id,
			'details'   => $this->getTitle(),
			'from'      => $this->getClientPagchainAddress(),
			'to'        => $this->client->user->email,
		);

		$body = array(
			'id'    => 'TESTE'
		);

		$pagchain = new PagchainHelper();
		$data = $pagchain->createStream($header, $body);

		return $this->update([
			'pagchain_key'           => $data['key'],
			'pagchain_transactionId' => $data['transactionId'],
			'registered_at'          => Carbon::now()
		]);
	}

	public function getRegisteredAtFormatted()
	{
		return DataHelper::getPrettyDateTime($this->attributes['registered_at']);
	}

	public function getGenerateBlockchainLink()
	{
		if (Auth::check()){
			if(Auth::user()->is('admin')){
				return route('works.gen_blockchain',$this->attributes['id']);
			} else {
				return route('client_works.gen_blockchain',$this->attributes['id']);
			}
		}
	}

	public function hasBlockchain()
	{
		return ($this->getAttribute('pagchain_key') != NULL);
	}

	public function getBlockchainStatusColor()
	{
		return $this->hasBlockchain() ? 'success' : 'danger';
	}

    public function getPrivateKey()
    {
        return $this->getAttribute('private_key');
    }


    public function getBlockchainKey()
    {
        return '∞' . $this->getAttribute('pagchain_key');
    }
    public function getBlockchainKeyClean()
    {
        return $this->getAttribute('pagchain_key');
    }

	public function getTransactionId()
	{
		return $this->getAttribute('pagchain_transactionId');
	}

	public function getBlockchainStatusText()
	{
		return $this->hasBlockchain() ? 'Registro Blockchain gerado' : 'Registro Blockchain não gerado';
	}
}