<?php

namespace App\Models\Works;

use App\Models\Users\User;
use App\Notifications\NotifyCoparcenary;
use App\Traits\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Coparcenary extends Model {
	use Notifiable;
	use SoftDeletes;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'work_id',
		'user_id',
		'name',
		'token',
		'email',
		'confirmated_at',
	];


	static public function getAlltoSelectList() {
		return self::active()->get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortName()
			];
		} )->pluck( 'description', 'id' );
	}


	public function sendConfirmationEmail()
	{
		$this->notify(new NotifyCoparcenary($this));
		return $this;
	}

	static public function verifyEmailCoparcenaryIsSetted($work_id, $email)
	{
		$Coparcenaries = self::where('work_id', $work_id)->get();
		foreach($Coparcenaries as $coparcenary){
			if($coparcenary->getAttribute('user_id')!=NULL)
			{
				if($coparcenary->user->email == $email){
					return [
						'user_id'   => $coparcenary->user_id,
						'name'      => $coparcenary->getShortName()
					];
				}
			}
		}
		return NULL;
	}

	static public function sendEmail($id)
	{
		$data = self::findOrFail($id);
		if(!$data->isConfirmated()){
			return $data->sendConfirmationEmail();
		}
		return $data;
	}

	public function confirm()
	{
		return $this->update(['confirmated_at' => Carbon::now()]);
	}

	public function isConfirmated()
	{
		return ($this->getAttribute('confirmated_at') != NULL);
	}

	public function confirmatedText()
	{
		return ($this->isConfirmated()) ? $this->getConfirmatedAtFormatted() :  'Aguardando Confirmação do Cliente';
	}


	public function getShortName()
	{
		return str_limit( $this->getName(), 20 );
	}

	public function getName()
	{
		if($this->getAttribute('user_id')!=NULL)
		{
			return $this->user->getName();
		}
		return $this->getAttribute('name');
	}

	public function getShortEmail()
	{
		if($this->getAttribute('user_id')!=NULL)
		{
			return $this->user->email;
		}
		return $this->getAttribute('email');
	}


	// ******************** RELASHIONSHIP *****************************

	public function work()
	{
		return $this->belongsTo( Work::class, 'work_id' );
	}

	public function user()
	{
		return $this->belongsTo( User::class, 'user_id' );
	}

}