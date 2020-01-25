<?php

namespace App\Http\Requests\Admin\Works;

use Illuminate\Foundation\Http\FormRequest;

class WorkFileRequest extends FormRequest {
	private $table = 'work_files';

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
	    $rules = [
            'title'        => 'required|min:3|max:200',
            'descriptions' => 'required|min:3|max:500',
            'link'         => 'required|file|max:' . $size . '|mimes:' . config('orights.works.work_files.mimes')
        ];
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

