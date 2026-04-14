<?php

use App\Models\Destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtractionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get(uri: "/hello", action: function () {
    $name = "Rizky";
    $hobis = ["Membaca", "Menulis", "Coding"];
    return view( view: 'halo', data: compact('name', 'hobis'));
});
Route::get(uri: "/switch", action: function () {
    $role = "user";
    return view( view: 'switch', data: compact('role'));
});

Route::get(uri: "/home", action: function () {
    return view( view: 'pages.home');
});

Route::get(uri: "/about", action: function () {
    return view( view: 'pages.about');
});

Route::get(uri: "/destinasi", action: function () {
    $destinasi = [
        "Nama" => "Bali",
        "Harga" => 5000000,
        "Lokasi" => "denpasar, bali",
        "Durasi" => "5 hari 4 malam",
        "Transportasi" => "pesawat",
        "Hotel" => "hotel bintang 5",
        "Rating" => 4.9,
        "Fasilitas" => ["kolam renang", "Sarapan", "Tour guide", "Transportasi Lokal"],
    ];
    return view( view: 'pages.Destinations.destinasi', data: compact('destinasi'));
});
Route::prefix('destinations')->name('destinations.')->group(function () {
    Route::get('/', [DestinationController::class, 'index'])->name('index');
    Route::get('/create', [DestinationController::class, 'create'])->name('create');
    Route::post('/', [DestinationController::class, 'store'])->name('store');
    Route::delete('/{id}', [DestinationController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [DestinationController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [DestinationController::class, 'update'])->name('update');
    Route::get('/detaildestinasi/{id}', [DestinationController::class, 'show'])->name('show');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('/detailuser/{id}', [UserController::class, 'show'])->name('show');
});

Route::prefix('atractions')->name('atractions.')->group(function () {
    Route::get('/', [AtractionController::class, 'index'])->name('index');
    Route::get('/create', [AtractionController::class, 'create'])->name('create');
    Route::post('/', [AtractionController::class, 'store'])->name('store');
    Route::delete('/{id}', [AtractionController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [AtractionController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [AtractionController::class, 'update'])->name('update');
    Route::get('/detailatraction/{id}', [AtractionController::class, 'show'])->name('show');
});







