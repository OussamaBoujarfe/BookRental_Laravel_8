<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('rental',[App\Http\Controllers\borrowController::class, 'index'])->name('rental.index')->middleware('role:0');

Route::get('rental/create', [App\Http\Controllers\borrowController::class, 'create'])->name('rental.create');
Route::get('rental', [App\Http\Controllers\borrowController::class, 'store'])->name('rental.store')->middleware('role:0');

Route::get('rental/{id}/show', [App\Http\Controllers\borrowController::class, 'showRentalDetails'])->name('rental.show');

*/
/*
Route::get('rental/{id}/show', [App\Http\Controllers\genreController::class, 'show'])->name('genre.show');
Route::get('rental', [App\Http\Controllers\genreController::class, 'index'])->name('genre.index');
Route::get('rental/create', [App\Http\Controllers\genreController::class, 'create'])->name('genre.create');
Route::post('rental', [App\Http\Controllers\genreController::class, 'store'])->name('genre.store');
Route::get('rental/{id}/edit',[App\Http\Controllers\genreController::class, 'edit'])->name('genre.edit');
Route::put('rental/{id}', [App\Http\Controllers\genreController::class, 'update'])->name('genre.update');
Route::delete('rental/{id}',[App\Http\Controllers\genreController::class, 'destroy'])->name('genre.destroy');

*/

Route::get('/book_by_genre/{name}',[App\Http\Controllers\publicController::class, 'list']);
Route::get('/book_by_genre/{name}',[App\Http\Controllers\HomeController::class, 'list']);


Route::get('/', [App\Http\Controllers\publicController::class, 'index'])->name('public');
Route::get('/search',[App\Http\Controllers\publicController::class, 'search']);


//Route::get('book/{id}/show', [App\Http\Controllers\publicController::class, 'show'])->name('book.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:0');

Route::get('/profile',[App\Http\Controllers\HomeController::class, 'profile']);

Auth::routes();

//Routes for book
Route::get('book/{id}/show', [App\Http\Controllers\bookController::class, 'show'])->name('book.show');

Route::get('book', [App\Http\Controllers\bookController::class, 'index'])->name('book.index')->middleware('role:1');
Route::get('book/create', [App\Http\Controllers\bookController::class, 'create'])->name('book.create')->middleware('role:1');
Route::post('book', [App\Http\Controllers\bookController::class, 'store'])->name('book.store')->middleware('role:1');
Route::get('book/{id}/edit',[App\Http\Controllers\bookController::class, 'edit'])->name('book.edit')->middleware('role:1');
Route::put('book/{id}', [App\Http\Controllers\bookController::class, 'update'])->name('book.update')->middleware('role:1');
Route::delete('book/{id}',[App\Http\Controllers\bookController::class, 'destroy'])->name('book.destroy')->middleware('role:1');


Route::get('genre/{id}/show', [App\Http\Controllers\genreController::class, 'show'])->name('genre.show');
Route::get('genre', [App\Http\Controllers\genreController::class, 'index'])->name('genre.index')->middleware('role:1');
Route::get('genre/create', [App\Http\Controllers\genreController::class, 'create'])->name('genre.create')->middleware('role:1');
Route::post('genre', [App\Http\Controllers\genreController::class, 'store'])->name('genre.store')->middleware('role:1');
Route::get('genre/{id}/edit',[App\Http\Controllers\genreController::class, 'edit'])->name('genre.edit')->middleware('role:1');
Route::put('genre/{id}', [App\Http\Controllers\genreController::class, 'update'])->name('genre.update')->middleware('role:1');
Route::delete('genre/{id}',[App\Http\Controllers\genreController::class, 'destroy'])->name('genre.destroy')->middleware('role:1');


Route::get('borrow/{id}/show', [App\Http\Controllers\borrowController::class, 'show'])->name('borrow.show');

Route::get('rental', [App\Http\Controllers\borrowController::class, 'index'])->name('borrow.index')->middleware('role:1');
Route::get('borrow', [App\Http\Controllers\borrowController::class, 'index'])->name('borrow.index')->middleware('role:0');
Route::get('borrow/create', [App\Http\Controllers\borrowController::class, 'create'])->name('borrow.create')->middleware('role:1');
Route::post('borrow', [App\Http\Controllers\borrowController::class, 'store'])->name('borrow.store');
Route::get('borrow/{id}/edit',[App\Http\Controllers\borrowController::class, 'edit'])->name('borrow.edit')->middleware('role:1');
Route::put('borrow/{id}', [App\Http\Controllers\borrowController::class, 'update'])->name('borrow.update')->middleware('role:1');
Route::delete('borrow/{id}',[App\Http\Controllers\borrowController::class, 'destroy'])->name('borrow.destroy');

