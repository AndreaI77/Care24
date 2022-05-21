<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecupMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RecupController extends Controller
{
    public function recupForm()
    {
        return view('auth.password');
    }

    public function recup(Request $request)
    {

        $users = User::where('dni', $request->get('dni'))->get();

         if( $users != null && count($users)>0)
         {
            foreach ($users as $user) {
                 if($user->email == $request->get('email'))
                 {
                    $pass = Str::random(8);
                    $user->password=bcrypt($pass);
                    $user->save();
                    $details=[
                        'password' => $pass
                    ];

                    Mail::to($user->email)->send(new RecupMail($details));

                    Session::flash('info', "Se ha enviado su nueva contraseña a su e-mail.");
                    return redirect()->route('login');

                 }else{
                    $error = 'E-mail incorrecto. Prueba otra vez.';
                    return redirect()->route('recup')->with('error', $error);
                 }
            }

         } else {
            $error = 'DNI incorrecto. Prueba otra vez.';
            return redirect()->route('recup')->with('error', $error);

         }
    }
}
