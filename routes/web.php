<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PpdbController;

// Halaman utama
Route::get('/', function () {
    return view('landing');
});


Route::get('/chat', function () {
    return view('chatbot');
});

Route::post('/chatbot', [ChatbotController::class, 'chat']);

Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');

Route::get('/spmb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('ppdb.store');

Route::get('/berita', function () {return view('berita');});
Route::get('/berita/grand-opening', function () {return view('berita.grand-opening');});

route::get('/kontak', function () {return view('kontak-info');})->name('kontak');
