@extends('master')

@section( 'content')

<div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detail Review</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->name }}</h5>
                        <p class="card-text">Atraksi:
                            {{ $review->atraction->name ??
                                'No
                                    review available.' }}</p>
                        <p class="card-text">Komentar:
                            {{ $review->comment }}</p>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection