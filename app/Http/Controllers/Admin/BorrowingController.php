<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowedBooks = Borrowing::with('book', 'user')->get();
        return view('admin.borrowed', compact('borrowedBooks'));
    }
    public function indexStudent()
    {
        $user = Auth::user();
       
        $borrowedBooks = $user->borrowedBooks; 
        
        return view('student.borrowed', compact('borrowedBooks'));
    }
}
