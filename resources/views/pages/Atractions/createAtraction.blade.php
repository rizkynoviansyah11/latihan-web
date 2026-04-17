@extends('master')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                         <div class="form-floating mb-3 width-50">
                            <label for="destination_id" class="form-label  pt-1">Destination</label>
                            <select name="destination_id" id="destination_id" class="form-select @error ('destination_id') is-invalid @enderror" required>
                                <option value="">Select Destination</option>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}" {{ old('destination_id') == 
                                    $destination->id ? 'selected' : ''}}>
                                    {{ $destination-> name }}
                                </option>
                                @endforeach
                                @error('destination_id')
                                        <div class="invalid-feedback d-block">{{ $message}}</div>
                                    @enderror
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name')
                                is-invalid @enderror" id="floatingInput" placeholder="Atraction Name" name="name"  value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <label for="name">Nama Atraction</label>
                        </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id=""  placeholder="Description" required>{{ old('description') }}</textarea>
                                <label for="floatingPassword">Description</label>
                            </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection