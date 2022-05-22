<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\PerfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\RecupController;
use App\Http\Controllers\ComentarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/care24', function () {
    return view('care24');
})->name('care24');

Route::get('/condiciones', function () {
    return view('condiciones');
})->name('condiciones');

Route::get('/cookies', function () {
    return view('Cookies');
})->name('cookies');



Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');


Route::get('/inicio', function () {
    return view('welcome');
})->name('inicio');

Route::resource('clientes', ClienteController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('especialidades', EspecialidadController::class)->only(['index','create','store', 'destroy' ]);
Route::resource('incidencias', IncidenciaController::class);
Route::resource('informes', InformeController::class);
Route::resource('medicamentos', MedicamentoController::class)->only(['index','create','store', 'destroy' ]);
Route::resource('servicios', ServicioController::class);
Route::resource('tratamientos', TratamientoController::class);
Route::resource('citas', CitaController::class);
Route::resource('galeria', GaleriaController::class)->only('index');
Route::resource('mapa', MapaController::class)->only('index');
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login2');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('contact', [ContactoController::class, 'index'])->name('contact');
Route::post('contact', [ContactoController::class, 'contactar'])->name('contact.store');
Route::get('curriculum', [CVController::class, 'index'])->name('envioCV');
Route::post('curriculum', [CVController::class, 'contactar'])->name('envioCV.store');
Route::get('recuperacion', [RecupController::class, 'recupForm'])->name('recuperacion');
Route::post('recuperacion', [RecupController::class, 'recup'])->name('recup');
Route::resource('perfil', PerfilController::class)->only('index', 'update');
Route::resource('comentarios', ComentarioController::class)->only('index','edit', 'update');

