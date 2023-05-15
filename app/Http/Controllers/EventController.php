<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EventController extends Controller
{
    public function viewEvent(){

        $events = DB::table('events')->paginate(9);

        return view('eventList', ['events' => $events]);
    }

    public function detailEvent($id){
        $events = Event::find($id);

        return view('detailEvent' ,['events' => $events]);


    }
}
