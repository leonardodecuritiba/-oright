<?php

namespace App\Http\Requests\Admin\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest {
	private $table = 'blog_categories';

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
						'title'        => 'required|min:3|max:100|unique:' . $this->table . ',title,' . $this->blog_category . ',id',
						'descriptions' => 'required|min:3|max:100',
					];
				}
			default:
				break;
		}
	}
}

