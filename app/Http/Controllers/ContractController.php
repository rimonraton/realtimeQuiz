<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function sendMessage(Request $request)
    {
//         return $request->all();

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
