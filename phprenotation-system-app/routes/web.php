<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandlePrenotation;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\login;
use App\Http\Controllers\logout;

Route::get('/', [HandlePrenotation::class, 'index']);

Route::get('/selezione', [HandlePrenotation::class, 'selezione']);

Route::post('/prenotazione', [HandlePrenotation::class, 'prenota']);

Route::post('/aggiungi-giornate', [Dashboard::class, 'addGiornata'])->middleware(['auth']);

Route::post('/rimuovi-giornate', [Dashboard::class, 'removeGiornata'])->middleware(['auth']);

Route::post('/rimuovi-tutte-giornate', [Dashboard::class, 'removeAllGiornate'])->middleware(['auth']);

Route::post('/rimuovi-tutte-prenotazioni', [Dashboard::class, 'removeAllPrenotazioni'])->middleware(['auth']);

Route::post('/rimuovi-tutto', [Dashboard::class, 'removeAll'])->middleware(['auth']);

Route::post('/esporta-csv', [Dashboard::class, 'exportCSV'])->middleware(['auth']);

Route::get('/tuttodatabase', [Dashboard::class, 'tuttoDatabase'])->middleware(['auth']);


Route::get('/login', function () {
    return view('login');
})->middleware(['guest']);

Route::post('/login', [login::class, 'index']);

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth']);

Route::get('/logout', [logout::class, 'index'])->middleware(['auth']);
