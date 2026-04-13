@extends('master')

@section('content')

<form action="/users" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="User Name" name="name">
        <label for="name">Nama User</label>
    </div>
    <div class="form-floating mb-3">  
        <input type="email" class="form-control" id="floatingInput" placeholder="user@example.com" name="email">
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3 width-50">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="password">Password</label>
    </div>
     <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="password_confirmation">
        <label for="password_confirmation">Confirm Password</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection