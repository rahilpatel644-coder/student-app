@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white text-center fw-bold">
                Login
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Login
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection 