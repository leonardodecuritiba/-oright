<?php

namespace App\Observers\Plans;

use App\Helpers\DataHelper;
use App\Helpers\MoipHelper;
use App\Models\Plans\Plan;
use Illuminate\Http\Request;

class PlanObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Client creating event.
	 *
	 * @param  \App\Models\Plans\Plan $plan
	 *
	 * @return void
	 */
	public function creating( Plan $plan )
	{
		$plan->code = DataHelper::NewGuid(1);

		/*
		$MoipHelper = new MoipHelper();
		$MoipPlan = $MoipHelper->plans();
		$MoipPlan->create( $plan->toArray() );
		*/
	}

	/**
	 * Listen to the Client updating event.
	 *
	 * @param  \App\Models\Plans\Plan $plan
	 *
	 * @return void
	 */
	public function saving( Plan $plan )
	{
		if($plan->code != NULL){
			/*
			$MoipHelper = new MoipHelper();
			$MoipPlan = $MoipHelper->plans();
			$MoipPlan->update($plan->code, $plan->toArray());
			if($plan->active){
				$MoipPlan->active($plan->code);
			} else {
				$MoipPlan->deactivate($plan->code);

			}
			*/

		}
	}

	/**
	 * Listen to the WorkFile creating event.
	 *
	 * @param  \App\Models\Plans\Plan $plan
	 *
	 * @return void
	 */
	public function deleting( Plan $plan )
	{
		/*
		$MoipHelper = new MoipHelper();
		$MoipPlan = $MoipHelper->plans();
		$MoipPlan->deactivate($plan->code);
		*/
	}


}