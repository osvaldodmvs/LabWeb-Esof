<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Storage;
use \PDF;


class PDFController extends Controller
{
	public function generatePDF($data, $value){

		$pdfdata = [
			'data' => $data,
			'value' => $value,
		];
	
		$pdf = PDF::loadView('invoicepdf', $pdfdata);
		$pdf_contents = $pdf->output();
		$user = Auth::user();
		$mail = new Invoice();
		$mail->attachData($pdf_contents, 'invoice.pdf', [
			'mime' => 'application/pdf',
		]);
		Mail::to($user->email)->send($mail);
	}
	

}
