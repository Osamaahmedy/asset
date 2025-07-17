<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\EducationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "api" middleware group. Make something great!
|
*/

// اختبار الاتصال
// api.php

Route::get('/news', [NewsApiController::class, 'index']);
Route::get('/news/{id}', [NewsApiController::class, 'show']);
Route::get('/ping', function () {
    return response()->json(['message' => 'API Working ✅']);
});


Route::get('/universities', [EducationController::class, 'universities']);
Route::get('/institutes', [EducationController::class, 'institutes']);

use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\StudentFileUploadController;

Route::get('/countries', [StudentApiController::class, 'countries']);
Route::post('/students/submit', [StudentApiController::class, 'submitStudent']);
Route::post('/students/upload-file', [StudentFileUploadController::class, 'uploadFile']);
