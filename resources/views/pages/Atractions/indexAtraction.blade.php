@extends('master')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mt-3">
        <h1>Daftar Atraction</h1>
       <form action="{{ route('atractions.index') }}" method="GET">
        <div class="input-group mb-4 pt-2">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search')}}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
    </form>
    </div>
    
    
    <table class="table table-striped-columns border  solid-black mt-4">
        <thead class="table-dark">
            <tr>
               <th>ID</th>
               <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atractions as $atraction)
                <tr>
                    
                    <td>{{ $atraction->id }}</td>
                    <td>{{ $atraction->name }}</td>
                    <td>{{ $atraction->description }}</td>
                    <td>
                        <div class="btn-group" role="group">
                        <a href="{{ route('atractions.edit', $atraction->id) }}" class="btn btn-sm btn-primary">✏️</a>
                        <a href="{{ route('atractions.show', $atraction->id) }}" class="btn btn-sm btn-info">👁️</a>
                        <form action="{{ route('atractions.delete', $atraction->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Kamu yakin mau menghapus?')">🗑️</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('atractions.create') }}" class="btn btn-primary">Tambah Atraction</a>
        <div class="mt-3 d-flex justify-content-center">
            {{ $atractions->links('pagination::bootstrap-5') }}
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