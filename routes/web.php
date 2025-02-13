<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerLogController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

// Default Route
Route::get('/', function () {
    return to_route('login');
});

// Authentication Routes
Auth::routes();

// Dashboard Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Profile Routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// About Page Route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Quiz Management Routes
Route::resource('quizzes', QuizController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('questions', QuestionController::class);
Route::resource('answer-logs', AnswerLogController::class);
Route::resource('leaderboards', LeaderboardController::class);

// Additional Leaderboard Routes
Route::get('/quizzes/{quiz}/leaderboard/generate', [LeaderboardController::class, 'generate'])->name('leaderboards.generate');
Route::get('/quizzes/{quiz}/leaderboard/pdf', [LeaderboardController::class, 'exportPDF'])->name('leaderboards.export.pdf');
Route::post('questions/uploadExcel', [QuestionController::class, 'uploadExcel'])->name('questions.uploadExcel');

// Additional routes for quiz management
Route::get('quizzes/{quiz}/start', [QuizController::class, 'selectQuiz'])->name('quizzes.start');

Route::get('quizzes/{quiz}/{participant}/select', [QuizController::class, 'selectParticipant'])->name('quizzes.participant.select');

Route::get('quizzes/{quiz}/{participant}/start', [QuizController::class, 'selectQuestion'])->name('quizzes.question.select');

Route::get('quizzes/{quiz}/{participant}/answer', [AnswerLogController::class, 'startQuiz'])->name('quizzes.answer');

Route::get('answer/{quiz}/{participant}/{question}', 'AnswerLogController@create')->name('answer.question');


Route::post('/quizzes/{quiz}/answer', [AnswerLogController::class, 'store'])->name('quizzes.answer');
Route::get('/quizzes/{quiz}/next', [QuizController::class, 'next'])->name('quizzes.next');
