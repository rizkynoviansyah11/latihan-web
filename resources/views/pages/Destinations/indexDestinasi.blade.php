@extends('master')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mt-3">
        <h1>Daftar Destinasi</h1>
       <form action="{{ route('destinations.index') }}" method="GET">
        <div class="input-group mt-2">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search')}}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    </div>
    
    
    <table class="table table-striped-columns border  solid-black mt-4">
        <thead class="table-dark">
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
                <td><a href="{{ route('destinations.show', $d->id) }}">{{ $loop->iteration }}</a></td>
                
                
                <td>{{ $d->name }}</td>
                <td>{{ Str::limit($d->description, 100) }}</td>
                <td>{{ $d->location }}</td>
                <td>{{ $d->working_days }}</td>
                <td>{{ $d->working_hours }}</td>
                <td>{{ $d->ticket_price }}</td>
                <td>
                    <div class="btn-group" role="group">
                    <a href="{{ route('destinations.show', $d->id) }}" class="btn btn-info btn-sm text-white">👁️</a>
                    <a href="{{ route('destinations.edit', $d->id) }}" class="btn btn-warning btn-sm">✏️</a>
                    <form action="{{ route('destinations.delete', $d->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Kamu Yakin Ingin Menghapus {{ $d->name }}?')">🗑️</button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('destinations.create') }}" class="btn btn-success">Tambah Destinasi</a>
    <div class="mt-3 d-flex justify-content-center">
        {{ $destinations->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection

@push('scripts')
<script>
    class Alert {
        constructor(message) {
            this.message = message;
        }
        show() {
            alert(this.message);
        }
    }
    let alertElement = document.querySelector('.alert');
    if (alertElement) {
        setTimeout(() => {
            alertElement.style.transition = 'opacity 3s ease-out';
            alertElement.style.opacity = '0';
            setTimeout(() => {
                alertElement.remove();
            }, 3000);
        }, 0);
    }
</script>
@endpush
