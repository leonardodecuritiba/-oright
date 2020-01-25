<?php

namespace App\Models\Commons;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {
	public $timestamps = true;
	protected $fillable = [
		'field',
		'field_type',
		'field_name',
		'value',
	];

	static public function updateByField($field, $value)
	{
		return self::where(['field'  =>  $field])->update(['value' => $value]);
	}

	static public function getValueByField($field)
	{
		$config = self::where(['field'  =>  $field])->firstOrFail();
		return $config->value;
	}

}
