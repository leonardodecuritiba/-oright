<?php

namespace App\Traits;

use App\Helpers\PagchainHelper;

trait PagChainClientTrait {


	public function createPagchainUser() {
//		return [
//			"address"   => "1CAdYkzVv4vCCyQ4ZMsLi2ogT81iTmkcYerLUL",
//			"userId"    => "nXMeeZE16r7uXOsam8i8E8efCC_LJI9r",
//		];
		$pagchain = new PagchainHelper();
		return $pagchain->createUser($this);
	}

	public function getFormattedPagchainUser()
	{
		return array(
			'first_name'    => $this->getName(),
			'last_name'     => '',
			'cellphone'     => $this->contact->cellphone,
			'email'         => $this->user->email,
		);
	}
}