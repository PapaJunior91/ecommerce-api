<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;


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

Route::post('login', [AuthController::class, 'login']);

Route::post('users', [UsersController::class, 'store']);
Route::get('users', [UsersController::class, 'index']);
Route::put('users/{id}', [UsersController::class, 'update']);

Route::post('products', [ProductsController::class, 'store']);
Route::get('products', [ProductsController::class, 'index']);
Route::put('products/{id}', [ProductsController::class, 'update']);
Route::get('products/template', [ProductsController::class, 'productTemplate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
