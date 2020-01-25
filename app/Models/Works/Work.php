<?php

namespace App\Models\Works;

use App\Models\Clients\Client;
use App\Models\Clients\Register;
use App\Traits\BlockChainTrait;
use App\Traits\CommonTrait;
use App\Traits\Relashionship\ClientTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Work extends Model {
	use SoftDeletes;
	use CommonTrait;
	use BlockChainTrait;
	use ClientTrait;
	public $timestamps = true;
	protected $fillable = [
		'client_id',
		'category_id',
		'title',
		'private_key',
		'pagchain_key',
		'pagchain_transactionId',
		'registered_at',
		'descriptions',
		'cover',
	];




	public function getQrCode()
	{
		if($this->hasBlockchain()){
			$url = route('works.view_work',$this->getAttribute('private_key'));
			return QrCode::size(150)->generate($url);
		}
		return NULL;
	}

	public function getMapList() {
		return [
			'id'              => $this->getAttribute('id'),
			'title'           => $this->getShortTitle(),
			'blockchain_text' => $this->getBlockchainStatusText(),
			'name'            => $this->getShortName(),
			'descriptions'    => $this->getShortDescriptions(),
			'category'        => $this->getShortCategoryName(),
			'owner'           => $this->getShortOwnerName(),
			'created_at'      => $this->getCreatedAtFormatted(),
			'created_at_time' => $this->getCreatedAtTime()
		];
	}

	static public function getAlltoSelectList() {
		return self::get()->map( function ( $s ) {
			return [
				'id'          => $s->id,
				'description' => $s->getShortName()
			];
		} )->pluck( 'description', 'id' );
	}

	static public function findOrFailByPrivateKey($private_key) {

		$data = self::where('private_key',$private_key)->first();
		if(count($data) > 0){
			return $data;
		}
		return abort(404);
	}

	public function getCategoryTitle() {
		return $this->category->title;
	}

	public function getShortName() {
		return $this->getShortTitle();
	}

	public function getTitle() {
		return $this->getAttribute( 'title' );
	}

	public function getShortTitle() {
		return str_limit( $this->getTitle( ), 20 );
	}

	public function getOwnerName() {
		return $this->owner->getName();
	}

	public function getShortOwnerName() {
		return $this->owner->getShortName();
	}

	public function getShortCategoryName() {
		return $this->category->getShortName();
	}

	public function getShortDescriptions() {
		return str_limit( $this->getDescriptions(), 30 );
	}

	public function getDescriptions() {
		return $this->getAttribute( 'descriptions' );
	}

	public function getCoparticionariesCount()
	{
		return $this->coparticionaries->count();
	}


	//============================================================
	//======================== BLOCKCHAIN ========================
	//============================================================


	public function generateBlockchain()
	{
		//GERAR BLOCKCHAIN
		$this->createBlockChainStream();

		//CRIANDO UMA NOVA MOVIMENTAÇÃO
		Register::create([
			'client_id' => $this->attributes['client_id'],
			'ref_id'    => $this->attributes['id'],
			'in_out'    => 1,
			'quantity'  => 1,
		]);

		//DECREMENTANDO O NÚMERO DE REGISTROS
		return $this->client->decrement('registers', 1);

	}

	public function getGenerateHtmlLink()
	{
		if (Auth::check()){
			if(Auth::user()->is('admin')){
				return route('works.gen_html',$this->attributes['id']);
			} else {
				return route('client_works.gen_html',$this->attributes['id']);
			}
		}
	}

	public function getGeneratePdfLink()
	{
		if (Auth::check()){
			if(Auth::user()->is('admin')){
				return route('works.gen_pdf',$this->attributes['id']);
			} else {
				return route('client_works.gen_pdf',$this->attributes['id']);
			}
		}
	}

	//============================================================
	//========================= FILE =============================
	//============================================================

	public function hasCover()
	{
		return ($this->getAttribute('cover') != NULL);
	}

	static public function getPath()
	{
		return 'uploads' . DIRECTORY_SEPARATOR . 'files'
		       . DIRECTORY_SEPARATOR . 'works'
		       . DIRECTORY_SEPARATOR;
	}

	public function getLinkDownload()
	{
		return asset(self::getPath() . $this->getAttribute('cover'));
	}

	public function getFullLinkPath()
	{
		return public_path(self::getPath() . $this->getAttribute('cover'));
	}

	public function setCoverAttribute($file)
	{

		try {
			$filename = md5(time()) .'.'. $file->getClientOriginalExtension();
			$path = public_path(self::getPath());

			if($this->getOriginal('cover') != NULL){ //DELETAR
				File::delete($path . $this->getOriginal('cover'));
			}

			// ---------------- PATH ----------------------------
			$this->attributes['cover'] = $filename;
			File::makeDirectory($path, $mode = 0777, true, true);
			return $file->move($path, $filename);
		} catch (\Exception $e) {
			dd($e->getMessage());
			$this->attributes['cover'] = null;
			return false;
		}
	}

	// ******************** RELASHIONSHIP *****************************

	public function owner() {
		return $this->belongsTo( Client::class, 'client_id' );
	}

	public function category() {
		return $this->belongsTo( Category::class, 'category_id' );
	}

	public function coparticionaries() {
		return $this->hasMany( Coparcenary::class, 'work_id' );
	}

	public function work_files() {
		return $this->hasMany( WorkFile::class, 'work_id' );
	}

}