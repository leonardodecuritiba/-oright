<?php

namespace App\Models\Cases;

use App\Traits\ActiveTrait;
use App\Traits\CommonTrait;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Casex extends Model {
	use SoftDeletes;
	use ActiveTrait;
	use CommonTrait;
	use ImageTrait;
	public $timestamps = true;
	protected $table = 'cases';
	protected $fillable = [
		'cover',
		'name',
		'function',
		'content',
		'active'
	];

	public $image_link_attribute = 'cover';

	public $folder_id = NULL;

	//============================================================
	//========================= FILE =============================
	//============================================================

	public function hasCover()
	{
		return ($this->getAttribute('cover') != NULL);
	}
	static public function getPath()
	{
		return 'uploads' . DIRECTORY_SEPARATOR . 'cases'
		       . DIRECTORY_SEPARATOR;
	}

	//============================================================
	//============================================================
	//============================================================


	static public function getAllToHome() {
		return self::active()->get();
	}

	static public function getAlltoSelectList() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortContent()
			];
		} )->pluck( 'description', 'id' );
	}

	public function getName()
	{
		return $this->getAttribute( 'name' );
	}

	public function getShortName()
	{
		return str_limit( $this->getName(), 20 );
	}

	public function getShortContent()
	{
		return str_limit( $this->getAttribute( 'content' ), 20 );
	}
	//============================================================
	//==================== RELASHIONSHIP =========================
	//============================================================
}