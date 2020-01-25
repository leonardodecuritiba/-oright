<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WorkRequest extends FormRequest {
	private $table = 'works';

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		if ( $this->client_work != null ) {
			return Auth::user()->client->isMyWork( $this->client_work );
		}
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
        if($this->has('cover')){
            $size = config('orights.works.cover.size') * 1000;
            $rules['cover'] = 'max:' . $size . '|mimes:'  . config('orights.works.cover.mimes');
        }
		switch ( $this->method() ) {
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{
					$rules = [
						'category_id'  => 'required|exists:categories,id',
						'title'        => 'required|min:3|max:200|unique:' . $this->table,
						'descriptions' => 'required|min:3|max:500'
					];
					return $rules;
				}
			case 'PUT':
			case 'PATCH':
				{
					$rules = [
						'category_id'  => 'required|exists:categories,id',
						'title'        => 'required|min:3|max:200|unique:' . $this->table . ',title,' . $this->client_work . ',id',
						'descriptions' => 'required|min:3|max:500'
					];
					return $rules;
				}
			default:
				break;
		}
	}
}

