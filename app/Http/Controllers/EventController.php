<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = \App\Models\Activity::orderBy('datetime', 'desc')->paginate(6);
        $data = array(
            'events' => $events,
        );
        return view('event', $data);
    }

    public function show(Activity $event)
    {
        $events = Activity::query()->orderBy('datetime', 'desc')->limit(3)->get();
        return view('event-detail', compact('event', 'events'));
    }
}
