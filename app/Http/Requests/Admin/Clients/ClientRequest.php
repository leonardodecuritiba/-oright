<?php

namespace App\Http\Requests\Admin\Clients;

use App\Models\Clients\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest {
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

		$client = Client::find( $this->client );

		if ( $client->type ) {
			return [
				'cnpj'         => 'required|min:3|max:20|unique:' . $this->table . ',cnpj,' . $client->id . ',id',
				'ie'           => ( $this->get( 'isention_ie' ) == 1 ) ? '' : 'required|min:3|max:20|unique:' . $this->table . ',ie,' . $client->id . ',id',
				'fantasy_name' => 'required|min:3|max:100',
				'company_name' => 'required|min:3|max:100',
				'foundation'   => 'required',
			];

		} else {
			return [
				'cpf'  => 'required|min:3|max:20|unique:' . $this->table . ',cpf,' . $client->id . ',id',
				'rg'   => 'required|min:3|max:20|unique:' . $this->table . ',rg,' . $client->id . ',id',
				'name' => 'required|min:3|max:100',
			];
		}
	}

	public function formatInput() {
		if ( $this->has( 'isention_ie' ) ) {
			$this->merge( [ 'isention_ie' => 1 ] );
		} else {
			$this->merge( [ 'isention_ie' => 0 ] );
		}
	}
}

