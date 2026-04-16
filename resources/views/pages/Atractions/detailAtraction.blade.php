@extends('master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detail Atraksi</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                             <p class="text-muted">Nama Atraksi</p>
                            <h4 class="text-primary">{{ $atraction->name }}</h4>
                        </div>
                        <div class="mb-4">
                            <p class="text-muted mb-1">Deskripsi:</p>
                            <p class="fw-bold">{{ $atraction->description }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('atractions.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('atractions.edit', $atraction->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection