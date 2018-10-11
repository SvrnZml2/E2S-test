<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function getForm()
    {
        return view('contact');
    }

    public function postForm(ContactRequest $request)
    {
        Mail::send('email_contact', $request->all(), function($message) 
        {
            $message->to('rossi56@hotmail.fr')->subject('Contact');
        });

        $title = "Confirmation de contact";
        $msg = "Merci. Votre message a été transmis à l'administrateur du site. Vous recevrez une réponse rapidement.";

        return view('confirm', compact('title', 'msg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'telephone' => 'required|min:11|max:0989999999|numeric'
        ]);

        Mail::send('email_tel_contact',  $request->only('telephone'), function($message) 
        {
            $message->to('rossi56@hotmail.fr')->subject('Contact téléphonique');
        });

        $title = "Confirmation de contact téléphonique";
        $msg = "Merci. Votre numéro de téléphone a été transmis à l'administrateur du site. Vous recevrez une réponse rapidement.";
        
        return view('confirm', compact('title', 'msg'));
    }
}
