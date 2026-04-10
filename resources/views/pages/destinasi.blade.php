@extends('master')
@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url('https://wallpapers.com/images/hd/bali-pictures-v9i6ywrbrsruq1al.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="position-absolute top-0 start-0 mt-3 ms-3">
            <ol class="breadcrumb bg-white bg-opacity-75 rounded-pill px-3 py-2 shadow-sm">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Destinasi</li>
            </ol>
        </nav>

        <div class="card mx-auto shadow-lg animate__animated animate__fadeInUp" style="max-width: 800px; background-color: rgba(255, 255, 255, 0.95); border-radius: 15px;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i>Detail Destinasi</h4>
            </div>
            <div class="card-body p-4">
                <h2 class="text-center mb-4 text-primary animate__animated animate__fadeInDown"><i class="bi bi-map me-2"></i>Bali</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center mb-0">
                        <tbody>
                            <tr>
                                <th scope="row" class="w-40 bg-light"><i class="bi bi-cash me-2"></i>Harga</th>
                                <td class="fw-bold text-success">{{ $destinasi['Harga'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light"><i class="bi bi-geo-alt me-2"></i>Lokasi</th>
                                <td>{{ $destinasi['Lokasi'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light"><i class="bi bi-clock me-2"></i>Durasi</th>
                                <td>{{ $destinasi['Durasi'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light"><i class="bi bi-car-front me-2"></i>Transportasi</th>
                                <td>{{ $destinasi['Transportasi'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light"><i class="bi bi-house me-2"></i>Hotel</th>
                                <td>{{ $destinasi['Hotel'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light"><i class="bi bi-star me-2"></i>Rating</th>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $destinasi['Rating'])
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                            @else
                                                <i class="bi bi-star text-muted me-1"></i>
                                            @endif
                                        @endfor
                                        <span class="ms-2 badge bg-success">{{ $destinasi['Rating'] }}/5</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light align-top"><i class="bi bi-list-check me-2"></i>Fasilitas</th>
                                <td class="text-start">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($destinasi['Fasilitas'] as $fasilitas)
                                            <li class="mb-1 animate__animated animate__fadeInLeft"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $fasilitas }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary btn-lg me-2 animate__animated animate__pulse animate__infinite"><i class="bi bi-cart-plus me-2"></i>Pesan Sekarang</button>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
