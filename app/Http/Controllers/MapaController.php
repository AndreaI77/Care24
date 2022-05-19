<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;

class MapaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index']);
    }
    public function index()
    {
        $clientes= Cliente::get();

        return view('clientes.mapa', compact( 'clientes'));
    }
}
