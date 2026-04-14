@extends('master')
@section('content')
    <div class="container">
        <h1>{{ $atraction->name }}</h1>
        <p>{{ $atraction->description }}</p>
    </div>
@endsection