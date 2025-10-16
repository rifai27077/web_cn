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
Route::post('/chatbot/reset', [App\Http\Controllers\ChatbotController::class, 'resetChat']);

Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');

Route::get('/spmb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('ppdb.store');

Route::get('/berita', function () {return view('berita');});
Route::get('/berita/grand-opening', function () {return view('berita.grand-opening');});
Route::get('/berita/ppdb-smksma', function () {return view('berita.ppdb-smksma');});
Route::get('/berita/seminar', function () {return view('berita.seminar');});

route::get('/kontak', function () {return view('kontak-info');})->name('kontak');

route::get('/daftar-harga', function () {return view('daftar-harga');})->name('daftar-harga');

// smk
Route::get('/smk', function () {
    return view('smk.landing');
});


Route::get('/smk/jurusan/{nama}', function ($nama) {
    return view('smk.jurusan.' . strtolower($nama));
});

Route::get('/smk/sejarah', function () {
    return view('smk.sejarah');
});

Route::get('/smk/yayasan', function () {
    return view('smk.yayasan');
});

Route::get('/smk/sekolah', function () {
    return view('smk.sekolah');
});

Route::get('/smk/prestasi', function () {
    return view('smk.prestasi');
});

Route::get('/smk/ekstrakurikuler', function () {
    return view('smk.ekstrakurikuler');
});
