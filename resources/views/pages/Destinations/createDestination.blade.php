@extends('master')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Destinasi Baru</h4>
                </div>
                <form action="{{ route('destinations.store') }}" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        
                        <div class="form-floating mb-2 width-50">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name">
                            <label for="name">Nama Destinasi</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea name="description" class="form-control" id=""  placeholder="Description"></textarea>
                            <label for="floatingPassword">Description</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Location" name="location">
                            <label for="floatingInput">Lokasi</label>    
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Jumat" name="working_days">
                            <label for="floatingInput">Hari Operasional</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="08:00 - 18:00" name="working_hours">
                            <label for="floatingInput">Jam Operasional</label>
                            
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" id="floatingInput" placeholder="50000" name="ticket_price">
                            <label for="floatingInput">Harga Tiket</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection