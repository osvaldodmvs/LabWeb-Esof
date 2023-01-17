<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;


class PDFController extends Controller
{
   public function generatePDF($data){
    
    $pdf = PDF::loadView('invoicepdf', $data);

    return $pdf->download('invoicepdf.pdf');
   }
}
