<?php

namespace App\Models\Clients;

use App\Models\Works\Work;
use App\Traits\CommonTrait;
use App\Traits\Relashionship\ClientTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model {
	use SoftDeletes;
	use CommonTrait;
	use ClientTrait;
	public $timestamps = true;
	protected $fillable = [
		'client_id',
		'ref_id',
		'in_out', //0:in (invoice) - 1:out (work)
		'quantity',
	];

	//============================================================
	//======================== FUNCTIONS =========================
	//============================================================


	//============================================================
	//======================== ASSESSORS =========================
	//============================================================
	public function getType()
	{
		return $this->attributes['in_out'] ? 'Registro' : 'Crédito';
	}

	public function getColor()
	{
		return $this->attributes['in_out'] ?  'danger' : 'success';
	}

	public function getValue()
	{
		return $this->attributes['in_out'] ? '-' : $this->invoice->getValue();
	}

	public function getValue2Currency()
	{
		return $this->attributes['in_out'] ? '-' : $this->invoice->getValue2Currency();
	}

	public function getDescription()
	{
		return ($this->attributes['in_out']) ?
			'Trabalho (#' . $this->attributes['ref_id'] . ')'
			:
			'Assinatura Plano '.$this->invoice->getPlanName();
	}

	public function getUrl()
	{
		return ($this->attributes['in_out']) ? route('client_works.edit',$this->attributes['ref_id']) : NULL;
	}


	public function getAdminUrl()
	{
		return ($this->attributes['in_out']) ? route('works.edit',$this->attributes['ref_id']) : NULL;
	}

	//============================================================
	//======================== SCOPE =============================
	//============================================================
	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeIn($query)
	{
		return $query->where('in_out', 0);
	}
	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeOut($query)
	{
		return $query->where('in_out', 1);
	}
	//============================================================
	//======================== RELASHIONSHIP =====================
	//============================================================

	public function invoice()
	{
		return $this->belongsTo(Invoice::class,'ref_id');
	}

	public function work()
	{
		return $this->belongsTo(Work::class,'ref_id');
	}
}