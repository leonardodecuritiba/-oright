<?php

namespace App\Traits;

trait SlugTrait {

	static public function findOrFailBySlugName($slug_url) {

		$data = self::active()->where('slug_url',$slug_url)->first();
		if(count($data) > 0){
			return $data;
		}
		return abort(404);
	}

}