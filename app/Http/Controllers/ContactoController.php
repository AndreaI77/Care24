<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Requests\ContactoRequest;

class ContactoController extends Controller
{
    public function index()
    {

        return view('contacto');
    }

    public function contactar(ContactoRequest $request)
    {
        $details =[
            'title' => "Solicitud de contacto",
            'nombre' => $request->get('nombre'),
            'apellidos' =>$request->get('apellidos'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel'),
            'mensaje' => $request->get('mensaje')
        ];
        Mail::to('care24web@gmail.com')->send(new ContactMail($details));



        return back()->with('info','Su mensaje ha sido enviado.');

    }
}
?>
