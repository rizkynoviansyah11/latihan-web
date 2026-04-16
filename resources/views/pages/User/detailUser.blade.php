@extends('master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detail Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                             <p class="text-muted">Nama Pengguna</p>
                            <h4 class="text-primary">{{ $user->name }}</h4>
                        </div>
                        <div class="mb-4">
                            <p class="text-muted mb-1">Email:</p>
                            <p class="fw-bold">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection