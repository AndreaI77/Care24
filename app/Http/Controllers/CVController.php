<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CVMail;
use App\Http\Requests\CVRequest;
class CVController extends Controller
{
    public function index()
    {

        return view('cv');
    }



    public function contactar(CVRequest $request)
    {
        $details =[
            'title' => "Envío de Currículum",
            'nombre' => $request->get('nombre'),
            'apellidos' =>$request->get('apellidos'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel'),
            'mensaje' => $request->get('mensaje'),
            'puesto' => $request->get('puesto'),
            'archivo'=>$request->file('cv')
        ];
    Mail::to('care24web@gmail.com')->send(new CVMail($details));

        return back()->with('info','Su mensaje ha sido enviado.');

    }
}
