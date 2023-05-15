<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TouristAttraction;

class TouristAttractionController extends Controller
{
    public function viewTouristAttraction(){

        $tourist_attractions = DB::table('tourist_attractions')->paginate(9);

        return view('touristAttractionList', ['tourist_attractions' => $tourist_attractions]);
    }


    public function detailTouristAttraction($id){
        $tourist_attractions = TouristAttraction::find($id);

        return view('detailTouristAttraction' ,['tourist_attractions' => $tourist_attractions]);


    }
}
