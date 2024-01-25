<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use App\Rules\ReCaptcha;
use Closure;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function sendMessage(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $contact = new \App\Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        \Mail::to($request->email)->send(new contact($request->name));
        return "OK";
    }
}
