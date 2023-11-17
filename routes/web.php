<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/cadastro', [LoginController::class, 'register'])->name('login.register');
    Route::post('/login', [LoginController::class, 'autenticate'])->name('login.autenticate');
    Route::post('/cadastro', [LoginController::class, 'store'])->name('login.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/agendamentos', [AgendamentoController::class, 'home'])->name('agendamento.home');
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamento.store');
    Route::get('/agendamento/{id}/edit', [AgendamentoController::class, 'edit'])->name('agendamento.edit');
    Route::get('/agendamento/{id}/delete', [AgendamentoController::class, 'delete'])->name('agendamento.delete');
    Route::put('/agendamento/{agendamento}/edit', [AgendamentoController::class, 'update'])->name('agendamento.update');
    Route::delete('/agendamento/{agendamento}/delete', [AgendamentoController::class, 'destroy'])->name('agendamento.destroy');
    Route::get('/itens', [ItemsController::class, 'index'])->name('itens');
    Route::get('/professores', [UserController::class, 'index'])->name('professores');
    Route::delete('/logout', [DashboardController::class, 'destroy'])->name('login.destroy');
});
