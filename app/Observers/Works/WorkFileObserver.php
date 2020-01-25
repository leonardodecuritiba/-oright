<?php

namespace App\Observers\Works;

use App\Models\Works\WorkFile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class WorkFileObserver {
	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}


	/**
	 * Listen to the Work creating event.
	 *
	 * @param  \App\Models\Works\WorkFile $work_file
	 *
	 * @return void
	 */
	public function creating( WorkFile $work_file )
	{
		$work_file->_setLinkAttribute($this->request->file('link'));
	}

	/**
	 * Listen to the WorkFile creating event.
	 *
	 * @param  \App\Models\Works\WorkFile $work_file
	 *
	 * @return void
	 */
	public function deleting( WorkFile $work_file )
	{
		if (!empty($work_file->link)) {
			File::Delete($work_file->getFullLinkPath());
		}
	}


}