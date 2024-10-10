

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $book->title }}</h4>
                </div>

                <div class="card-body">
                    <p><strong>Author</strong> {{ $book->author }}</p>
                    <p><strong>quantity</strong> {{ $book->quantity }}</p>
                    <p><strong>Title</strong> {{ $book->title }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
