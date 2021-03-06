<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});



Route::get('produto/exportacao/{extensao?}','ProdutoController@exportacao')->name('produto.exportacao')->middleware('verified');
Route::get('customers/report/{extensao?}','CustomerController@report')->name('customers.report')->middleware('verified');
Route::resource('customers','CustomerController')->middleware('verified');
Route::resource('produto','ProdutoController')->middleware('verified');
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');


Route::get('/mensagem-teste', function (){
    return new \App\Mail\MensagemTesteMail();
   //Mail::to('unionsystem2021@gmail.com')->send(new \App\Mail\MensagemTesteMail());
   // return 'E-mail enviado com sucessoo';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware('verified');
