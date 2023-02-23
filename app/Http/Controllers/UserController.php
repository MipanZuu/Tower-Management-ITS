<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Petunjuk;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ruangan;

class UserController extends Controller
{
    public function home(){
        return view ('welcome');
    }

    public function staffDisplay(){
        return view ('user.staffdisplay');
    }

    public function panduan(){
        $petunjuk = Petunjuk::orderBy('id', 'desc')->first();
        return view ('user.panduan',['petunjuk' => $petunjuk]);
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
        return view ('user.jadwal',['event' => $events]);
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
    	return view('user.jadwal');
    }

    public function status(Request $request){
        $data = Reservasi::where([
            ['reservationid', '!=', NULL]
        ])->where(function($query) use ($request){
            $query->where('fullname', 'LIKE', '%' . $request->term . '%');
        })->orderBy('reservationid', 'desc')->paginate(10);
        return view('user.status', ['reservasis'=>$data]);
    }
}
