@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Books</h4>
                </div>

                <div class="card-body">
                    <a href="{{ route('student.dashboard') }}" class="btn btn-primary mb-3">Back</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('student.books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                                        @if(!$book->is_borrowed)
                                            <a href="{{ route('student.books.borrow', $book->id) }}" class="btn btn-success btn-sm">Borrow</a>
                                        @else
                                            <button class="btn btn-secondary btn-sm" >Borrowed</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
