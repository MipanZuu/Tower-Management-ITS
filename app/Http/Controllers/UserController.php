<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservasi;
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
            'reservationdate'=> 'required|date' ,
            'reservationstart' => 'required',
            'reservationend' => 'required',
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
        ]);
  
        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validatedData);
        $request->session()->put('reservasi', $reservasi);

        
        $reservasi->save();
  
        $request->session()->forget('reservasi');
  
        return redirect()->route('home');
    }


}
