<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function viewSignUp() {
    //     return view ('signup');
    // }
    public function loginPage() {
        return view('welcome');
    }

    public function login(Request $request){
        $request->validate([
             'email' => 'required',
             'password' => 'required',
         ]);
        //  $cridentials = $request->only('email','password');
         dd("berhasil login");
        //  // dd(Auth::attempt($cridentials));
        //  if(Auth::attempt($cridentials)){
        //      // dd("salah");
        //      return redirect()->route('dashboardAdmin')->withSuccess('Signed in');
        //  }
        //  return redirect('login')->withErrors('Login details are not valid');
     }
}
