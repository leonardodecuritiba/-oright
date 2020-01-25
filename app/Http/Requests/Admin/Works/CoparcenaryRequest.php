<?php

namespace App\Http\Requests\Admin\Works;

use App\Models\Works\Coparcenary;
use App\Models\Works\Work;
use Illuminate\Foundation\Http\FormRequest;

class CoparcenaryRequest extends FormRequest {
	private $table = 'coparcenaries';

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
//		$coparcenaries = Coparcenary::where('work_id',$this->get('work_id'))->get();
//		dd($coparcenaries);
		switch ( $this->method() ) {
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{

					if($this->get('user_id')!=NULL){
						return [
							'user_id'  => 'required|exists:users,id',
							'email' => 'required|email|min:3|max:100',
						];
					}
					return [
						'name'  => 'required|min:3|max:100',
						'email' => 'required|email|min:3|max:100',
					];
				}
			default:
				break;
		}
	}
}

