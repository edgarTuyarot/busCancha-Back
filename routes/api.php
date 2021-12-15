<?php

use App\Http\Controllers\CanchaController;
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
Route::resource('canchas', 'App\Http\Controllers\CanchaController');

Route::resource('reserva', 'App\Http\Controllers\ReservaController');

Route::resource('user', 'App\Http\Controllers\userController');

Route::post('login',  'App\Http\Controllers\UsuariosController@login');

Route::post('propietario',  'App\Http\Controllers\PropietarioController@login');


