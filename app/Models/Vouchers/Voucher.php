<?php

namespace App\Models\Vouchers;

use App\Models\Clients\Invoice;
use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'invoice_id',
		'code',
		'name',
		'registers',
		'value',
	];


	//============================================================
	//======================== RELASHIONSHIP =====================
	//============================================================

	public function invoice()
	{
		return $this->hasOne(Invoice::class);
	}
}