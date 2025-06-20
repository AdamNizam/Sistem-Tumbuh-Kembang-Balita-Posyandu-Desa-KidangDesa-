<?php

use Illuminate\Support\Facades\Route;
use App\Models\Balita;

Route::get('/', function () {
    $totalBalita = Balita::count();
    $jumlahLaki = Balita::where('jenis_kelamin', 'Laki-laki')->count();
    $jumlahPerempuan = Balita::where('jenis_kelamin', 'Perempuan')->count();

    return view('home', compact('totalBalita', 'jumlahLaki', 'jumlahPerempuan'));
});
