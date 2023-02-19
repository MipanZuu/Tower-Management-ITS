<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ruangan;
use Carbon\Carbon;

class RuanganController extends Controller
{
    public function index() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all();
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->get(['ruangan', 'lantai']);

        return view('admin.ruanganIndex', compact('ruangans', 'events'));
    }
}