@extends('master')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Atraction Baru</h4>
                </div>
                    <form action="{{ route('atractions.store') }}" method="POST" class="form-floating">
                        <div class="card-body p-4">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Atraction Name" name="name">
                            <label for="name">Nama Atraction</label>
                        </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" id=""  placeholder="Description"></textarea>
                                <label for="floatingPassword">Description</label>
                            </div>
                            
                        
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection