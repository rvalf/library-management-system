<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/login', function () {
//     return view('auth-login');
// });


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {})->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/craete', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/craete', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/edit/{id}', action: [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/edit/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth', 'librarian'])->group(function () {
    Route::get('/librarian/category', [CategoryController::class, 'index'])->name('libr.category.index');
    Route::get('/librarian/category/create', [CategoryController::class, 'create'])->name('libr.category.create');
    Route::post('/librarian/category/create', [CategoryController::class, 'store'])->name('libr.category.store');
    Route::get('/librarian/category/edit/{id}', action: [CategoryController::class, 'edit'])->name('libr.category.edit');
    Route::post('/librarian/category/edit/{id}', [CategoryController::class, 'update'])->name('libr.category.update');
    Route::delete('/librarian/category/{id}', [CategoryController::class, 'destroy'])->name('libr.category.destroy');

    Route::get('/librarian/books', [BookController::class, 'index'])->name('libr.books.index');
    Route::get('/librarian/books/create', [BookController::class, 'create'])->name('libr.books.create');
    Route::post('/librarian/books/create', [BookController::class, 'store'])->name('libr.books.store');
    Route::get('/librarian/books/edit/{id}', action: [BookController::class, 'edit'])->name('libr.books.edit');
    Route::post('/librarian/books/edit/{id}', [BookController::class, 'update'])->name('libr.books.update');
    Route::delete('/librarian/books/{id}', [BookController::class, 'destroy'])->name('libr.books.destroy');
    
    Route::get('/librarian/loans', [LoansController::class, 'index'])->name('libr.loans.index');
    Route::get('/librarian/loans/create', [LoansController::class, 'create'])->name('libr.loans.create');
    Route::post('/librarian/loans/create', [LoansController::class, 'store'])->name('libr.loans.store');
    Route::get('/librarian/loans/edit/{id}', action: [LoansController::class, 'edit'])->name('libr.loans.edit');
    Route::post('/librarian/loans/edit/{id}', [LoansController::class, 'update'])->name('libr.loans.update');
});
