@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning fw-bold">
                Edit Student
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('students.update', $student->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" 
                               class="form-control" 
                               value="{{ $student->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" 
                               class="form-control" 
                               value="{{ $student->email }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            Back
                        </a>

                        <button class="btn btn-success">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection