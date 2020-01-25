<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;

class AssignPayRequest extends FormRequest {
	private $table = 'assigns';

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

//		$year = date('Y');
//		$rules = [
//			'number'        => 'required|min:3|max:16',
//			'month'         => 'required|digits:2|integer|min:0|max:12',
//			'year'          => 'required|digits:4|integer|min:' . $year . '|max:' . ($year+20),
//			'holder_name'   => 'required|min:3|max:100'
//		];
		$rules = array();
		if($this->get('new_credit_card')){

			$rules = [
				'card_number'       => ['required', new CardNumber],
				'expiration_year'   => ['required', new CardExpirationYear($this->get('expiration_month'))],
				'expiration_month'  => ['required', new CardExpirationMonth($this->get('expiration_year'))],
//			'cvc'               => ['required', new CardCvc($this->get('card_number'))]
			];
		}

		switch ( $this->method() ) {
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{

					return $rules;
				}
			case 'PUT':
			case 'PATCH':
				{
					return $rules;
				}
			default:
				break;
		}
	}
}

