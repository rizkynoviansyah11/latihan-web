@extends('master')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Review</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-2 width-50">
                                <label for="atraction_id" class="form-label pt-2">Atraksi</label>
                                <select name="atraction_id" id="atraction_id"
                                    class="form-select @error('atraction_id') is-invalid @enderror" required>
                                    <option value="">Select Atraction</option>
                                    @foreach ($atractions as $atraction)
                                        <option value="{{ $atraction->id }}"
                                            {{ old('atraction_id') == $atraction->id ? 'selected' : '' }}>
                                            {{ $atraction->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('atraction_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="floating-input" aria-placeholder="Nama Atraction">Nama
                                    Review</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $review->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="floating-input">Komentar</label>
                                <textarea id="comment" name="comment" class="form-control @error('description') is-invalid @enderror" rows="4"
                                    required>{{ old('comment', $review->atraction) }}</textarea>
                                @error('comment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
