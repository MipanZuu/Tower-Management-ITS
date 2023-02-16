<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Petunjuk;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

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

    public function jadwal(){
        $events = array();
        $schedule = Event::all();
        foreach($schedule as $schedules){
            $events[] =[
                'title' => $schedules->title,
                'lantai' => $schedules->lantai,
                'ruangan' => $schedules->ruangan,
                'start' => $schedules->start,
                'end' => $schedules->end,
                
            ];
        }
        // if($request->ajax())
    	// {
    	// 	$data = Event::whereDate('start', '>=', $request->start)
        //                ->whereDate('end',   '<=', $request->end)
        //                ->get(['id', 'title', 'lantai', 'ruangan', 'start', 'end']);
        //     return response()->json($data);
    	// }
        return view ('jadwal',['event' => $events]);
    }
    public function kelasSatu(Request $request) 
	{
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('kelas', 'LIKE', $request->kelas)
                       ->get(['id', 'title', 'lantai', 'ruangan', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('jadwal');
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

        $resValidator = Event::query()
        ->where('lantai', $request->floornum)
        ->where('ruangan', $request->roomname)
        ->get(['start', 'end']);

        $start = Carbon::parse($request->reservationstart)->format('Y-m-d H:i:s');
        $end = Carbon::parse($request->reservationend)->format('Y-m-d H:i:s');

        foreach ($resValidator as $validator) {
            if($validator->start <= $start && $start <= $validator->end){
                return Redirect::back()->withErrors(['msg' => 'Ruang kelas sudah direservasi untuk waktu tersebut!']);
            }

            if($validator->start <= $end && $end <= $validator->end){
                return Redirect::back()->withErrors(['msg' => 'Ruang kelas sudah direservasi untuk waktu tersebut!']);
            }

            if($start <= $validator->start && $validator->end <= $end){
                return Redirect::back()->withErrors(['msg' => 'Ruang kelas sudah direservasi untuk waktu tersebut!']);
            }
        }

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
  
        return redirect()->route('confirmed');
    }

    public function confirm(){
        return view ('confirmed');
    }

    public function status(Request $request){
        $data = Reservasi::where([
            ['reservationid', '!=', NULL]
        ])->where(function($query) use ($request){
            $query->where('fullname', 'LIKE', '%' . $request->term . '%');
        })->orderBy('reservationid', 'desc')->paginate(10);
        return view('status', ['reservasis'=>$data]);
    }
}
