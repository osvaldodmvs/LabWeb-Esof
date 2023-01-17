<?php

namespace App\Http\Controllers;

use App\Mail\Evento;
use Illuminate\Http\Request;
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
}
