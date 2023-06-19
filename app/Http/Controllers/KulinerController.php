<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kuliner;

class KulinerController extends Controller
{
    public function viewKuliner(){

        $kuliners = DB::table('kuliners')->paginate(9);

        return view('kulinerList', ['kuliners' => $kuliners]);
    }


    public function detailKuliner($id){
        $kuliners = Kuliner::find($id);

        return view('detailKuliner' ,['kuliners' => $kuliners]);


    }
}
