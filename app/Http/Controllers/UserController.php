<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view ('welcome');
    }

    public function reservasi(){
        return view ('reservasi');
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
