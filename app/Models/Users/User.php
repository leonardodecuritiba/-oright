<?php

namespace App\Models\Users;

use App\Models\Admins\Admin;
use App\Models\Blog\Comment;
use App\Models\Clients\Client;
use App\Notifications\NotifyAdminsRemovedClient;
use App\Traits\ActiveTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
	use Notifiable;
	use ActiveTrait;
	use EntrustUserTrait {
		restore as private restoreA;
	} // add this trait to your user model

	use SoftDeletes {
		restore as private restoreB;
	}

	public function restore() {
		$this->restoreA();
		$this->restoreB();
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email',
		'password',
		'verified',
		'active',
		'blocked',
		'verify_token'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token'
	];

	public function isVerified() {
		return $this->getAttribute('verified');
	}


	public function getVerifyToken() {
		return $this->getAttribute('verify_token');
	}

	public function getName() {
		$entity = $this->client;
		if ( $entity == null ) {
			$entity = $this->admin;
		}

		return $entity->getName();
	}

	public function getShortName() {
		$entity = $this->client;
		if ( $entity == null ) {
			$entity = $this->admin;
		}

		return $entity->getShortName();
	}

	public function updatePassword( $password ) {
		return $this->update( [
			'password' => bcrypt( $password )
		] );
	}

	public function is($role) {
		return ($this->getRole()->name == $role);
	}


	public function getShortRoleName() {
		return $this->getRole()->display_name;
	}

	public function getRole() {
		return $this->roles()->first();
	}

	public function getHomeRoute() {
		return $this->hasRole( 'admin' ) ? 'admin.index' : 'home';
	}

	public function getHomeUrl() {
		return route( $this->getHomeRoute() );
	}

	public function itsMe( $id ) {
		return ( $this->getAttribute( 'id' ) == $id );
	}

	public function block() {
		$this->update(['blocked' => 0]);
		return $this->save();
	}


	public function unblock() {
		$this->update(['blocked' => 1]);
		return $this->save();
	}

	public function disable()
	{
		$admin_ids = Admin::active()->pluck('user_id');
		$users = self::whereIn('id',$admin_ids)->get();
		Notification::send($users, new NotifyAdminsRemovedClient($this->client));
		$this->active = 0;
		return $this->save();
	}

	public function enable()
	{
		$this->active = 1;
		return $this->save();
	}

	static public function getAdmins()
	{
		$admin_ids = Admin::active()->pluck('user_id');
		return self::whereIn('id',$admin_ids)->get();
	}

	// ******************** RELASHIONSHIP ******************************
	public function client()
	{
		return $this->hasOne( Client::class, 'user_id' );
	}

	public function admin()
	{
		return $this->hasOne( Admin::class, 'user_id' );
	}
	public function comments()
	{
		return $this->hasMany( Comment::class, 'user_id' );
	}
	public function commentsActive()
	{
		return $this->comments()->active();
	}
}
