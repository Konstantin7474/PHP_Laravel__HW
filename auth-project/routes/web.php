<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UsersController::class, 'index'])
    ->name('users.index')
    ->middleware('auth');

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "База данных подключена!";
    } catch (\Exception $e) {
        return "Ошибка: " . $e->getMessage();
    }
});


Route::get('/test-log', function() {
    Log::info('Тест лога', ['user' => Auth::user()]);
    return 'Проверьте storage/logs/laravel.log';
});


require __DIR__ . '/auth.php';
