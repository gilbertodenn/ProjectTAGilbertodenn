<?php

use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KnowledgeCenterController;
use App\Http\Controllers\BotConfigController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TelegramController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/chat', [TelegramController::class, 'index']);
Route::post('/send-message', [TelegramController::class, 'sendMessage']);
Route::get('/get-updates', [TelegramController::class, 'getUpdates']);


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chat', [TelegramController::class, 'index'])->name('chat.index');
    Route::get('/knowledge-center', [KnowledgeCenterController::class, 'index'])->name('knowledge.index');
    Route::get('/bot-configuration', [BotConfigController::class, 'index'])->name('bot.index');
});

require __DIR__.'/auth.php';
