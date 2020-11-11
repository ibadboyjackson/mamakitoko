<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    public function postEmail(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|max:600'
        ]);
        $data = [
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'bodyMessage' => $request->message
        ];
        Mail::send('pages.pages.mail', $data, function ($message) use ($data)
        {
            $message->from($data['email']);
            $message->to('hello@mamakitoko.com');
            $message->subject("Nouveau message du Client");
        });
        Session::flash('success', 'Votre message a été envoyé avec succès');
        return redirect()->back();
    }
}
