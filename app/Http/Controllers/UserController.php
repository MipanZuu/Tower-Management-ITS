<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservasi;

class UserController extends Controller
{
    public function home(){
        return view ('welcome');
    }

    public function reservasi(Request $request){
        $reservasi = $request->session()->get('reservasi');
        return view ('reservasi',compact('reservasi'));
    }


    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:100',
            'reserverid' => 'required',
            'contactnumber' => 'required|max:12',
            'email' => 'required|email',
        ]);
  
        if(empty($request->session()->get('reservasi'))){
            $reservasi = new reservasi();
            $reservasi->fill($validatedData);
            $request->session()->put('reservasi', $reservasi);
        }else{
            $reservasi = $request->session()->get('reservasi');
            $reservasi->fill($validatedData);
            $request->session()->put('reservasi', $reservasi);
        }
  
        return redirect()->route('penanggungJawab');
    }

    public function penanggungJawab(){
        return view ('InformasiPenanggungJawab');
    }

    public function detailPeminjaman(){
        return view ('detailPeminjaman');
    }

    public function detailKegiatan(){
        return view ('detailKegiatan');
    }
}
