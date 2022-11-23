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

Route::group(['prefix' => 'order'], function () {
	Route::post('/show/{order_id}', [App\Http\Controllers\V1\Api\OrderController::class, 'show'])->where('order_id', '[0-9]+')->name('order.store');
	Route::post('/update/{order_id}', [App\Http\Controllers\V1\Api\OrderController::class, 'update'])->where('order_id', '[0-9]+')->name('order.update');
	Route::post('/create', [App\Http\Controllers\V1\Api\OrderController::class, 'store'])->name('order.store');
});
