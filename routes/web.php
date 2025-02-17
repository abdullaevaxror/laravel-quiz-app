
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\DashboardController;




Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::post('take-quiz/{slug}',[QuizController::class,'takeQuiz'])->name('take_quiz');


Route::get('show-quiz/{slug}', [QuizController::class, 'show'])->name('show-quiz');
Route::post('start-quiz/{slug}', [QuizController::class, 'startQuiz'])->name('start-quiz');
Route::post('take-quiz/{slug}', [QuizController::class, 'takeQuiz'])->name('take-quiz');
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/create-quiz', [QuizController::class, 'create'])->name('create-quiz');
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes');
    Route::get('/quizzes/{quiz}', [QuizController::class, 'edit'])->name('edit-quiz');
    Route::post('/quizzes/{quiz}/update', [QuizController::class, 'update'])->name('update-quiz');
    Route::post('/quizzes/{quiz}/delete', [QuizController::class, 'destroy'])->name('destroy-quiz');
    Route::get('/statistics', [DashboardController::class, 'statistics'])->name('statistics');



    Route::post('/create-quiz', [QuizController::class, 'store'])->name('store-quiz');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
