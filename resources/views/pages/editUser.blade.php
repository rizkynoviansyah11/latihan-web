@extends('master')

@section('content')

<form action="/user/{{ $user->id }}/update" method="POST">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="User Name" name="name" value="{{ $user->name }}">
        <label for="name">Nama User</label>
    </div>
    <div class="form-floating mb-3">  
        <input type="email" class="form-control" id="floatingInput" placeholder="user@example.com" name="email" value="{{ $user->email }}">
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3 width-50">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <small>Biarkan kosong jika tidak ingin mengubah password</small>
        <label for="password">Password</label>
    </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="password_confirmation">
            <label for="password_confirmation">Confirm Password</label>
        </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection