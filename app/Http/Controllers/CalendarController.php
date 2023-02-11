<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'lantai', 'ruangan', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('full-calendar');
    }

	public function lantaiSatu(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('lantai', 'LIKE', 'Lantai 1')
                       ->get(['id', 'title', 'lantai', 'ruangan', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('full-calendar');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=> $request->title,
					'lantai'	=> $request->lantai,
					'ruangan'	=> $request->ruangan,
    				'start'		=> $request->start,
    				'end'		=> $request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
					'lantai'	=> $request->lantai,
					'ruangan'	=> $request->ruangan,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
