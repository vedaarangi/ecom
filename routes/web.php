<?php

use App\Http\Controllers\B2bQuoteController;
use Illuminate\Support\Facades\Route;

Route::post('/b2b-quote/submit', [B2bQuoteController::class, 'store'])->name('b2b.quote.submit');
