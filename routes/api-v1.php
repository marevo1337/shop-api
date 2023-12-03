<?php

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

Route::group(['prefix' => 'users'], function () {
    Route::post('', [App\Http\Controllers\API\v1\User\Registration\Controller::class, 'run'])
        ->middleware('guest');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [App\Http\Controllers\API\v1\Auth\Login\Controller::class, 'run'])
        ->middleware('guest');
    Route::post('refresh', [App\Http\Controllers\API\v1\Auth\Refresh\Controller::class, 'run']);
});

Route::group(['prefix' => 'users'], function () {
    Route::get('', [App\Http\Controllers\API\v1\User\List\Controller::class, 'run'])
        ->middleware('auth');
});

Route::group(['prefix' => 'permissions'], function () {
    Route::get('', [App\Http\Controllers\API\v1\Permission\List\Controller::class, 'run'])
        ->middleware('auth');
    Route::post('', [App\Http\Controllers\API\v1\Permission\Create\Controller::class, 'run'])
        ->middleware('auth');
});

Route::get('profile', [App\Http\Controllers\API\v1\User\Profile\Controller::class, 'run'])
    ->middleware('auth');

Route::group(['prefix' => 'product-categories'], function () {
    Route::post('', [App\Http\Controllers\API\v1\ProductCategory\Create\Controller::class, 'run'])
        ->middleware('auth');
    Route::put('{id}', [App\Http\Controllers\API\v1\ProductCategory\Update\Controller::class, 'run'])
        ->where('id', '[0-9]+')
        ->middleware('auth');
    Route::get('', [App\Http\Controllers\API\v1\ProductCategory\List\Controller::class, 'run'])
        ->middleware('auth');
});

Route::group(['prefix' => 'products'], function () {
    Route::post('', [App\Http\Controllers\API\v1\Product\Create\Controller::class, 'run'])
        ->middleware('auth');
});
