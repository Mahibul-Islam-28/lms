<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\OperatorController;

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
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'logData']);

Route::get('/404', [LoginController::class, 'notFound'])->name('404');

Route::middleware(['verifyLogin'])->group(function () {

    // logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');;

    Route::get('/', [LoginController::class, 'index'])->name('index');

    // Author
    Route::get('/author', [AuthorController::class, 'index'])->name('author');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('authorCreate');
    Route::post('/author/create', [AuthorController::class, 'store']);
    Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])->name('authorEdit');
    Route::post('/author/{id}/edit', [AuthorController::class, 'update']);
    Route::delete('/author/{id}/delete', [AuthorController::class, 'delete'])->name('authorDelete');

    // Books
    Route::get('/book', [BookController::class, 'index'])->name('book');
    Route::get('/book/create', [BookController::class, 'create'])->name('bookCreate');
    Route::post('/book/create', [BookController::class, 'store']);
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('bookEdit');
    Route::post('/book/{id}/edit', [BookController::class, 'update']);
    Route::delete('/book/{id}/delete', [BookController::class, 'delete'])->name('bookDelete');

    // Member
    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/create', [MemberController::class, 'create'])->name('memberCreate');
    Route::post('/member/create', [MemberController::class, 'store']);
    Route::get('/member/{id}/edit', [MemberController::class, 'edit'])->name('memberEdit');
    Route::post('/member/{id}/edit', [MemberController::class, 'update']);
    Route::delete('/member/{id}/delete', [MemberController::class, 'delete'])->name('memberDelete');

    // Member
    Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow');
    Route::get('/borrow/create', [BorrowController::class, 'create'])->name('borrowCreate');
    Route::post('/borrow/create', [BorrowController::class, 'store']);
    Route::get('/borrow/{id}/edit', [BorrowController::class, 'edit'])->name('borrowEdit');
    Route::post('/borrow/{id}/edit', [BorrowController::class, 'update']);
    Route::delete('/borrow/{id}/delete', [BorrowController::class, 'delete'])->name('borrowDelete');

    // Member
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator');
    Route::get('/operator/create', [OperatorController::class, 'create'])->name('operatorCreate');
    Route::post('/operator/create', [OperatorController::class, 'store']);
    Route::get('/operator/{id}/edit', [OperatorController::class, 'edit'])->name('operatorEdit');
    Route::post('/operator/{id}/edit', [OperatorController::class, 'update']);
    Route::delete('/operator/{id}/delete', [OperatorController::class, 'delete'])->name('operatorDelete');
});

