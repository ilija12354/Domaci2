<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PorudzbineController;
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

Route::get('/proizvodi', [PorudzbineController::class, 'getPorudzbine'])->name('getPorudzbine');
Route::get('/proizvodi/{id}', [PorudzbineController::class, 'viewPorudzbine'])->name('viewPorudzbine');
Route::post('proizvodi/update/{id}',[PorudzbineController::class,'updatePorudzbine']);
Route::delete('proizvodi/{id}',[PorudzbineController::class,'deletePorudzbine']);
Route::post('proizvodi/create',[PorudzbineController::class,'createPorudzbine']);
