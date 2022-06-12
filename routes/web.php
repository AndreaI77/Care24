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
use App\Http\Controllers\HorarioController;

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
    return view('cookies');
})->name('cookies');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');


Route::get('/inicio', function () {
    return view('welcome');
})->name('inicio')->middleware('auth');

Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('empleados', EmpleadoController::class)->middleware('auth');
Route::resource('especialidades', EspecialidadController::class)->only(['index','create','store', 'destroy' ])->middleware('auth');
Route::resource('incidencias', IncidenciaController::class)->middleware('auth');
Route::resource('informes', InformeController::class)->middleware('auth');
Route::resource('medicamentos', MedicamentoController::class)->only(['index','create','store', 'destroy' ])->middleware('auth');
Route::resource('servicios', ServicioController::class)->middleware('auth');
Route::resource('tratamientos', TratamientoController::class)->middleware('auth');
Route::resource('citas', CitaController::class)->middleware('auth');
Route::resource('galeria', GaleriaController::class)->only('index')->middleware('auth');
Route::get('mapa', [MapaController::class, 'index'])->name('mapa.index')->middleware('auth');
Route::get('mapaClientes', [MapaController::class, 'show'])->name('show')->middleware('auth');
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login2');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('contact', [ContactoController::class, 'index'])->name('contact');
Route::post('contact', [ContactoController::class, 'contactar'])->name('contact.store');
Route::get('curriculum', [CVController::class, 'index'])->name('envioCV');
Route::post('curriculum', [CVController::class, 'contactar'])->name('envioCV.store');
Route::get('recuperacion', [RecupController::class, 'recupForm'])->name('recuperacion');
Route::post('recuperacion', [RecupController::class, 'recup'])->name('recup');
Route::resource('perfil', PerfilController::class)->only('index', 'update')->middleware('auth');
Route::resource('comentarios', ComentarioController::class)->only('index','edit', 'update')->middleware('auth');
Route::resource('horarios', HorarioController::class)->only('index')->middleware('auth');


