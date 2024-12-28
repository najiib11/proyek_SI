<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;
Route::get('/', function () {
    return view('welcome');
});

Route::controller(PosyanduController::class)->group(
    function(){
        Route::get("Pendaftaran", "viewPendaftaran")->name("view.pendaftaran");
        Route::post("pendaftaran/proses", "prosesPendaftaran")->name("proses.pendaftaran");
        Route::get("Pemeriksaan", "viewPemeriksaan")->name("view.pemeriksaan");
        Route::get("imunisasi", "viewImunisasi")->name("view.imunisasi");
        Route::get("KSB", "viewKSB")->name("view.ksb");
        Route::get("home", "viewHome")->name("view.home");
        Route::get("Pendaftaran/cabut", "logout")->name("cabut.data");
    }
);


