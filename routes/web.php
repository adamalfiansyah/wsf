<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::post('/uploads', [FileController::class, 'uploads'])->name('uploads');
Route::get('/files/{file}', [FileController::class, 'files'])->name('files');
Route::get('/downloads/{file}', [FileController::class, 'downloads'])->name('downloads');
