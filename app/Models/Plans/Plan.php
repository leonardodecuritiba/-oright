<?php

namespace App\Models\Plans;

use App\Helpers\DataHelper;
use App\Models\Clients\Assign;
use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
        'code',
		'name',
		'description',
		'amount',
		'setup_fee', //usado pelo MOIP
		'interval',//unit,length //usado pelo MOIP
		'billing_cycles', //usado pelo MOIP
		'trial',//days,enabled,hold_setup_fee //usado pelo MOIP
		'payment_method', //usado pelo MOIP

		'registers',
		'options',
		'paypal_button', //usado pelo PAYPAL
		'status', //usado pelo MOIP
		'active'
	];

	static public $_DESCRIPTIONS_ = [
		'Envio de Propriedade Transparente',
		'Rastreio de Envio',
		'Acesso ao Painel de Controle',
		'QR Code',
		'Registro Web',
		'Registro Blockchain',
		'Selo de Autenticidade',
		'* Suporte Jurídico Inicial (vide termos de uso)',
		'Rastreamento por Semelhança Web',
		'Relatório Mensal'
	];

	static public function getAllToHome() {
		return self::active()->get();
	}

	static public function getAlltoSelectList() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortDescriptions()
			];
		} )->pluck( 'description', 'id' );
	}


    public function getIntervalText()
    {
        $interval = json_decode($this->attributes['interval']);
        return $interval->length . " Mês";
    }


    public function getTrialText()
    {
        $trial = json_decode($this->attributes['trial']);
        return ($trial->enabled) ? $trial->days . " dias" : "Sem período";
    }


	public function setIntervalAttribute($value)
	{
		return $this->attributes['interval'] = json_encode($value);
	}

	public function setTrialAttribute($value)
	{
		return $this->attributes['trial'] = json_encode($value);
	}


	public function setAmountAttribute($value)
	{
		$this->attributes['amount'] = $value * 100;
	}


	public function getFreeDaysAttribute()
	{
		return $this->trial->days;
	}

	public function getFreeAttribute()
	{
		return $this->trial->enabled;
	}

	public function getIntervalAttribute()
	{
		return json_decode($this->attributes['interval']);
	}

	public function getTrialAttribute()
	{
		return json_decode($this->attributes['trial']);
	}


	public function setOptionsAttribute($value)
	{
		return $this->attributes['options'] = json_encode($value);
	}


	public function getOption($i)
	{
		return  $this->options[$i];
	}


	public function getOptionsAttribute()
	{
		return  json_decode($this->attributes['options']);
	}

	public function getValue2Currency()
	{
		return DataHelper::getFloat2Currency( $this->getAttribute( 'amount' ) /100 );
	}

	public function getNameValueFormatted()
	{
		return $this->getTitle() . ' - ' . $this->getValue2Currency();
	}

	public function getName()
	{
		return $this->getAttribute( 'name' );
	}

	public function getAmount()
	{
		return $this->getAttribute( 'amount'  ) /100;
	}

	public function getValueFormattedFront()
	{
		return intval($this->getAttribute( 'amount' )/100);
	}

	public function getTitle()
	{
		return $this->getName();
	}

	public function getShortName()
	{
		return $this->getShortTitle();
	}

	public function getShortTitle()
	{
		return str_limit( $this->getTitle( ), 20 );
	}

	public function getShortDescriptions()
	{
		return str_limit( $this->getAttribute( 'description' ), 20 );
	}
	//============================================================
	//======================== RELASHIONSHIP =====================
	//============================================================

	public function assigns()
	{
		return $this->hasMany(Assign::class);
	}
}