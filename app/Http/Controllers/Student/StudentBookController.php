<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentBookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('student.books.index', compact('books'));
    }
    public function show(Book $book)
    {
        return view('student.books.show', compact('book'));
    }
    public function borrowBook(Request $request)
{
    $borrow = new Borrowing();
    $borrow->user_id = Auth::id();
    $borrow->book_id = $request->input('book_id');
    $borrow->borrowed_at = now();
    $borrow->save();

    return redirect()->back()->with('success', 'Book borrowed successfully');
}

    public function returnBook(Borrowing $borrowing)
    {
        $borrowing->update([
            'returned_at' => now(),
           
        ]);

        
       
        return redirect()->route('student.dashboard')->with('success', 'Book returned successfully.');
    }
    public function borrow(Book $book)
    {
        $userId = Auth::id();

        if ($book->is_borrowed) {
            return redirect()->route('student.books.index')->with('error', 'Book is already borrowed.');
        }

        Borrowing::create([
            'user_id' => $userId,
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_at' => now(),
            'return_at' => now()
        ]);

      
        $book->update(['is_borrowed' => true]);

        return redirect()->route('student.books.index')->with('success', 'Book borrowed successfully.');
    }
    
}
?>