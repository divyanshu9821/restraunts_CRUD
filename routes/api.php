<?php

use App\Http\Controllers\Master_location;
use App\Http\Controllers\Master_restaurant_brand;
use App\Http\Controllers\Restaurant;
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

Route::prefix('city-state')->group(function () {
    Route::post('insert', [Master_location::class, 'create']);
    Route::get('get/{id?}', [Master_location::class, 'read']);
    Route::post('edit', [Master_location::class, 'update']);
    Route::post('remove', [Master_location::class, 'delete']);
});



Route::prefix('restaurant-brand')->group(function () {
    Route::post('insert', [Master_restaurant_brand::class, 'create']);
    Route::get('get/{id?}', [Master_restaurant_brand::class, 'read']);
    Route::post('edit', [Master_restaurant_brand::class, 'update']);
    Route::post('remove', [Master_restaurant_brand::class, 'delete']);
});



Route::prefix('restaurants')->group(function () {
    Route::post('insert', [Restaurant::class, 'create']);
    Route::get('get/{id?}', [Restaurant::class, 'read']);
    Route::post('edit', [Restaurant::class, 'update']);
    Route::post('remove', [Restaurant::class, 'delete']);
});