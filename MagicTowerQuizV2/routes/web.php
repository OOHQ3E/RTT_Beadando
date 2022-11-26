<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LeaderboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('/settings', SettingsController::class);

Route::get('/', [PagesController::class, 'index']);

Route::get('/create', [SettingsController::class, 'create']) -> name('create');

Route::post('/create/store', [SettingsController::class, 'store']) -> name('create.store');
Route::get('/create/store', function () {
    return redirect('/create');
});

Route::post('/delete', [SettingsController::class, 'destroy']) -> name('question.destroy');
Route::get('/delete', function () {
    return redirect('/settings');
});

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::post('/quiz', [QuizController::class, 'index'])->name('quiz');
Route::get('/quiz', function () { return redirect('/'); } );

Route::post('/quiz/evaluation', [QuizController::class, 'evaluation'])->name('evaluation');
Route::get('/quiz/evaluation', function () { return redirect('/'); });

Route::get('/leaderboards', [LeaderboardController::class, 'index'])->name('leaderboards');
Route::post('/leaderboards', [LeaderboardController::class, 'index']);

Auth::routes();
