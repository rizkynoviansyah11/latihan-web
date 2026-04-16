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
                    <h4 class="mb-0">Edit Destinasi</h4>
                </div>
                    <form action="{{ route('destinations.update', $destination->id) }}" method="POST" class="form-floating">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name" @error('name') is-invalid @enderror value="{{ $destination->name }}" required >
                            <label for="name">Nama Destinasi</label>
                        </div>
                            <div class="form-floating">
                                <textarea name="description" class="form-control" id=""  placeholder="Description" @error('description') is-invalid @enderror required>{{ $destination->description }}</textarea>
                                <label for="floatingPassword">Description</label>
                            </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Location" name="location" @error('location') is-invalid @enderror value="{{ $destination->location }}" required >
                            <label for="floatingInput">Lokasi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Jumat" name="working_days" @error('working_days') is-invalid @enderror value="{{ $destination->working_days }}" required >
                            <label for="floatingInput">Hari Operasional</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="08:00 - 18:00" name="working_hours" @error('working_hours') is-invalid @enderror value="{{ $destination->working_hours }}" required >
                            <label for="floatingInput">Jam Operasional</label>
                            
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="50000" name="ticket_price" @error('ticket_price') is-invalid @enderror value="{{ $destination->ticket_price }}" required >
                            <label for="floatingInput">Harga Tiket</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection