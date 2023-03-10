<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContactTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('contacts', ContactController::class);
    Route::resource('contact-types', ContactTypeController::class)->only(['index']);
});

