<?php

namespace App\Http\Requests\Client;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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

		if ( $this->get( 'type' ) ) {
			$rules = [
				'cnpj'          => 'required|min:3|max:20|unique:' . $this->table . ',cnpj',
				'ie'            => ( $this->get( 'isention_ie' ) ) ? '' : 'required|min:3|max:20|unique:' . $this->table . ',ie',
				'fantasy_name'  => 'required|min:3|max:100',
				'company_name'  => 'required|min:3|max:100',
				'foundation'    =>  'required|date_format:d/m/Y|before:today',
			];
			//juridica

		} else {
			//fisica
			$rules = [
				'cpf'       => 'required|min:3|max:20|unique:' . $this->table . ',cpf',
				'rg'        => 'required|min:3|max:20|unique:' . $this->table . ',rg',
				'name'      => 'required|min:3|max:100',
				'birthday'  =>  'required|date_format:d/m/Y|before:today',// . date('d/m/Y'),
			];
		}
//		dd(date('d/m/Y'));
		$rules['city_id']      = 'required|exists:cep_cities,id';
		$rules['state_id']     = 'required|exists:cep_states,id';
        $rules['phone'] = 'required|min:10|max:11';
		$rules['observations'] = 'max:500';
//		dd($rules);
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
					$id = Auth::user()->client->id;
					if ( $this->get( 'type' ) ) {
						$rules['cnpj'] = 'required|min:3|max:20|unique:' . $this->table . ',cnpj,' . $id . ',id';
						$rules['ie']   = ( $this->has( 'isention_ie' ) == 1 ) ? '' : 'required|min:3|max:20|unique:' . $this->table . ',ie,' . $id . ',id';
						//juridica

					} else {
						//fisica
						$rules['cpf'] = 'required|min:3|max:20|unique:' . $this->table . ',cpf,' . $id . ',id';
						$rules['rg']  = 'required|min:3|max:20|unique:' . $this->table . ',rg,' . $id . ',id';
					}

					return $rules;
				}
			default:
				break;
		}
	}

	public function formatInput() {
		if ( $this->has( 'isention_ie' ) ) {
			$this->merge( [ 'isention_ie' => 1 ] );
		} else {
			$this->merge( [ 'isention_ie' => 0 ] );
		}
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'birthday.before' => ':attribute deve ser uma data antes de hoje.',
			'foundation.before'  => ':attribute deve ser uma data antes de hoje.',
		];
	}
}

