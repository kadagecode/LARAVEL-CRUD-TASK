<!-- students.list.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
<div class="row mb-3">
        
<div class="card">
    <div class="card-header">Actions</div>
    <div class="card-body">
        <div class="row">
            <div class="col text-right mb-3">
                <a href="{{ route('students.register') }}" class="btn btn-success">New Registration</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('students.searchsort') }}" method="GET">
                    <div class="form-row">
                        <div class="col-md-8">

                            <input type="text" name="search" class="form-control" placeholder="Search by Name">
                        </div>
                        <div class="col-md-4 mt-4">
                            <select name="sort" class="form-control">
                                <option value="">Sort by</option>
                                <option value="name">Name</option>
                                <option value="class">Class</option>
                                <option value="roll_no">Roll No</option>
                                <!-- Add more options for other sortable columns -->
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">Search & Sort</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col">
            <h1>Student List</h1>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Roll No</th>
                <th>Marks</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Subject</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentdatas as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->roll_no }}</td>
                <td>{{ $student->marks }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->subject }}</td>
                <td>{{ $student->country }}</td>
                <td>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

     <!-- Pagination Links -->
     {{ $studentdatas->links('pagination::bootstrap-4') }}</div>
@endsection
