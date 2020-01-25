<?php

namespace App\Http\Requests\Admin\Plans;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest {
	private $table = 'plans';

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
		if($this->has('free')){
			$this->merge(['trial' => [
				'days'              => $this->get('free_days'),
				'enabled'           => true,
				'hold_setup_fee'    => false,
			]]);
		} else {
			$this->merge(['trial' => [
				'days'              => 0,
				'enabled'           => false,
				'hold_setup_fee'    => false,
			]]);
		}
		switch ( $this->method() ) {
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{
					return [
						'name'         => 'required|min:3|max:65|unique:' . $this->table . ',title',
						'description'  => 'required|min:3|max:65',
						'amount'       => 'required|numeric|between:0,10000',
						'registers'    => 'required|numeric',
					];
				}
			case 'PUT':
			case 'PATCH':
				{
					return [
						'name'          => 'required|min:3|max:65|unique:' . $this->table . ',name,' . $this->plan . ',id',
						'description'   => 'required|min:3|max:65',
						'amount'        => 'required|numeric|between:0,10000',
						'registers'     => 'required|numeric',
					];
				}
			default:
				break;
		}
	}
}

