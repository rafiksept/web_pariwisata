<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatBotController extends Controller
{
    public function viewChatBot(){
        return view('chatBot');
    }

    public function getQuestion($jenis){
        $hasil = DB::table('questions')->where('tipe', $jenis)->get();

        return response([
            'success' => true,
            'message' => 'List Semua Pertanyaan',
            'pertanyaan' => $hasil
        ], 200);
    }
}
