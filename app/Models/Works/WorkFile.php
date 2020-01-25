<?php

namespace App\Models\Works;

use Illuminate\Support\Facades\File;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkFile extends Model {
	use SoftDeletes;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'work_id',
		'title',
		'descriptions',
		'link',
	];
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	static public function getAlltoSelectList() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortDescriptions()
			];
		} )->pluck( 'description', 'id' );
	}

	public function getShortTitle()
	{
		return str_limit( $this->getAttribute( 'title' ), 20 );
	}

	public function getShortName()
	{
		return $this->getShortTitle();
	}

	public function getShortDescriptions()
	{
		return str_limit( $this->getAttribute( 'descriptions' ), 40 );
	}

	//============================================================
	//========================= FILE =============================
	//============================================================

	static public function getPath($client_id)
	{
		return 'uploads' . DIRECTORY_SEPARATOR . 'files'
		       . DIRECTORY_SEPARATOR . $client_id . DIRECTORY_SEPARATOR . 'work_files'
		       . DIRECTORY_SEPARATOR;
	}

	public function getLinkDownload()
	{
		return asset(self::getPath($this->work->client_id) . $this->getAttribute('link'));
	}

	public function getFullLinkPath()
	{
		return public_path(self::getPath($this->work->client_id) . $this->getAttribute('link'));
	}

	public function getPrint($thumb = false)
	{
		return public_path( ( $thumb ? $this->getPathThumbImage() : $this->getPathImage() ) );
	}

	public function _setLinkAttribute($value)
	{
		try {
			// ---------------- PATH ----------------------------

			$filename = md5(time()) .'.'. $value->getClientOriginalExtension();
			$this->attributes['link'] = $filename;
			$path = public_path(self::getPath($this->work->client_id));

			File::makeDirectory($path, $mode = 0777, true, true);

			//var_dump($file->move($destinationPath.DIRECTORY_SEPARATOR.'tmp'));
			$value->move($path, $filename);


		} catch (\Exception $e) {
			dd($e->getMessage());
			$this->attributes['link'] = null;
			return false;
		}

	}


	// ******************** RELASHIONSHIP *****************************

	public function work() {
		return $this->belongsTo( Work::class, 'work_id' );
	}

}