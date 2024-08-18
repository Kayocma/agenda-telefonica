<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

Route::get('/', [AgendaController::class, 'index'])->name('index');
Route::get('/create', [AgendaController::class, 'create'])->name('create');
Route::post('/store', [AgendaController::class, 'store'])->name('store');
Route::get('/edit/{agenda}', [AgendaController::class, 'edit'])->name('edit');
Route::put('/update/{agenda}', [AgendaController::class, 'update'])->name('update');
Route::delete('/destroy/{agenda}', [AgendaController::class, 'destroy'])->name('destroy');