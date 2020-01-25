<?php

namespace App\Models\Admins;

use App\Models\Commons\Address;
use App\Models\Commons\Contact;
use App\Models\Users\User;
use App\Traits\ClientsTrait;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model {
	use SoftDeletes;
	use ClientsTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'user_id',
		'name'
	];


	static public function getAlltoSelectList() {
		return self::get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortName()
			];
		} )->pluck( 'description', 'id' );
	}

	public function getName() {
		return $this->getAttribute( 'name' );
	}

	public function getShortName() {
		return str_limit($this->getName(), 20 );
	}

	public function getActiveFullResponse() {
		return $this->user->getActiveFullResponse();
	}

	public function getShortEmail() {
		return $this->user->email;
	}
	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeActive($query)
	{
		$query->whereHas('user', function ($q) {
			$q->active();
		});
	}
	// ******************** RELASHIONSHIP ******************************

	public function user() {
		return $this->belongsTo( User::class, 'user_id' );
	}
}