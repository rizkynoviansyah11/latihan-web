@extends('master')

@section('content')
    <div class="container my-5">
        <h1>{{ $user->name }}</h1>
        <p><h6>Email :</h6>{{ $user->email }}</p>
    </div>
@endsection