@extends('master')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mt-3">
        <h1>Daftar User</h1>
       <form action="/users" method="GET">
        <div class="input-group mb-4 pt-2">
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
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                        <form action="/user/{{ $user->id }}/delete" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/users/create" class="btn btn-primary">Tambah User</a>
        <div class="mt-3 d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-5') }}
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