<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //

    public function create () {

        return view ('contact');
        
    }
public function store (Request $request) {
    $name= $request->name;
    $email= $request->email;
    $text= $request->message;
    $privacy= $request->privacy;
    

    Mail::to("robertoramirezmoreno990@gmail.com")->send(new ContactNotification($name, $email, $text));


    return "correo enviado" ;
   }
}