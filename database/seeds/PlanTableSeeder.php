<?php

use Illuminate\Database\Seeder;
use \App\Models\Plans\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    $plans = [
		    [
			    'name'          => 'Básico',
			    'description'   => 'Plano Básico',
			    'amount'        => 45,
			    'setup_fee'     => 0,
			    'interval'      => [
				    'length'=>  1,
				    'unit'  =>  "MONTH",
			    ],
			    'billing_cycles'=> 12,
			    'trial'         => [
				    'days'          =>  7,
				    'enabled'       =>  true,
				    'hold_setup_fee'=>  true,
			    ],
			    'payment_method'=> "CREDIT_CARD",

			    'registers'     => 10,
			    'options'       => [true,true,true,true,true,true,true,false,false,false],
			    'status'=> 'ACTIVE',
			    'active'=> 1,
		    ],
		    [
			    'name'          => 'Pessoal',
			    'description'   => 'Plano Pessoal',
			    'amount'        => 69,
			    'setup_fee'     => 0,
			    'interval'      => [
				    'length'=>  1,
				    'unit'  =>  "MONTH",
			    ],
			    'billing_cycles'=> 12,
			    'trial'         => [
				    'days'          =>  0,
				    'enabled'       =>  false,
				    'hold_setup_fee'=>  true,
			    ],
			    'payment_method'=> "CREDIT_CARD",

			    'registers'     => 25,
			    'options'       => [true,true,true,true,true,true,true,false,false,false],
			    'status'=> 'ACTIVE',
			    'active'=> 1,
		    ],
		    [
			    'name'          => 'Empresa',
			    'description'   => 'Plano Empresarial',
			    'amount'        => 169,
			    'setup_fee'     => 0,
			    'interval'      => [
				    'length'=>  1,
				    'unit'  =>  "MONTH",
			    ],
			    'billing_cycles'=> 12,
			    'trial'         => [
				    'days'          =>  0,
				    'enabled'       =>  false,
				    'hold_setup_fee'=>  true,
			    ],
			    'payment_method'=> "CREDIT_CARD",

			    'registers'     => 80,
			    'options'       => [true,true,true,true,true,true,true,false,false,false],
			    'status'=> 'ACTIVE',
			    'active'=> 1,
		    ]
	    ];

	    foreach($plans as $plan){
		    Plan::create($plan);
	    }
    }
}
