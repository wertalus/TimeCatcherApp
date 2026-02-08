<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Settings;
use App\Livewire\PersonalSettings;
use App\Livewire\PasswordChange;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/personal-settings', PersonalSettings::class)->name('personal-settings');
    Route::get('/password-change', PasswordChange::class)->name('password-change');
    Route::livewire('/templates/{id?}', 'template.edit')->name('edit-template');

});
