<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    const CONSENT_MESSAGE = "Dans le cadre de la réglementation sur la protection des données, j'accepte d'être contacté(e) par email et téléphone.";

   
    
    public function view(){
        return view('client.contact')
        ->with('consentMessage',self::CONSENT_MESSAGE);
         }


    public function store(ContactRequest $request){
        $mailable = new ContactMessageCreated($request->nom, $request->email, $request->messageSubject, $request->textMessage, $request->consent);
        Mail::to('administrateur@msushi.com')->send($mailable);
       
        flashy('Votre message a bien été envoyé, nous vous répondront dans les plus brefs délais.');

        $data = array();
                $data['nom'] = $request->nom;
                $data['prenom'] = $request->prenom;
                $data['email'] = $request->email;
                $data['consentMessage'] = self::CONSENT_MESSAGE ;
        DB::table('rgpd')
                    ->insert($data);

        return redirect::to('/');

       }
    
}
