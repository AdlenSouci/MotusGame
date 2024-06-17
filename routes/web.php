<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MailController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\MotusController;


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

Route::get('/', [MotusController::class, 'showIndex'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/get-secret-word', [MotusController::class, 'getSecretWord'])->name('index.secret-word');
    Route::post('/handle-guess', [MotusController::class, 'handleGuess'])->name('handle-guess');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
