<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

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
        return view('DetailReservasi', ['reservasis'=>$data]);
    }

    public function terima(Request $request)
    {    
        $request->validate([
            'status' => 'required',
        ]);
        reservasi::where('reservationid', $request->reservationid)->update([
            'status' => $request['status'],
        ]);

        return redirect()->route('list-reservasi')->with('Sukses!','Reservasi telah diubah');
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
