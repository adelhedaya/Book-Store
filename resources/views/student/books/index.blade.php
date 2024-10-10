@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <th>Description</th>
                                <th>Status</th>
                                <th>Publication Date</th>
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
                                    <td>{{ Str::limit($book->description, 100) }}</td>
                                    <td>
                                        @if($book->is_borrowed)
                                            <span class="badge bg-secondary">Borrowed</span>
                                        @else
                                            <span class="badge bg-success">Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $book->publication_date }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('student.books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                                        @if(!$book->is_borrowed)
                                        <form action="{{ route('student.books.borrow', $book->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Borrow</button>
</form>
                                            <form action="{{ route('student.books.return', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm">Return</button>
                </form>
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
