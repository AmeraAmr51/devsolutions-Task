<?php

use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class, 'login'])->name('users.login');

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::post('/{id}', [UserController::class, 'update'])->name('user.edit');
    Route::get('/client_info', [UserController::class, 'clientInfo'])->name('user.clientInfo');
});