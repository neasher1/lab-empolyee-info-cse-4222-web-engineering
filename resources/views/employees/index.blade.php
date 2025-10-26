@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Employees</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
</div>

<form action="{{ route('employees.search') }}" method="GET" class="mb-3">
    <input type="text" name="query" placeholder="Search by Name or Designation" class="form-control" value="{{ request('query') }}">
</form>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Joining Date</th>
            <th>Salary</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->designation }}</td>
            <td>{{ $employee->joining_date }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->mobile_no }}</td>
            <td>{{ $employee->address }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $employees->links() }}
@endsection