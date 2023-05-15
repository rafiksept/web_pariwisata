<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristAttraction;
use App\Models\Ticket;
use App\Models\ProofOfPayment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProofOfPaymentController extends Controller
{
    public function createProofOfPayment(Request $request,$id, $pax, $code){

        $validatedData = $request->validate([
            'payment_number' => 'required|numeric',
            'type_payment' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $tourist_attractions = TouristAttraction::find($id);

        $imageName = time() . '.' . $request->image->extension();

        $path = $request->file('image')->storeAs('public', $imageName);

        $pop_id =  DB::table('proof_of_payments')->where('uuid', $code) -> get();
        $pax_order= DB::table('tickets')->where('proof_of_payment_id', $pop_id[0] -> id) -> get(); 
        $promo = DB::table('promos')->where('id', $pax_order[0] -> promo_id) -> get();

        if (count($promo) != 0 ){
            $kupon = $promo[0] -> diskon;
        } else {
            $kupon = 0;
        }
        DB::table('proof_of_payments')
            ->where('uuid', $code)
            ->update([
                'type_payment' => $request -> type_payment,
                'payment_number' => $request -> payment_number,
                'price' => $tourist_attractions -> ticket * $pax * (100 - $kupon) / 100,
                'image_post' => $imageName,

            
            ]);

            return redirect('pesan-tiket/'.$id.'/'.$pax.'/'.$code)->with([
                'success' => 'Bukti pembayaran berhasil dikirim'
            ]);
        
        
    

    }
}
