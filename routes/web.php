<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Api\NewsApiController;

Route::get('/news', [NewsApiController::class, 'index']);
Route::get('/news/{id}', [NewsApiController::class, 'show']);