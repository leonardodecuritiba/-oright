<?php
/**
 * Created by PhpStorm.
 * User: Leonardo
 * Date: 01/12/2016
 * Time: 12:02
 */


namespace App\Observers\Clients;

use App\Helpers\DataHelper;
use App\Models\Clients\Assign;

class AssignObserver
{
	/**
	 * Listen to the User create event.
	 *
	 * @param  Assign $assign
	 * @return void
	 */
	public function creating(Assign $assign)
	{
		$plan               = $assign->plan;
		$assign->code       = DataHelper::NewGuid(1);
		$assign->amount     = $plan->amount;
		$assign->status     = Assign::_SITUATION_OVERDUE_;
		$assign->registers  = $plan->registers;
	}

	/**
	 * Listen to the User create event.
	 *
	 * @param  Assign $assign
	 * @return void
	 */
	public function created(Assign $assign)
	{
		$assign->newInvoice();
	}

}