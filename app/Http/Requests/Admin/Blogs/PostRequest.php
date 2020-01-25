<?php

namespace App\Http\Requests\Admin\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {
	private $table = 'posts';

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
		$size = config('orights.posts.short_image.size') * 1000;
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
						'content'      => 'required|min:3|max:16777215',
						'short_image'  => 'max:' . $size . '|mimes:'  . config('orights.posts.short_image.mimes'),
					];
				}
			case 'PUT':
			case 'PATCH':
				{
					$rules = [
						'title'        => 'required|min:3|max:100|unique:' . $this->table . ',title,' . $this->post . ',id',
						'content'      => 'required|min:3|max:16777215',
					];

					if($this->has('short_image')){
						$rules['short_image'] = 'max:' . $size . '|mimes:'  . config('orights.posts.short_image.mimes');
					}

					return $rules;
				}
			default:
				break;
		}
	}
}

