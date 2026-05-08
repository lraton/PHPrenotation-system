<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandlePrenotation;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\login;
use App\Http\Controllers\logout;

Route::get('/', [HandlePrenotation::class, 'index']);

Route::get('/selezione', [HandlePrenotation::class, 'selezione']);

Route::post('/prenotazione', [HandlePrenotation::class, 'prenota']);

Route::post('/aggiungi-giornate', [Dashboard::class, 'addGiornata'])->name('aggiungi-giornate')->middleware(['auth']);

Route::post('/rimuovi-giornate', [Dashboard::class, 'removeGiornata'])->name('rimuovi-giornate')->middleware(['auth']);

Route::post('/rimuovi-tutte-giornate', [Dashboard::class, 'removeAllGiornate'])->name('rimuovi-tutte-giornate')->middleware(['auth']);

Route::post('/rimuovi-tutte-prenotazioni', [Dashboard::class, 'removeAllPrenotazioni'])->name('rimuovi-tutte-prenotazioni')->middleware(['auth']);

Route::post('/rimuovi-tutto', [Dashboard::class, 'removeAll'])->name('rimuovi-tutto')->middleware(['auth']);

Route::post('/esporta-csv', [Dashboard::class, 'exportCSV'])->name('esporta-csv')->middleware(['auth']);

Route::get('/tuttodatabase', [Dashboard::class, 'tuttoDatabase'])->middleware(['auth']);

Route::post('/rimuovi-prenotazione', [Dashboard::class, 'removePrenotazione'])->name('rimuovi-prenotazione')->middleware(['auth']);

Route::get('/cancella-prenotazione', [HandlePrenotation::class, 'cancellaPrenotazione'])->name('cancella-prenotazione');

Route::get('/conferma-prenotazione', [Dashboard::class, 'confermaPrenotazione'])->name('conferma-prenotazione')->middleware(['auth']);


Route::get('/login', function () {
    return view('login');
})->middleware(['guest']);

Route::post('/login', [login::class, 'index']);

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth']);

Route::get('/logout', [logout::class, 'index'])->middleware(['auth']);

Route::get('/crea-db', [login::class, 'db'])->middleware(['auth']);

Route::get('/test', [login::class, 'test'])->middleware(['auth']);

Route::get('/signup', [login::class, 'signup']);