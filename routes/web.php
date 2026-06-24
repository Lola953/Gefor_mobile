<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiCoursController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiSignatureController;

Route::get('/veille', function () {
    return view('veille');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [ApiAuthController::class, 'login'])->name('login.post');

Route::get('/logout', [ApiAuthController::class, 'logout'])->name('logout');
Route::get('/accueil', [ApiCoursController::class, 'index'])->name('accueil');
Route::get('/signature/{id}', [ApiCoursController::class, 'show'])->name('signature');
Route::post('/signature', [ApiSignatureController::class, 'store'])->name('signature.store');
