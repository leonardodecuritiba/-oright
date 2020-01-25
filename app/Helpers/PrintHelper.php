<?php

namespace App\Helpers;

use App\Models\Works\Work;
use Carbon\Carbon;
use \Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PrintHelper {

	static public $_DEBUG_ = false;

	static public function workExport( Work $work , $HTML = false) {

		$user     = Auth::user();
		$filename = self::getFilename( 'copyright_' . $work->id );
		$options  = [
			'filename'    => $filename,
			'debug'       => (!$HTML) ? self::$_DEBUG_ : $HTML,
			'Work'        => $work,
			'User'        => $user,
			'Data'        => DataHelper::now(),
		];
		if($options['debug']){
			return view('prints.copyright.show', $options);
		}
		$pdf = PDF::loadView( 'prints.copyright.show', $options );
		$customPaper = array(0,0,360,360);
		$pdf->getDomPDF()->set_paper($customPaper);
//		$pdf->getDomPDF()->set_option( "enable_php", true );

		return $pdf->stream( $filename );
	}

	// ******************** FUNCTIONS ******************************

	static public function getFilename( $name = null ) {
		return ( ( $name != null ) ? $name . '_' : $name ) . 'print_' . Carbon::now()->format( 'd_m_Y-H_i' ) . '.pdf';
	}
}
