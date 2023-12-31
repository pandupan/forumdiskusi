<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Diskusi\DiskusiDeleteController;
use App\Http\Controllers\Diskusi\DiskusiStoreController;
use App\Http\Controllers\Diskusi\DiskusiEditController;
use App\Http\Controllers\Diskusi\DiskusiUpdateController;
use App\Http\Controllers\Diskusi\DiskusiFilterController;
use App\Http\Controllers\Diskusi\DiskusiCommentsController;
use App\Http\Controllers\Diskusi\CommentDeleteController;
use App\Http\Controllers\Diskusi\CommentEditController;
use App\Http\Controllers\Diskusi\CommentUpdateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
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

Route::get('/timeline', TimelineController::class)->middleware(['auth', 'verified'])->name('dashboard');
// Diskusi POST
Route::post('diskusi', DiskusiStoreController::class)->name('diskusi.store');
//Dikusi EDIT
Route::get('diskusi/{id}/edit', DiskusiEditController::class)->name('diskusi.edit');
//Diskusi UPDATE
Route::put('diskusi/{id}/edit', DiskusiUpdateController::class)->name('diskusi.update');
//Diskusi COMMENTS
Route::get('diskusi/{id}/comment', DiskusiCommentsController::class)->name('diskusi.show');
Route::post('diskusi/{id}/comment/commenting', [CommentsController::class, 'store'])
    ->middleware('auth', 'verified')
    ->name('comment.store');
//Diskusi Comment Delete
Route::delete('diskusi/{diskusi_id}/comment', CommentDeleteController::class)->name('comment.destroy');
//Diskusi Comment Edit dan Update
Route::get('diskusi/{diskusi_id}/comment/edit', CommentEditController::class)->name('comment.edit');
Route::put('diskusi/{diskusi_id}/comment/edit', CommentUpdateController::class)->name('comment.update');
//Diskusi Delete
Route::delete('diskusi/{id}', DiskusiDeleteController::class)->name('diskusi.destroy');
//Diskusi Filter
Route::get('diskusi/filter', DiskusiFilterController::class)->name('diskusi.filter');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
