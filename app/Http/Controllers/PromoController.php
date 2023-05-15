<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{

    public function viewPromo(){
        $promo = DB::table('promos')->latest('updated_at')->take(3) -> get();
        $tourist_attraction_promo =  Promo::with('touristAttraction')->get();

        return view('promoList', ['promos' => $promo, 'tourist_attraction_promos' => $tourist_attraction_promo]);
    }

    public function detailPromo($id){
        $promo = DB::table('promos')->where('id', $id) -> get();
        $tourist_attraction_promo =  DB::table('tourist_attractions')->where('id', $promo[0] -> id) -> get();

        return view('detailPromo', ['promos' => $promo, 'tourist_attraction_promos' => $tourist_attraction_promo]);
    }
    
}
