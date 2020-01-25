<?php

namespace App\Models\Commons;

use App\Models\Clients\Client;
use App\Models\Users\Collaborator;
use App\Traits\AddressTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model {
	use SoftDeletes;
	use AddressTrait;
	public $timestamps = true;
	protected $fillable = [
		'state_id',
		'city_id',
		'zip',
		'district',
		'street',
		'number',
		'complement'
	];


    public function toMoipArray()
    {
        $address = [
            'street' => $this->getAttribute('street'),
            'number' => $this->getAttribute('number'),
            'city' => $this->city->name,
            'district' => $this->getAttribute('district'),
            'state' => $this->state->short_name,
            'country' => 'BRA',
            'zipcode' => $this->getAttribute('zip')

        ];

        if ($this->getAttribute('complement') != "") {
            $address['complement'] = $this->getAttribute('complement');
        }
        return $address;

    }

	// ******************** RELASHIONSHIP ******************************

	public function getFormattedMoip() {
		return [
			"street"        => $this->getAttribute('street'),
			"number"        => $this->getAttribute('number'),
			"complement"    => $this->getAttribute('complement'),
			"country"       => "BRA",
			"district"      => $this->getAttribute('district'),
			"state"         => $this->state->short_name,
			"city"          => $this->city->name,
			"zipcode"       => $this->getAttribute('zip')
		];
	}

	public function state() {
		return $this->belongsTo( CepStates::class, 'state_id' );
	}

	public function city() {
		return $this->belongsTo( CepCities::class, 'city_id', 'id' );
	}
}
