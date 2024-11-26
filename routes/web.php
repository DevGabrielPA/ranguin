<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'quickBite')->name('quickBite');
Route::view('/home', 'home')->name('home');
Route::view('/cadastro', 'cadastro')->name('cadastro');
Route::post('/cadastros/salvar', [CadastroController::class, 'store']);
// Route::post('/login/user', [CadastroController::class, 'index']);
Route::view('/cardapio', 'cardapio')->name('cardapio');
Route::view('/contato', 'contato')->name('contato');
// Route::view('/login', 'login')->name('login');
Route::view('/loginFuncionario', 'loginFuncionario')->name('loginFuncionario');
Route::view('/carrinho', 'carrinho')->name('carrinho');

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
});


