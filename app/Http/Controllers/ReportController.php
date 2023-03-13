<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;
use App\Models\Ruangan;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('F');
        // dd($now);
        $ruangans = Ruangan::all();
        $categories = [];
        $datas = [];

        foreach($ruangans as $ru){
            $categories[] = $ru->roomname;
        }

        // dd($categories);
        // $data[] = Ruangan::query()->select(
        //     DB::raw('count(reservasis.reservationid) as jres')
        // )->leftJoin('reservasis','reservasis.roomname','ruangans.roomname')
        // ->groupBy('reservasis.roomname')
        // ->orderBy('ruangans.roomname', 'ASC')
        // ->get();
        $coba = Ruangan::query()->select('ruangans.roomname',
        DB::raw('COUNT(case when Year(reservationstart) = Year(curdate()) AND MONTH(reservationstart) = MONTH(curdate()) then 1 else null end) as jres'))
        // ->whereYear('reservasis.reservationstart', Carbon::now()->year)
        // ->whereMonth('reservasis.reservationstart', Carbon::now()->month)
        ->leftJoin('reservasis','reservasis.roomname','ruangans.roomname')
        ->groupBy('reservasis.roomname')
        ->orderBy('ruangans.roomname', 'ASC')
        ->get();

    foreach($coba as $co){
        $datas[] = $co->jres;
    }

        // dd($datas);

        return view('admin.reportPage', compact('categories', 'datas','now'));
    }
}
