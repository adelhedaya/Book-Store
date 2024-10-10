@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Profile</h1>

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $profile->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $profile->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>

    <form action="{{ route('admin.profile.destroy') }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
