<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('index'); // Redireciona para a lista de agendas se o usuário estiver autenticado
    } else {
        return redirect()->route('login'); // Redireciona para a página de login se o usuário não estiver autenticado
    }
})->name('home');

// Agrupa as rotas de CRUD para usar o middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/index', [AgendaController::class, 'index'])->name('index');
    Route::get('/create', [AgendaController::class, 'create'])->name('create');
    Route::post('/store', [AgendaController::class, 'store'])->name('store');
    Route::get('/edit/{agenda}', [AgendaController::class, 'edit'])->name('edit');
    Route::put('/update/{agenda}', [AgendaController::class, 'update'])->name('update');
    Route::delete('/destroy/{agenda}', [AgendaController::class, 'destroy'])->name('destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Inclui as rotas de autenticação do Breeze
require __DIR__.'/auth.php';

