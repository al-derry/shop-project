<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthApiController;

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

Route::post('login', [AuthApiController::class,'login']);
Route::get('/test', function () {
    return 'ddd';
});

