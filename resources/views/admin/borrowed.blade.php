@extends('layouts.app')

@section('content')
<div class="container">
  
    
    @if($borrowedBooks->isEmpty())
        <div class="alert alert-info text-center">
            No books have been borrowed yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Book Title</th>
                        <th>Borrowed By</th>
                        <th>Borrowed At</th>
                        <th>Due At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowedBooks as $borrowing)
                        <tr>
                            <td>{{ $borrowing->book->title }}</td>
                            <td>{{ $borrowing->user->name }}</td>
                            <td>{{ $borrowing->borrowed_at }}</td>
                            <td>{{ $borrowing->due_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
