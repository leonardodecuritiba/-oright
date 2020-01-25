<?php

namespace App\Models\Clients;

use App\Models\Admins\Admin;
use App\Models\Users\User;
use App\Notifications\NotifyAdminsPayInvoice;
use App\Notifications\NotifyPayInvoice;
use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Notification;

class Invoice extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'assign_id',
		'paid_at',
		'amount',
		'end_at',
		'expired',
	];

	//============================================================
	//======================== FUNCTIONS =========================
	//============================================================
	public function cancel()
	{
		return $this->update(['expired'=>1]);
	}

	public function pay()
	{
		//new register
		$assign = $this->assign;
		Register::create([
			'client_id' => $assign->client_id,
			'ref_id'    => $this->attributes['id'],
			'in_out'    => 0,
			'quantity'  => $assign->registers,
		]);

		$assign->client->user->notify(new NotifyPayInvoice($this));

		$admin_ids = Admin::active()->pluck('user_id');
		$users = User::whereIn('id',$admin_ids)->get();
		Notification::send($users, new NotifyAdminsPayInvoice($assign->client));

		$now = Carbon::now();
		return $this->update([
			'paid_at'   => $now,
			'end_at'    => $now->copy()->addMonth(),
		]);


	}

	public function expire()
	{
		return $this->update(['expired'=>1]);
	}

	//============================================================
	//======================== ASSESSORS =========================
	//============================================================

	public function getPlanName()
	{
		return $this->assign->getPlanName();
	}

	public function getValue()
	{
		return $this->attributes['amount'];
	}


	//============================================================
	//======================== RELASHIONSHIP =====================
	//============================================================

	public function assign()
	{
		return $this->belongsTo(Assign::class);
	}

	public function register()
	{
		return $this->hasOne(Register::class,'ref_id');
	}
}