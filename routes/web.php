<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

/* Pagina Vagas CRUD*/

Route::get('/', [Controllers\ListingController::class, 'index']) ->name('listings.index');

Route::get('/criar', [Controllers\ListingController::class, 'criar']) ->name('listings.criar');
Route::post('/criar', [Controllers\ListingController::class, 'armazenar']) ->name('listings.armazenar');


Route::get('/posts/{id}/edit', [Controllers\ListingController::class, 'editar']) ->name('listings.editar');
Route::put('/posts/{id}', [Controllers\ListingController::class, 'update']) ->name('listings.update');

Route::delete('/posts/{id}', [Controllers\ListingController::class, 'destroy'])->name('listings.destroy');

/* end Vagas */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
