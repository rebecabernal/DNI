<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;

Route::get('/link/{id}',[LetterController::class, 'linkLetterAndNumber'])->name('apilink');