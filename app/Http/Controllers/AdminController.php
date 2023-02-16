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
                
                return view('admin.dashboardAdmin',  compact('events','reservasis', 'ruangans', 'reservasisTerima', 'reservasisTolak', 'reservasisPending', 'ruanganss', 'eventss'));
            }
        }
        return redirect('admin.login');
    }

    // public function viewSignUp() {
    //     return view ('signup');
    // }
    public function loginPage() {
        return view('admin.login');
    }
    public function testingMap() {
        return view('testingMapReserve');
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
         return redirect('admin.login')->withErrors('Login details are not valid');
     }

     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function uploadpetunjuk()
    {
        return view('admin.uploadPetunjuk');
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
        return view('admin.uploadJadwal');
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
     
}
