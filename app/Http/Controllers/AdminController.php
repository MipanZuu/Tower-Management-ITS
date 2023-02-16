<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\uploadJadwal;
use App\Exports\uploadJadwalExport;
use App\Models\User;
use App\Models\Ruangan;
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
        $data = Reservasi::where([
            ['reservationid', '!=', NULL]
        ])->where(function($query) use ($request){
            $query->where('fullname', 'LIKE', '%' . $request->term . '%');
        })->orderBy('reservationid', 'desc')->paginate(10);
        return view('list-reservasi', ['reservasis'=>$data]);
    }

    public function DetailReservasi($id) {
        $data = Reservasi::where('reservationid','=',$id)->first();
        $date = Carbon::parse($data->reservationstart)->format('l, j F Y');
        $timestart = Carbon::parse($data->reservationstart)->format('H:i');
        $timeend = Carbon::parse($data->reservationend)->format('H:i');
        return view('DetailReservasi', ['reservasis'=>$data,'date'=>$date,'timestart'=>$timestart,'timeend'=>$timeend]);
    }

    public function terima(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'roomname' => 'required',
            'eventname' => 'required',
            'floornum' => 'required',
            'reservationstart' => 'required',
            'reservationend' => 'required',
        ]);
        Reservasi::where('reservationid', $id)->update([
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
           
            
            return redirect()->back()->with('success', 'petunjuk berhasil diunggah');
        }
        else {
            return redirect()->back()->with(['No file given']);
        }
    }

    public function uploadJadwal()
    {
        return view('upload-jadwal');
    }

    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new uploadJadwal, $request->file('file')->store('temp'));
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new uploadJadwalExport, 'report-list-reservasi.xlsx');
    }

    public function viewPage() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all();
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->get(['ruangan', 'lantai']);

        return view('view', compact('ruangans', 'events'));
    }

    public function index()
    {
        if(Auth::check()){
            $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
            $ruanganss = Ruangan::all();
            $eventss = Event::query()
            ->where('start', '<=', $now)
            ->where('end', '>=', $now)
            ->get(['ruangan', 'lantai']);
            $user = Auth::user();
            $events = Event::count();
            $ruangans = Ruangan::count();
            $reservasis = Reservasi::count();
            $reservasisTerima = Reservasi::where('status','=',2)->count();
            $reservasisPending = Reservasi::where('status','=',1)->count();
            $reservasisTolak = Reservasi::where('status','=',3)->count();
            if ($user->role == 'Admin'){
                
                return view('dashboardAdmin',  compact('events','reservasis', 'ruangans', 'reservasisTerima', 'reservasisTolak', 'reservasisPending', 'ruanganss', 'eventss'));
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
