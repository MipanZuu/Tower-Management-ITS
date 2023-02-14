<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Petunjuk;
use Illuminate\Console\View\Components\Alert;

class AdminController extends Controller
{
    // public function viewSignUp() {
    //     return view ('signup');
    // }
    public function loginPage() {
        return view('login');
    }

    public function listReservasi(Request $request) {
        $data = reservasi::where([
            ['reservationid', '!=', NULL]
        ])->where(function($query) use ($request){
            $query->where('fullname', 'LIKE', '%' . $request->term . '%');
        })->orderBy('reservationid', 'asc')->paginate(10);
        return view('list-reservasi', ['reservasis'=>$data]);
    }

    public function DetailReservasi($id) {
        $data = reservasi::where('reservationid','=',$id)->first();
        $date = Carbon::parse($data->reservationstart)->format('l, j F Y');
        $timestart = Carbon::parse($data->reservationstart)->format('H:i');
        $timeend = Carbon::parse($data->reservationend)->format('H:i');
        return view('DetailReservasi', ['reservasis'=>$data,'date'=>$date,'timestart'=>$timestart,'timeend'=>$timeend]);
    }

    public function terima(Request $request)
    {    
        $request->validate([
            'status' => 'required',
            'roomname' => 'required',
            'eventname' => 'required',
            'floornum' => 'required',
            'reservationstart' => 'required',
            'reservationend' => 'required',
        ]);
        reservasi::where('reservationid', $request->reservationid)->update([
            'status' => $request['status'],
        ]);
        if ($request['status']==2) {
            Event::create([
                'title'		=> $request['eventname'],
                'lantai'	=> $request['floornum'],
                'ruangan'	=> $request['roomname'],
                'start'     => $request['reservationstart'],
                'end'     => $request['reservationend'],
            ]);
        }

        return redirect()->route('list-reservasi')->with('Sukses!','Reservasi telah diubah');
    }

    public function uploadpetunjuk()
    {
        return view('upload-petunjuk');
    }
    public function uploadpdf(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf|max:4096'
            ]);
            $request->file->store('petunjuk', 'public');
            $petunjuk = new Petunjuk([
                "file_path" => $request->file->hashName()
            ]);
            $petunjuk->save(); 
           
            
            return redirect()->back()->withSuccess('File succesfully uploaded');
        }
        else {
            return redirect()->back()->withErrors(['No file given']);
        }
    }

    public function viewPage() {
        return view ('view');
    }

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role == 'Admin'){
                
                return view('dashboardAdmin');
            }
        }
        return redirect('login');
    }

    public function login(Request $request){
        $request->validate([
             'email' => 'required',
             'password' => 'required',
         ]);
         $cridentials = $request->only('email','password');
        //  dd("berhasil login");
        //  dd(Auth::attempt($cridentials));
         if(Auth::attempt($cridentials)){
             // dd("salah");
             return redirect()->intended('admin')->withSuccess('Signed in');
         }
         return redirect('login')->withErrors('Login details are not valid');
     }

     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
     
}
