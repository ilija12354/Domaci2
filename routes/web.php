<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PorudzbineController;
use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PageController::class,'index']);


Route::get('/users/create',[UserController::class,'createUser']);
Route::post('/users/create',[UserController::class,'saveUser'])->name('createUser');
Route::get('/users',[UserController::class,'showUser'])->name ('showUsers');
Route::get('/users/view/{id}', [UserController::class, 'viewUser'])->name('viewUser');
Route::post('/users/update/{id}',[UserController::class,'updateUser'])->name ('updateUser');
Route::post('/users/delete/{id}',[UserController::class,'deleteUser'])->name('deleteUser');

Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'signin'])->name('signin');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');



Route::group(['middleware' => 'auth:sanctum'], function () {
  Route::get('/proizvodi', [PorudzbineController::class, 'viewPorudzbine'])->name('viewPorudzbine');
  Route::get('/proizvodi/create', [PorudzbineController::class, 'dodajPorudzbinu'])->name('dodajPorudzbinu');
  Route::get('/proizvodi/update/{id}', [PorudzbineController::class, 'promeniPorudzbinu'])->name('promeniPorudzbinu');
  Route::get('/proizvodi/{id}', [PorudzbineController::class,'prikaziPorudzbinu'])->name('prikaziPorudzbinu');
});

Route::post('/porudzbina',[PorudzbinaController::class, 'porudzbina'])->name('porudzbina');
