@extends('layouts.app')

@section('content')
<div class="container">
<h4>Total Students: {{ $totalStudents }}</h4>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>
            <form action="{{ route('admin.students.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="user_id" placeholder="Enter User ID" aria-label="Search" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <br>

          
            

            @if($student)
                <h4>Student Details:</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $student->id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $student->email }}</td>
                    </tr>
                   
                </table>
            
            @endif
        </div>
    </div>
</div>
@endsection
