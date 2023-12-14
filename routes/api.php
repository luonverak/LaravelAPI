<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [PeopleController::class, 'index']);
Route::post('/add', [PeopleController::class, 'addData']);
Route::get('/{id}', [PeopleController::class, 'search']);
Route::put('/update/{id}', [PeopleController::class, 'updateData']);
Route::delete('/delete/{id}', [PeopleController::class, 'deleteData']);