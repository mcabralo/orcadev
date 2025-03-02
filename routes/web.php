<?php

use App\Http\Controllers\AgendamentoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'AgendamentoController@index')->name('agendamento')->name('home');

Route::get('/create', 'AgendamentoController@create')->name('fazerAgendamento');

Route::post('/agendamento/create', 'AgendamentoController@Store')->name('registrarAgendamento');

// Auth::routes();

// Route::get('/agendamento/index', 'AgendamentoController@index')->name('agendamento');

// Route::get('/home', function () {
//     return view('home');
// })->name('home')->middleware('auth');
