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
                        <h4 class="mb-0">Edit Atraction</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('atractions.update', $atraction->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-2 width-50">
                                <label for="destination_id" class="form-label">Destination</label>
                                <select name="destination_id" id="destination_id"
                                    class="form-control @error('destination_id') is-invalid @enderror" required>
                                    <option value="">Select Destination</option>
                                    @foreach ($destination as $destination)
                                        <option value="{{ $destinations->id }}"
                                            {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                            {{ $destination->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('destination_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="floating-input" aria-placeholder="Nama Atraction">Nama
                                    Atraction</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $atraction->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="floating-input">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="4" required>{{ old('description', $atraction->description) }}</textarea>
                                @error('description')
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
