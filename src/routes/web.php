<?php

use App\Http\Controllers\front\GenerateSnippetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SnippetController;
use App\Http\Controllers\VisitCounterController;
use App\Http\Controllers\VisitsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test_snippet');
});

Route::get('/test2', function () {
    return view('test_snippet');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/visitors', [VisitsController::class, 'index'])->name('visitors.index');
    Route::get('/list_visits', [VisitsController::class, 'listVisits'])->name('visitors.listVisits');
    Route::get('/snippet', [SnippetController::class, 'trackingSnippet'])->name('snippet.trackingSnippet');
});

Route::controller(VisitCounterController::class)->group(function () {
    Route::post('/add', 'add');
});

Route::get('/tracking_snippet/{id}', [GenerateSnippetController::class, 'index'])->name('tracking.index');

require __DIR__.'/auth.php';
