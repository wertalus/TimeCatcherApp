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
    Route::get('/password-change', PasswordChange::class)->name('password-change');
    Route::livewire('/templates/{id?}', 'template.edit')->name('edit-template');
    Route::livewire('/change-password', 'password-change')->name('change-password');
    Route::livewire('/personal-settings', 'personal-settings')->name('personal-settings');
    Route::livewire('/create-template', 'template.create')->name('create-template');
    Route::livewire('/templates-list', 'template-list')->name('templates-list');
    Route::livewire('/delete-template/{id}', 'template.delete')->name('delete-template');
    Route::livewire('/register/new-user', 'register-new-user')->name('register/new-user');
    Route::livewire('/measurement', 'template.measurement')->name('measurement');



});
