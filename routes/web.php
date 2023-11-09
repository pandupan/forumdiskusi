<?php

use App\Http\Controllers\Diskusi\DiskusiDeleteController;
use App\Http\Controllers\Diskusi\DiskusiStoreController;
use App\Http\Controllers\Diskusi\DiskusiEditController;
use App\Http\Controllers\Diskusi\DiskusiUpdateController;
use App\Http\Controllers\Diskusi\DiskusiFilterController;
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
//Diskusi Delete
Route::delete('diskusi/{id}', DiskusiDeleteController::class)->name('diskusi.destroy');
//Diskusi Filter
Route::get('diskusi/filter', DiskusiFilterController::class)->name('diskusi.filter');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
