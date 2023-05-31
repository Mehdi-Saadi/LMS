<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookIssueController;

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

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix('/authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors');
    Route::post('/store', [AuthorController::class, 'store'])->name('storeAuthor');
    Route::post('/edit/{id}', [AuthorController::class, 'update'])->name('editAuthor');
    Route::delete('/delete/{id}', [AuthorController::class, 'delete'])->name('deleteAuthor');
});
Route::prefix('/publishers')->group(function () {
    Route::get('/', [PublisherController::class, 'index'])->name('publishers');
    Route::post('/store', [PublisherController::class, 'store'])->name('storePublisher');
    Route::post('/edit/{id}', [PublisherController::class, 'update'])->name('editPublisher');
    Route::delete('/delete/{id}', [PublisherController::class, 'delete'])->name('deletePublisher');
});
Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::post('/store', [CategoryController::class, 'store'])->name('storeCategory');
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('editCategory');
    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');
});
Route::prefix('/books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books');
    Route::get('/{id}/details', [BookController::class, 'details'])->name('bookDetails');
    Route::post('/store', [BookController::class, 'store'])->name('storeBook');
    Route::post('/edit/{id}', [BookController::class, 'update'])->name('editBook');
    Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('deleteBook');
});
Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('/{id}/details', [UserController::class, 'details'])->name('userDetails');
    Route::post('/store', [UserController::class, 'store'])->name('storeUser');
    Route::post('/edit/{id}', [UserController::class, 'update'])->name('editUser');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('deleteUser');
});
Route::prefix('/bookIssue')->group(function () {
    Route::get('/', [BookIssueController::class, 'index'])->name('bookIssues');
    Route::get('/{id}/details', [BookIssueController::class, 'details'])->name('bookIssueDetails');
    Route::post('/store', [BookIssueController::class, 'store'])->name('storeBookIssue');
    Route::delete('/delete/{id}', [BookIssueController::class, 'delete'])->name('deleteBookIssue');
});
