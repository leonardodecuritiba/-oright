<?php

namespace App\Http\Requests\Admin\Works;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
	private $table = 'categories';

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
						'title'        => 'required|min:3|max:100|unique:' . $this->table . ',title',
						'descriptions' => 'required|min:3|max:100',
					];
				}
			case 'PUT':
			case 'PATCH':
				{
					return [
						'title'        => 'required|min:3|max:100|unique:' . $this->table . ',title,' . $this->category . ',id',
						'descriptions' => 'required|min:3|max:100',
					];
				}
			default:
				break;
		}
	}
}

