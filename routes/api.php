<?php

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

Route::get('/categories/read',[\App\Http\Controllers\Categories::class,'readCategories']);
Route::post('/categories/create',[\App\Http\Controllers\Categories::class,'createCategories']);
Route::put('/categories/update/{id}',[\App\Http\Controllers\Categories::class,'updateCategories']);
Route::delete('/categories/delete/{id}',[\App\Http\Controllers\Categories::class,'deleteCategories']);

Route::get('/users/read',[\App\Http\Controllers\Users::class,'readUsers']);
Route::post('/users/create',[\App\Http\Controllers\Users::class,'createUsers']);
Route::put('/users/update/{id}',[\App\Http\Controllers\Users::class,'updateUsers']);
Route::delete('/users/delete/{id}',[\App\Http\Controllers\Users::class,'deleteUsers']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
