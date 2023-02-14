<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Petunjuk;

class UserController extends Controller
{
    public function home(){
        return view ('welcome');
    }

    public function staffDisplay(){
        return view ('staffdisplay');
    }

    public function reservasi(Request $request){
        $reservasi = $request->session()->get('reservasi');
        return view ('reservasi',compact('reservasi'));
    }

    public function panduan(){
        $petunjuk = Petunjuk::orderBy('id', 'desc')->first();
        return view ('panduan',['petunjuk' => $petunjuk]);
    }


    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:100',
            'reserverid' => 'required',
            'contactnumber' => 'required|max:12',
            'email' => 'required|email',
        ],
        [
            'fullname.required' => 'Nama tidak boleh kosong!',
            'reserverid.required' => 'NRP tidak boleh kosong!',
            'contactnumber.required' => 'Nomor telepon tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
        ]);
  
        if(empty($request->session()->get('reservasi'))){
            $reservasi = new Reservasi();
            $reservasi->fill($validatedData);
            $request->session()->put('reservasi', $reservasi);
        }else{
            $reservasi = $request->session()->get('reservasi');
            $reservasi->fill($validatedData);
            $request->session()->put('reservasi', $reservasi);
        }
  
        return redirect()->route('penanggungJawab');
    }

    public function penanggungJawab(Request $request){
        $reservasi = $request->session()->get('reservasi');
        return view ('InformasiPenanggungJawab',compact('reservasi'));
    }

    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'mainpicposition' => 'required',
            'mainpicname' => 'required',
            'secondpicposition' => 'required',
            'secondpicname' => 'required',
        ],
        [
            'mainpicposition.required' => 'Posisi PIC tidak boleh kosong!',
            'mainpicname.required' => 'Nama PIC tidak boleh kosong!',
            'secondpicposition.required' => 'Posisi tidak boleh kosong!',
            'secondpicname.required' => 'Nama PIC tidak boleh kosong!',
        ]);
  
        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validatedData);
        $request->session()->put('reservasi', $reservasi);
  
        return redirect()->route('detailPeminjaman');
    }

    public function detailPeminjaman(Request $request){
        $reservasi = $request->session()->get('reservasi');
        return view ('detailPeminjaman',compact('reservasi'));
    }

    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'floornum' => 'required',
            'roomname' => 'required',
            'reservationstart' => 'required',
            'reservationend' => 'required',
        ],
        [
            'floornum.required' => 'Lantai tidak boleh kosong!',
            'roomname.required' => 'Nama ruangan tidak boleh kosong!',
            'reservationstart.required' => 'Tanggal dan jam mulai tidak boleh kosong!',
            'reservationend.required' => 'Tanggal dan jam selesai tidak boleh kosong!',
        ]);
  
        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validatedData);
        $request->session()->put('reservasi', $reservasi);
  
        return redirect()->route('detailKegiatan');
    }

    public function detailKegiatan(Request $request){
        $reservasi = $request->session()->get('reservasi');
        return view ('detailKegiatan',compact('reservasi'));
    }

    public function postCreateStepFour(Request $request)
    {
        $validatedData = $request->validate([
            'organization' => 'required',
            'eventname' => 'required',
            'eventcategory' => 'required',
            'eventdescription'=> 'required',
        ],
        [
            'organization.required' => 'Nama organisasi tidak boleh kosong!',
            'eventname.required' => 'Nama event tidak boleh kosong!',
            'eventcategory.required' => 'Katagori kegiatan tidak boleh kosong!',
            'eventdescription.required' => 'Deskripsi Kegiatan tidak boleh kosong!',
        ]);
  
        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validatedData);
        $request->session()->put('reservasi', $reservasi);

        
        $reservasi->save();
  
        $request->session()->forget('reservasi');
  
        return redirect()->route('home');
    }


}
