<?php

namespace App\Http\Controllers;

use App\Mail\Evento;
use App\Mail\Invoice;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailable;
use Mail;
use App\Mail\SendMail;


class MailController extends Controller
{
    public function mail_events(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required',
            'type' => 'required',
            'last_name' => 'required|max:30',
            'phone' => 'required',
            'participants' => 'required|numeric|min:8',
            'suggestions' => 'required',
        ]);
        try {
            Mail::to('36854@ufp.edu.pt')->send(new Evento($validated));
            session()->flash('success', 'Formulário submetido com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro com a submissão do formulário!');
            return redirect()->back();
        }
    }


    public function mail_teambuilding(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required',
            'type'=>'required',
            'company' => 'required',
            'phone' => 'required',
            'participants' => 'required|numeric|min:8',
            'suggestions'=>'required',
        ]);
        try {
            Mail::to('36854@ufp.edu.pt')->send(new Evento($validated));
            session()->flash('success', 'Formulário submetido com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro com a submissão do formulário!');
            return redirect()->back();
        }
    }

    public function mail_invoice($pdf){
        $user = Auth::user();
        $email = $user->email;
        $invoice = (new Invoice())->attach($pdf->output(), [
            'as' => 'invoice.pdf',
        ]);
        Mail::to($email)->send($invoice);
    }

}
