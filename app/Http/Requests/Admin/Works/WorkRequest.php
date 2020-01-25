<?php

namespace App\Http\Requests\Admin\Works;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest {
	private $table = 'works';

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
		$size = config('orights.works.cover.size') * 1000;
		switch ( $this->method() ) {
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{
					return [
						'title'        => 'required|min:3|max:200',//|unique:' . $this->table . ',title',
						'descriptions' => 'required|min:3|max:500',
						'cover'        => 'file|max:' . $size . '|mimes:' . config('orights.works.work_files.mimes')
					];
				}
			case 'PUT':
			case 'PATCH':
				{
					return [
						'title'        => 'required|min:3|max:200',
						//|unique:' . $this->table . ',title,' . $this->work . ',id',
						'descriptions' => 'required|min:3|max:500',
						'descriptions' => 'required|max:500',
						'cover'        => 'file|max:' . $size . '|mimes:' . config('orights.works.work_files.mimes')
					];
				}
			default:
				break;
		}
	}
}

