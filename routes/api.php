<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [AuthController::class,'login']);

Route::post('/customer/add', [CustomerController::class, 'createCustomer']);
Route::get('/customer/index/{id}', [CustomerController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/user/index', [UserController::class,'index']);
    Route::post('/user/change-password', [UserController::class, 'password']);
    
    
    Route::put('/customer/close',[CustomerController::class],'close');
    Route::delete('/customer/delete', [CustomerController::class],'destroy');

    
});

// Route::get('/test', function () {
//     dd('test');
// });

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});