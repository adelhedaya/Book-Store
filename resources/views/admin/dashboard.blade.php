@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="text-center mb-5">
        <h1 class="display-4 font-weight-bold">Admin Dashboard</h1>
        <p class="lead text-muted">Manage and oversee the library resources efficiently.</p>
    </div>

   
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <a href="{{ route('admin.borrowed') }}" class="btn btn-lg btn-outline-primary btn-block rounded-pill shadow-sm py-3">
                <i class="fas fa-book-reader fa-2x"></i>
                <p class="mt-2 mb-0">View Borrowed Books</p>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.books.index') }}" class="btn btn-lg btn-outline-success btn-block rounded-pill shadow-sm py-3">
                <i class="fas fa-book fa-2x"></i>
                <p class="mt-2 mb-0">Manage Books</p>
            </a>
        </div>
        <div class="col-md-4">
    <a href="{{ route('admin.students.search') }}" class="btn btn-lg btn-outline-info btn-block rounded-pill shadow-sm py-3">
        <i class="fas fa-user-graduate fa-2x"></i>
        <p class="mt-2 mb-0">Search Students</p>
    </a>
</div>
<div class="col-md-4">
    <a href="{{ route('admin.profile.edit') }}" class="btn btn-lg btn-outline-info btn-block rounded-pill shadow-sm py-3">
        <i class="fas fa-user-graduate fa-2x"></i>
        <p class="mt-2 mb-0">Edit Profile</p>
    </a>
</div>

    </div>

   
@endsection
