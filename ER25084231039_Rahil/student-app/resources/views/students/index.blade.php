@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Student
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($students as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>

                    <td>
                        <!-- ✏️ Edit -->
                        <a href="{{ route('students.edit', $student->id) }}" 
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <!-- 🗑 Delete Button -->
                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $student->id }}">
                            <i class="bi bi-trash"></i>
                        </button>

                        <!-- 🔴 Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        Are you sure you want to delete 
                                        <strong>{{ $student->name }}</strong>?
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                Yes, Delete
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection