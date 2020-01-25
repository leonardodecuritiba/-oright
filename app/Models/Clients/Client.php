<?php

namespace App\Models\Clients;

use App\Models\Commons\Address;
use App\Models\Commons\Contact;
use App\Models\Users\User;
use App\Models\Works\Coparcenary;
use App\Models\Works\Work;
use App\Traits\ClientsTrait;
use App\Traits\CommonTrait;
use App\Traits\MoipClientTrait;
use App\Traits\PagChainClientTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model {
	use SoftDeletes;
	use ClientsTrait;
	use PagChainClientTrait;
	use MoipClientTrait;
	use CommonTrait;
	public $timestamps = true;
	protected $fillable = [
		'user_id',
		'contact_id',
		'address_id',
		'private_key',
		'pagchain_address',
		'pagchain_userId',

		'type',
		'cpf',
		'rg',
		'name',
		'sex',
		'birthday',
		'cnpj',
		'ie',
		'isention_ie',
		'fantasy_name',
		'company_name',
		'foundation',
		'active',
		'finished',
		'registers',
	];

	protected $appends = [
		'code',
		'birthdate_day',
		'birthdate_month',
		'birthdate_year'
	];


	public function getBirthdateDayAttribute() {
		return substr($this->attributes['birthday'],8,2);
	}

	public function getCodeAttribute() {
		return substr($this->attributes['private_key'],0,8);
	}

	public function getBirthdateMonthAttribute() {
		return substr($this->attributes['birthday'],5,2);
	}

	public function getBirthdateYearAttribute() {
		return substr($this->attributes['birthday'],0,4);
	}

	public function findMyAssign($id)
	{
		return $this->assigns->where('id',$id)->first();
	}

	static public function _create(array $data)
	{
		if(isset($data['plan_id'])){
			dd('new witho plan');
			$client->newAssign($data);
		}

		$client = parent::create($data);


		return $client;
	}

	public function newAssign(array $data)
	{
		$data['client_id'] = $this->attributes['id'];
//		$assign = Assign::newAssign($data);
//		$assign->newInvoice();
		$assign = Assign::create($data);
		return $assign->client;
	}


	public function payAssign($id, array $attributes)
	{
		$assign = $this->findMyAssign($id);
		$assign->pay($attributes);
		return $assign;
	}

	public function getActiveAssignName()
	{
//		dd('getActivatedPlanName');
		$assign = $this->assign_active;
		return ($assign==NULL) ? '-' : $assign->getPlanName();
	}

	public function hasCredit()
	{
		return ($this->attributes['registers'] > 0);
	}

	public function hasActivePlan()
	{
		return ($this->assign_active != NULL);
	}

	public function hasPlan()
	{
		return ($this->assign != NULL);
	}

	static public function getAlltoSelectList() {
		return self::get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortName()
			];
		} )->pluck( 'description', 'id' );
	}

	public function isFinished() {
		return $this->getAttribute( 'finished' );
	}

	public function getFinishedText() {
		return $this->isFinished() ? 'Cadastro Finalizado' : 'Cadastro Não Finalizado';
	}

	public function isVerified() {
		return $this->user->isVerified();
	}

	public function getVerifiedText() {
		return $this->isVerified() ? 'Email Verificado' : 'Email Não Verificado';
	}

	public function getShortWorksCount() {
		return $this->works->count();
	}

	public function getResponsibleName() {
		return ( $this->attributes['name'] != "" ) ? $this->getAttribute( 'name' ) : "-";
	}

	public function getCompanyName() {
		return ( $this->attributes['company_name'] != "" ) ? $this->getAttribute( 'company_name' ) : "-";
	}

	public function getName() {
		return ( $this->getAttribute('type') ) ? $this->getAttribute( 'company_name' ) : $this->getAttribute( 'name' );
	}

	public function getShortName() {
		return str_limit($this->getName(), 20 );
	}

	public function getShortEmail() {
		return $this->user->email;
	}

	public function getShortDocument() {
		return ( $this->attributes['type'] ) ? $this->getFormattedCnpj() : $this->getFormattedCpf();
	}

	public function findMyWork( $id ) {
		$work = $this->works->where( 'id', $id );

		return ( $work->count() > 0 ) ? $work->first() : abort( 403 );
		//Work::findOrFail($id)
	}

	public function createWork( array $data ) {
		$data['client_id'] = $this->attributes['id'];

		return Work::create( $data );
	}

	public function isMyWork( $id ) {
		$work = $this->works->where( 'id', $id );
		return ( $work->count() > 0 );
	}

	public function getMyCoparticenary( $id )
	{
		$works_id = $this->works->pluck('id');
		$data = Coparcenary::whereIn('work_id',$works_id)->where('id', $id )->first();
		if(count($data) > 0) return $data;
		return abort(403);
	}

	public function getActiveFullResponse() {
		return $this->user->getActiveFullResponse();
	}

	public function canAddWork()
	{
		return $this->user->active;
	}

	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeActive($query)
	{
		return $query->whereHas('user', function ($q) {
			$q->active();
		});
	}
	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeInactive($query)
	{
		return $query->whereHas('user', function ($q) {
			$q->inactive();
		});
	}

	// ******************** RELASHIONSHIP ******************************
	public function address() {
		return $this->belongsTo( Address::class, 'address_id' );
	}

	public function contact() {
		return $this->belongsTo( Contact::class, 'contact_id' );
	}

	public function works()
	{
		return $this->hasMany( Work::class, 'client_id' );
	}
	public function worksActive()
	{
		return $this->works()->active();
	}

	public function user()
	{
		return $this->belongsTo( User::class, 'user_id' );
	}

	public function userActive()
	{
		return $this->user()->active();
	}

	public function assigns()
	{
		return $this->hasMany( Assign::class, 'client_id' )->orderBy('created_at','DESC');
	}

	public function assign()
	{
//		dd('client->assign');
		return $this->hasOne( Assign::class, 'client_id' )->exist();
	}

	public function assign_active()
	{
		return $this->hasOne( Assign::class, 'client_id' )->active();
	}

	public function registers_all()
	{
		return $this->hasMany( Register::class, 'client_id' );
	}

	public function registers_in()
	{
		return $this->hasMany( Register::class, 'client_id' )->in();
	}

	public function registers_out()
	{
		return $this->hasMany( Register::class, 'client_id' )->out();
	}

}