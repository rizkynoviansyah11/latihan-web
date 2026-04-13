<?php

use App\Models\Destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;

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
    return view( view: 'pages.destinasi', data: compact('destinasi'));
});

Route::get("/destinations", [DestinationController::class, 'index']);

Route::get("/detaildestinasi/{id}", [DestinationController::class, 'show']);

Route::get("/destinations/create", [DestinationController::class, 'create']);
Route::post("/destinations", [DestinationController::class, 'store']);

Route::delete('/destinations/{id}', [DestinationController::class, 'delete']);

Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit']);
Route::put('/destinations/{id}/update', [DestinationController::class, 'update']);



Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);

Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'delete']);

Route::get('/user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::put('/user/{id}/update', [App\Http\Controllers\UserController::class, 'update']);




