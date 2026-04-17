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
                        <h4 class="mb-0">Tambah Review Baru</h4>
                    </div>

                    <form action="{{ route('reviews.store') }}" method="POST" class="form-floating">
                        <div class="card-body p-4">
                            @csrf
                            <div class="form-floating mb-3 width-50">
                                <label for="atraction_id" class="form-label  pt-1">Atraksi</label>
                                <select name="atraction_id" id="atraction_id"
                                    class="form-select @error('atraction_id') is-invalid @enderror" required>
                                    <option value="">Select Review</option>
                                    @foreach ($atractions as $atraction)
                                        <option value="{{ $atraction->id }}"
                                            {{ old('atraction_id') == $atraction->id ? 'selected' : '' }}>
                                            {{ $atraction->name }}
                                        </option>
                                    @endforeach
                                    @error('atraction_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid @enderror"
                                    id="floatingInput" placeholder="Atraction Name" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <label for="name">Nama Review</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="comment" class="form-control  @error('comment') is-invalid @enderror" id=""
                                    placeholder="Comment" required>{{ old('comment') }}</textarea>
                                <label>Comment</label>
                                @error('comment')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>                                    
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
