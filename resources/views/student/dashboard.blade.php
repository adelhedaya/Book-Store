@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
     
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Student Nook
                </div>
                <div class="card-body">
                    <a href="{{ route('student.books.index') }}" class="btn btn-light mb-3">All Books</a>
                    <a href="{{ route('student.borrowed.index') }}" class="btn btn-light mb-3"> Your Borrowed Books</a>
                    <a href="{{ route('student.profile.edit') }}" class="btn btn-light mb-3">Edit Profile</a> 
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Welcome to our Library, {{ Auth::user()->name }}
                </div>
                <div class="card-body">
                    <p>You have borrowed {{ $borrowedBooksCount }} out of a maximum of {{ $maxBooks }} books.</p>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
