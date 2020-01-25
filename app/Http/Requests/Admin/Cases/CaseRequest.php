<?php

namespace App\Http\Requests\Admin\Cases;

use Illuminate\Foundation\Http\FormRequest;

class CaseRequest extends FormRequest {
	private $table = 'cases';

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
		switch ( $this->method() ) {
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{
					return [
						'name'      => 'required|min:3|max:100',
						'function'  => 'required|min:3|max:50',
						'content'   => 'required|min:3|max:500',
						'cover'     => 'required|image',
					];
				}
			case 'PUT':
			case 'PATCH':
				{
					return [
						'name'      => 'required|min:3|max:100',
						'function'  => 'required|min:3|max:50',
						'content'   => 'required|min:3|max:500',
						'cover'     => 'image',
					];
				}
			default:
				break;
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
            'cover.required' => 'A imagem é obrigatória',
        ];
    }
}

