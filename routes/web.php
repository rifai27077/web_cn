<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});


Route::get('/chat', function () {
    return view('chatbot');
});

Route::post('/chatbot', [ChatbotController::class, 'chat']);