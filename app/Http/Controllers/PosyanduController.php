<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\DataPendaftaran;
class PosyanduController extends Controller
{

    function viewHome(){
        return view("content-home", ['title' => 'home']);
    }
    function viewPendaftaran(){
        return view("pendaftaran", ['title' => 'Pendaftaran']);
    }
    function prosesPendaftaran(Request $request){
        $validator = Validator::make([
            "name" => $request->name,
            "gender" => $request->gender,
            "alamat" => $request->alamat,
        ], [
                "name" => "required|min:3|max:60",
                "gender" => "required|min:3|max:20",
                "alamat" => "required|min:3|max:20", 
        ],
        [
            "name.required" => "Nama tidak boleh kosong",
            "gender.required" => "Gender tidak boleh kosong",
            "alamat.required" => "Alamat tidak boleh kosong",
            "name.max:60" => "Nama melebihi batas 60 karakter",
            "gender.max:20" => "Gender melebihi batas 20 karakter",
            "alamat.max:60" => "Alamat melebihi batas 60 karakter",
            "name.min:3" => "Nama lebih harus 3 karakter",
            "gender.min:3" => "Gender lebih harus 3 karakter",
            "alamat.min:3" => "Alamat lebih harus 3 karakter",
            
            
        ])->validate();

        $database = DataPendaftaran::create($validator);
        Auth::shouldUse("pendaftaran");
        Auth::guard("pendaftaran")->login($database);
        if(Auth::guard("pendaftaran")->check())
        {
            return redirect()->route("view.home")->with([
                "success" => "Terima kasih telah mendaftar ke instansi posyandu ini"
            ]);
        }
        Auth::guard("pendaftaran")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("view.home")->with([
            "failure" => "Gagal mendaftar",
        ]);


    }
    function viewImunisasi(){
        
    }
    function viewPemeriksaan(){

    }
    function viewKsb(){

    }

    function logout(Request $request){ 
        Auth::guard("pendaftaran")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("view.home")->with([
            "logout" => "Berhasil mencabut data pendaftaran",
        ]);
    }
}
