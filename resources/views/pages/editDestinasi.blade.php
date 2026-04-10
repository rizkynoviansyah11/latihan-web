@extends('master')

@section('content')

<form action="/destinations/{{ $destination->id }}/update" method="POST" class="form-floating">
    @csrf
    @method('PUT')
     <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name" value="{{ $destination->name }}">
        <label for="name">Nama Destinasi</label>
    </div>
        <div class="form-floating">
            <textarea name="description" class="form-control" id=""  placeholder="Description">{{ $destination->description }}</textarea>
            <label for="floatingPassword">Description</label>
        </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Location" name="location" value="{{ $destination->location }}">
        <label for="floatingInput">Lokasi</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Jumat" name="working_days" value="{{ $destination->working_days }}">
        <label for="floatingInput">Hari Operasional</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="08:00 - 18:00" name="working_hours" value="{{ $destination->working_hours }}">
        <label for="floatingInput">Jam Operasional</label>
        
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" placeholder="50000" name="ticket_price" value="{{ $destination->ticket_price }}">
        <label for="floatingInput">Harga Tiket</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection