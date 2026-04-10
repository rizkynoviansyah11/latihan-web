@extends('master')

@section('content')

<div class="container">
    
    <table class="table table-striped-columns">
        <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Description</th>
               <th>Location</th>
               <th>Working Days</th>
                <th>Working Hours</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($destinations as $d)
            <tr>
                <td><a href="detaildestinasi/{{$d->id}}">{{ $d->id }}</a></td>
                
                
                <td>{{ $d->name }}</td>
                <td>{{ $d->description }}</td>
                <td>{{ $d->location }}</td>
                <td>{{ $d->working_days }}</td>
                <td>{{ $d->working_hours }}</td>
                <td>{{ $d->ticket_price }}</td>
                <td>
                    <a href="/destinations/{{ $d->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/destinations/{{ $d->id}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Kamu Yakin Ingin Menghapus {{ $d->name }}?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/destinations/create" class="btn btn-success">Tambah Destinasi</a>
</div>

@endsection