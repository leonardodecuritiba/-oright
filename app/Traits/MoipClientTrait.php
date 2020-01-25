<?php

namespace App\Traits;

use App\Helpers\MoipHelper;

trait MoipClientTrait {


	public function getFormattedMoipUser()
	{
		return array(
			'code'              => $this->code,
			'email'             => $this->user->email,
			"fullname"          => $this->getName(),
			"cpf"               => $this->cpf,
			"phone_area_code"   => $this->contact->phone_area_code,
			"phone_number"      => $this->contact->phone_number,

			"birthdate_day"     => $this->birthdate_day,
			"birthdate_month"   => $this->birthdate_month,
			"birthdate_year"    => $this->birthdate_year,

			"address"           => $this->address->getFormattedMoip()
		);
	}

	public function getMoipData()
	{
		$MoipHelper = new MoipHelper();
		$customers = $MoipHelper->customers();
		return json_decode($customers->find($this->code));
	}

	public function getMoipCreditCard()
	{
		return NULL;
		$data = $this->getMoipData();
		if(!isset($data->billing_info)) return NULL;

		$credit_card = $data->billing_info->credit_cards[0];
		return $credit_card;
	}
}