@extends('master')

@section('content')


    <div class="container my-5">
        <h1>{{ $destination->name }}</h1>
        <h6>Deskripsi</h6>
        <p>{{ $destination->description }}</p>
        <p><h6>Lokasi :</h6>{{ $destination->location }}</p>
        <p><h6>Hari Buka :</h6>{{ $destination->working_days }}</p>
        <p><h6>Jam Buka :</h6> {{ $destination->working_hours }}</p>
        <p><h6>Harga Tiket :</h6> {{ $destination->ticket_price }}</p>
    </div>
@endsection