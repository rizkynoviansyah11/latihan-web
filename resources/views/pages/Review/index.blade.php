@extends('master')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mt-3">
        <h1>Bagian Review</h1>
       <form action="{{ route('reviews.index') }}" method="GET">
        <div class="input-group mb-4 pt-2">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search')}}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
    </form>
    </div>
    
    
    <table class="table table-striped-columns border  solid-black mt-4">
        <thead class="table-dark">
            <tr>
               <th>NO</th>
               <th>Atraksi</th>
               <th>Nama</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->Atraction->name}}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->comment}}</td>
            
                    
                    <td>
                        <div class="btn-group" role="group">
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">✏️</a>
                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm btn-info">👁️</a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
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
    <a href="{{ route('reviews.create') }}" class="btn btn-primary">Tambah Review</a>
        <div class="mt-3 d-flex justify-content-center">
            {{ $reviews->links('pagination::bootstrap-5') }}
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