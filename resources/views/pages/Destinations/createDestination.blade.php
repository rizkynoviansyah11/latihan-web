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
                        <h4 class="mb-0">Tambah Destinasi Baru</h4>
                    </div>
                    <form action="{{ route('destinations.store') }}" method="POST">
                        @csrf
                        <div class="card-body p-4">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatInput" placeholder="Image"
                                    name="image" value="{{ old('image') }}" accept=".jpg,.jpeg,.png">
                                <label for="floatingInput">Gambar Destinasi</label>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2 width-50">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage"
                                    name="name" @error('name') is-invalid @enderror value="{{ old('name') }}" required>
                                <label for="name">Nama Destinasi</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea name="description" class="form-control" id="" placeholder="Description"
                                    @error('description') is-invalid @enderror required>{{ old('description') }}</textarea>
                                <label for="floatingPassword">Description</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Location"
                                    name="location" @error('location') is-invalid @enderror value="{{ old('location') }}"
                                    required>
                                <label for="floatingInput">Lokasi</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Jumat"
                                    name="working_days" @error('working_days') is-invalid @enderror
                                    value="{{ old('working_days') }}" required>
                                <label for="floatingInput">Hari Operasional</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="08:00 - 18:00"
                                    name="working_hours" @error('working_hours') is-invalid @enderror
                                    value="{{ old('working_hours') }}" required>
                                <label for="floatingInput">Jam Operasional</label>

                            </div>
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="floatingInput" placeholder="50000"
                                    name="ticket_price" @error('ticket_price') is-invalid @enderror
                                    value="{{ old('ticket_price') }}" required>
                                <label for="floatingInput">Harga Tiket</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
