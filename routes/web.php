<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Crud;



Route::get('/',  Crud::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

