<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MessageController::class, 'index']);
Route::post('/create', [MessageController::class, 'create']);
Route::get('/logout', [MessageController::class, 'logout']);
Route::get('/chat/{id}', [RoomController::class, 'index'])->name('show');
Route::post('/chat/create', [RoomController::class, 'create']);

// Route::get('dashboard', function () {
//     return view('index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
