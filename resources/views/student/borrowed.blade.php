

@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Borrowed Books</h1>
    @if(count($borrowedBooks) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                 
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowedBooks as $book)
                    <tr>
                      
                        <td>{{ $book->book_id }}</td>
                        <td>{{ $book->borrowed_at }}</td>
                        <td>{{ $book->returned_at ? \Carbon\Carbon::parse($book->returned_at)->format('Y-m-d') : '2024-10-1' }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have not borrowed any books yet.</p>
    @endif
</div>
@endsection
