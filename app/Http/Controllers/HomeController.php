<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristAttraction;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class HomeController extends Controller
{
    public function home(){
        $tourist_attraction = DB::table('tourist_attractions')->latest('updated_at')->take(3) -> get();
        $event = DB::table('events')->latest('updated_at')->take(3) -> get();
        $kuliners = DB::table('kuliners')->latest('updated_at')->take(3) -> get();
        return view('home', ['tourist_attractions' => $tourist_attraction, 'kuliners' => $kuliners ,'events' => $event]);
    }
}
