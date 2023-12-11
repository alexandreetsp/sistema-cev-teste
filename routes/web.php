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

Route::get('/admin', [Controllers\ListingController::class, 'index']) ->name('listings.index');

Route::get('/criar', [Controllers\ListingController::class, 'criar']) ->name('listings.criar');
Route::post('/criar', [Controllers\ListingController::class, 'armazenar']) ->name('listings.armazenar');


Route::get('/posts/{id}/edit', [Controllers\ListingController::class, 'editar']) ->name('listings.editar');
Route::put('/posts/{id}', [Controllers\ListingController::class, 'update']) ->name('listings.update');

Route::delete('/posts/{id}', [Controllers\ListingController::class, 'destroy'])->name('listings.destroy');


Route::put('/pausar/{id}', [Controllers\ListingController::class, 'pausar'])->name('listings.pausar');
Route::put('/despausar/{id}', [Controllers\ListingController::class, 'despausar'])->name('listings.despausar');



Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

/* end Vagas */

/*****usuario*****/

Route::get('/users', [Controllers\UsersController::class, 'index']) ->name('users.index');
Route::get('/minhasVagas', [Controllers\UsersController::class, 'vagasByUser']) ->name('users.vagas');
Route::delete('/deleteVaga/{id}', [Controllers\UsersController::class, 'DestroyVaga'])->name('users.destroy');
Route::post('/subscribe/{vagaId}', [Controllers\UsersController::class, 'SubscribeVaga'])->name('users.subscribe');



Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
