<?php

namespace App\Http\Requests\Admin\Clients;

use App\Models\Clients\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest {
	private $table = 'clients';

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
		/*
		contact_id
		address_id
		type
		*/
		$this->formatInput();


		if ( $this->get( 'type' ) ) {
			//juridica
			$rules = [
				'cnpj'         => 'required|min:3|max:20|unique:' . $this->table . ',cnpj',
				'ie'           => ( $this->get( 'isention_ie' ) ) ? '' : 'required|min:3|max:20|unique:' . $this->table . ',ie',
				'fantasy_name' => 'required|min:3|max:100',
				'company_name' => 'required|min:3|max:100',
				'foundation'   => 'required',
			];

		} else {
			//fisica
			$rules = [
				'cpf'  => 'required|min:3|max:20|unique:' . $this->table . ',cpf',
				'rg'   => 'required|min:3|max:20|unique:' . $this->table . ',rg',
				'name' => 'required|min:3|max:100',
			];
		}
		$rules['name']     = 'required|min:3|max:100';
		$rules['email']    = 'required|email|min:3|max:100|unique:users,email';
		$rules['password'] = 'required|min:3|max:100';
		$rules['city_id']  = 'required|exists:cep_cities,id';
		$rules['state_id'] = 'required|exists:cep_states,id';


		return $rules;
	}

	public function formatInput() {
		if ( $this->has( 'isention_ie' ) ) {
			$this->merge( [ 'isention_ie' => 1 ] );
		} else {
			$this->merge( [ 'isention_ie' => 0 ] );
		}
	}
}

