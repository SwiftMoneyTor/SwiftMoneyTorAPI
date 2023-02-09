<?php

use App\Http\Controllers\Authentication\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsInventory\ItemsInventoryController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Transaction\TransactionController;

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
Route::middleware('auth:api')->controller(TransactionController::class)->group(function () {
    Route::post('transactions/fetch', 'fetch');
    Route::post('transactions/add', 'add');
});
Route::middleware('auth:api')->controller(ProductsController::class)->group(function () {
    Route::post('products/add', 'add');
});
Route::middleware('auth:api')->controller(ItemsInventoryController::class)->group(function () {
    Route::post('inventory/fetch', 'fetch');
    Route::post('inventory/add', 'add');
});
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('auth/login', 'login');
    Route::post('auth/register', 'register');
    Route::post('auth/logout', 'logout');
});
