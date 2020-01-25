<?php

namespace App\Models\Commons;

use App\Helpers\DataHelper;
use App\Models\Clients\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model {
	use SoftDeletes;
	public $timestamps = true;
	protected $fillable = [
		'phone',
		'cellphone',
	];
	protected $appends = [
		'phone_area_code',
		'phone_number',
	];

	public function getPhoneAreaCodeAttribute() {
		return substr($this->attributes['cellphone'],0,2);
	}
	public function getPhoneNumberAttribute() {
		return substr($this->attributes['cellphone'],2,strlen($this->attributes['phone']));
	}

	public function setPhoneAttribute( $value ) {
		return $this->attributes['phone'] = DataHelper::getOnlyNumbers( $value );
	}

	public function setCellphoneAttribute( $value ) {
		return $this->attributes['cellphone'] = DataHelper::getOnlyNumbers( $value );
	}

	public function getFormatedPhone() {
		return DataHelper::mask( $this->attributes['phone'], '(##)####-####' );
	}

	public function getFormatedCellphone() {
		return DataHelper::mask( $this->attributes['cellphone'], '(##)#####-####' );
	}

	public function getCreatedAtAttribute( $value ) {
		return DataHelper::getPrettyDateTime( $value );
	}

	// ******************** RELASHIONSHIP ******************************
	public function client() {
		return $this->belongsTo( Client::class, 'contact_id' );
	}
}
