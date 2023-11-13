<?php

use App\Http\Controllers\Common\UploadFileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/upload-file', [UploadFileController::class, 'store']);

    Route::group(['middleware' => ['role:admin']], function () {

        Route::get('/', [HomeController::class, 'index'])->name('dashboard');

        Route::view('profile', 'profile')->name('profile');

    });
});

require __DIR__.'/auth.php';
