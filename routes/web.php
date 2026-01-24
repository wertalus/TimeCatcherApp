<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Settings;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/settings', Settings::class)->name('settings');
});
