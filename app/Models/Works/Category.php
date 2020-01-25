<?php

namespace App\Models\Works;

use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'title',
		'descriptions',
		'active',
	];

	static public function getAllToHome() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'description' => $s->title . ': ' . $s->descriptions
			];
		} )->pluck( 'description');
	}

	static public function getAlltoSelectList() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getName()
			];
		} )->pluck( 'description', 'id' );
	}

	public function getWorksCount() {
		return $this->works->count();
	}

	public function getShortTitle() {
		return str_limit( $this->getName(), 20 );
	}

	public function getShortName() {
		return $this->getShortTitle();
	}

	public function getName() {
		return $this->getAttribute( 'title' );
	}

	public function getShortDescriptions() {
		return str_limit( $this->getAttribute( 'descriptions' ), 30 );
	}

	// ******************** RELASHIONSHIP *****************************

	public function works() {
		return $this->hasMany( Work::class, 'category_id' );
	}

}