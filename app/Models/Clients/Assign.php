<?php

namespace App\Models\Clients;

use App\Helpers\DataHelper;
use App\Helpers\MoipHelper;
use App\Http\Requests\Client\AssignPayRequest;
use App\Models\Plans\Plan;
use App\Traits\CommonTrait;
use App\Traits\Relashionship\ClientTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assign extends Model {
	use SoftDeletes;
	use CommonTrait;
	use ClientTrait;
	public $timestamps = true;
	protected $fillable = [
		'client_id',
		'plan_id',
		'code',
		'status',
		'amount',
		'registers',
		'expiration_date',
		'next_invoice_date',
	];
	//============================================================

//	const _SITUATION_PENDENT_   = 0;
//	const _SITUATION_ACTIVE_    = 1;
//	const _SITUATION_INACTIVE_  = 2;
//	const _SITUATION_CANCELED_  = 3;

	const _SITUATION_ACTIVE_    = 'ACTIVE';
	const _SITUATION_SUSPENDED_ = 'SUSPENDED';
	const _SITUATION_EXPIRED_   = 'EXPIRED';
	const _SITUATION_OVERDUE_   = 'OVERDUE';
	const _SITUATION_CANCELED_  = 'CANCELED';
	const _SITUATION_TRIAL_     = 'TRIAL';

	const _PAYMENT_METHOD_      = 'CREDIT_CARD';

	//============================================================
	//======================== FUNCTIONS =========================
	//============================================================
//	static public function newAssign(array $data)
//	{
//	    if(isset($data['voucher_id'])){
//	        //atrelar voucher_id
//            $plan = Plan::find($data['plan_id']);
//        }
//		$data['status'] = self::_SITUATION_PENDENT_;
//		return parent::create($data);
//	}

	public function newInvoice()
	{
		return Invoice::create([
			'assign_id' => $this->attributes['id'],
			'amount'    => $this->attributes['amount'],
		]);
	}

	public function getPlanPaypalButton()
	{
		return $this->plan->paypal_button;
	}

	public function cancel()
	{
		$this->setClientRegisters(0);

		//update status
		$this->update([
			'status' => self::_SITUATION_CANCELED_,
		]);

		//cancel active invoice
		return $this;
	}

	public function setClientRegisters( $registers )
	{
		$this->client->update([
			'registers' => $registers
		]);
	}

	public function pay(array $attributes)
	{
		$response = $this->payTroughtMoip($attributes);

		$this->update([
			'status'            => $response->status,
			'expiration_date'   => $response->expiration_date,
			'next_invoice_date' => $response->next_invoice_date,
		]);
		if($response->status == self::_SITUATION_TRIAL_ || $response->status == self::_SITUATION_ACTIVE_){
			$this->setClientRegisters($this->registers);
		}
		//pay active invoice
		$this->invoice->pay();
	}

	public function expire()
	{
		$this->setClientRegisters(0);

		//update status
		$this->update([
			'status' => self::_SITUATION_CANCELED_,
		]);

		//expire active invoice
		$this->invoice->expire();

		//new invoice
		return $this->newInvoice();
	}

	public function payTroughtMoip(array $attributes)
	{
		$next = Carbon::now()->addMonth();
		return (object)([
			'status'            => self::_SITUATION_ACTIVE_,
			'expiration_date'   => $next,
			'next_invoice_date' => $next,
		]);



		//pay trought Moip
		$MoipHelper = new MoipHelper();
		//se existe numero do cartao, entao é porque o user inseriu um cartao novo, VAMOS DAR UM UPDATE DO CARTAO

		if($attributes['new_credit_card']){
			dd('new_credit_card');
			$customers = $MoipHelper->customers();
			$credit_cart = [
				"credit_card"   => [
					"holder_name"       => $attributes['holder_name'],
					"number"            => $attributes['card_number'],
					"expiration_month"  => $attributes['expiration_month'],
					"expiration_year"   => substr($attributes['expiration_year'], 2,2)
				]
			];
			$response = $customers->updateBillingInfo($this->client->code, $credit_cart); //D8F64B44
		}

		$subscriptions = $MoipHelper->subscriptions();

		//criar uma fatura aqui (??)
		$data = ["code"             => $this->code,
		         "amount"           => $this->plan->amount,
		         "payment_method"   => self::_PAYMENT_METHOD_,
		         "plan"             => [ "code" => $this->plan->code ],
		         "customer"         => [ "code" => $this->client->code ]
		];

		//criando uma nova subscrição
		return json_decode($subscriptions->create($data));
	}

	//============================================================
	//======================== ASSESSORS =========================
	//============================================================

	public function getExpirationDateFormatted()
	{
		return DataHelper::getPrettyDate( $this->attributes['expiration_date'] );
	}

	public function getExpirationDateTime()
	{
		return strtotime( $this->attributes['expiration_date'] );
	}

	public function setExpirationDateAttribute($value)
	{
		$this->attributes['expiration_date'] = $value->year . '-' . $value->month . '-' . $value->day ;
	}

	public function setNextInvoiceDateAttribute($value)
	{
		$this->attributes['next_invoice_date'] = $value->year . '-' . $value->month . '-' . $value->day ;
	}

	public function isPaymentPendent()
	{
		return ($this->attributes['status'] == self::_SITUATION_OVERDUE_);
	}

	public function canCancel()
	{
		return (($this->attributes['status'] == self::_SITUATION_ACTIVE_) || ($this->attributes['status'] == self::_SITUATION_OVERDUE_));
	}

	public function getStatusText()
	{
		switch ($this->attributes['status']){
			case self::_SITUATION_ACTIVE_:
				return 'Ativo';
			case self::_SITUATION_SUSPENDED_:
				return 'Suspenso';
			case self::_SITUATION_EXPIRED_:
				return 'Expirado';
			case self::_SITUATION_OVERDUE_:
				return 'Pagamento Atrasado';
			case self::_SITUATION_CANCELED_:
				return 'Cancelado';
			case self::_SITUATION_TRIAL_:
				return 'Trial';
		}
	}

	public function getStatusColor()
	{
		switch ($this->attributes['status']){
			case self::_SITUATION_TRIAL_:
			case self::_SITUATION_ACTIVE_:
				return 'success';
			case self::_SITUATION_SUSPENDED_:
				return 'warning';
			case self::_SITUATION_EXPIRED_:
			case self::_SITUATION_OVERDUE_:
			case self::_SITUATION_CANCELED_:
				return 'danger';
		}
	}

	public function getValue2Currency()
	{
		return DataHelper::getFloat2Currency( $this->getValue() );
	}

	public function getValue()
	{
		return $this->attributes['amount'] / 100;
	}

	public function getPlanValue()
	{
		return $this->plan->amount;
	}

	public function getPlanValue2Currency()
	{
		return $this->plan->getValue2Currency();
	}

	public function getPlanName()
	{
		return $this->plan->getName();
	}


	public function getPlanNameDetails()
	{
		return $this->getPlanName() . ' / ' . $this->plan->registers . ' registros';
	}

	public function getShortName()
	{
		return $this->getPlanName();
	}

	public function getShortTitle()
	{
		return str_limit( $this->getAttribute( 'title' ), 20 );
	}

	public function getShortDescriptions()
	{
		return str_limit( $this->getAttribute( 'descriptions' ), 20 );
	}

	/**
	 * Scope a query to only include exist.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeExist($query)
	{
		return $query->where('status', self::_SITUATION_ACTIVE_)
		                ->orWhere('status',Assign::_SITUATION_OVERDUE_)
						->orWhere('status', self::_SITUATION_TRIAL_);
	}
	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeActive($query)
	{
		return $query->where('status', self::_SITUATION_ACTIVE_)
					->orWhere('status', self::_SITUATION_TRIAL_);
	}

	//============================================================
	//======================== RELASHIONSHIP =====================
	//============================================================

	public function plan()
	{
		return $this->belongsTo(Plan::class);
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class);
	}

	public function invoice()
	{
		return $this->hasOne( Invoice::class)->where('expired','=',0);
	}
}