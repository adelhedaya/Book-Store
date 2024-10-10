<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\Student\StudentBookController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/admin/borrowed', [BorrowingController::class, 'index'])->name('admin.borrowed');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');

    Route::get('/admin/students/search', [StudentController::class, 'search'])->name('admin.students.search');

    

    Route::get('profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/borrowed', [BorrowingController::class, 'indexStudent'])->name('borrowed.index');
    Route::post('/books/return/{book}', [StudentBookController::class, 'returnBook'])->name('books.return');
    Route::get('books', [StudentBookController::class, 'index'])->name('books.index');
    Route::get('books/{book}', [StudentBookController::class, 'show'])->name('books.show');
    Route::post('books/{book}/borrow', [StudentBookController::class, 'borrow'])->name('books.borrow');
    Route::get('/profile/edit', [StudentProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::put('/profile/update', [StudentProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::delete('/profile/delete', [StudentProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');
});


