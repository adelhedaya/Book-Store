<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing; 
use App\Models\User; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $borrowedBooks = Borrowing::with('book', 'user')->get();
    $books = Book::all();
    $users = User::all();
    return view('admin.dashboard', compact('borrowedBooks', 'books', 'users'));
}

}
