<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $borrowedBooks = Borrowing::with('book')
            ->where('user_id', $userId)
            ->get();

        $borrowedBooksCount = $borrowedBooks->count();
        $maxBooks = 1000; 

        return view('student.dashboard', compact('borrowedBooks', 'borrowedBooksCount', 'maxBooks'));
    }
  


    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->user_id !== Auth::id()) {
            return redirect()->route('student.dashboard');
        }

        $borrowing->delete();

        return redirect()->route('student.dashboard');
    }
}
