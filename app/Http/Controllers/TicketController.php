<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristAttraction;
use App\Models\Ticket;
use App\Models\ProofOfPayment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class TicketController extends Controller
{
    public function addTicket($id, $pax){

        if(!Auth::check()){
            return redirect('login');
        }
        

        $tourist_attractions = TouristAttraction::find($id);

        
        
        return view('addTicket' ,['tourist_attractions' => $tourist_attractions, 'pax' => $pax, 'edited' => false]);
    }

    public function createOrder(Request $request, $id, $pax){
        

        // $validatedData = $request->validate([
        //     'name' => ['required'],
        //     'phone_number' => ['required','numeric'],
        //     'email' => ['required']
        // ]);
        $rules = [
            'name.*' => 'required|string|max:255',
            'email.*' => 'required|email|max:255',
            'phone.*' => 'required|numeric|max:20',
            'tanggal-pemesanan.*' => 'required|date|after_or_equal:today',
        ];
    
        $messages = [
            'name.*.required' => 'The name field is required.',
            'email.*.required' => 'The email field is required.',
            'phone.*.required' => 'The phone field is required.',
            'tanggal-pemesanan.*.required' => "Date is required"
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $uuid = Str::random(10);

        $tourist_attractions = TouristAttraction::find($id);

        ProofOfPayment::create([
            'uuid' => $uuid,
            'price' => $tourist_attractions -> ticket * $pax
        ]);

        $pop_id = DB::table('proof_of_payments')->where('uuid', $uuid)->value('id'); 

        $tiket = $request -> all();
        
         foreach ($tiket['name'] as $key => $value) {
            $str = Str::random(10);
            Ticket::create([
                'tourist_attraction_id' => $id,
                'user_id' =>  Auth::user()->id,
                'uuid' => $str,
                'name' => $value,
                'email' => $tiket['email'][$key],
                'phone_number' => $tiket['phone_number'][$key],
                'tanggal_pemesanan' =>  $request -> input('tanggal-pemesanan'),
                'proof_of_payment_id' => $pop_id
            ]);}
        return redirect('pesan-tiket/'.$id.'/'.$pax.'/'.$uuid);

        
    }

    public function orderDetail($id, $pax, $code){
        $pop_id = DB::table('proof_of_payments')->where('uuid', $code) -> get(); 
        
        $tourist_attractions = TouristAttraction::find($id);

        $pax_order= DB::table('tickets')->where('proof_of_payment_id', $pop_id[0] -> id) -> get();  
        return view('orderDetail', ['id' => $id, 'pax' => $pax, 'code' => $code, 'pop_id' => $pop_id, 'pax_order' => $pax_order, 'tourist_attractions' => $tourist_attractions]);
    }

    public function editTicket($id, $pax, $code){

        $pop_id = DB::table('proof_of_payments')->where('uuid', $code) -> get(); 
        
        $tourist_attractions = TouristAttraction::find($id);

        $pax_order= DB::table('tickets')->where('proof_of_payment_id', $pop_id[0] -> id) -> get();
        


        return view('addTicket' ,['id' => $id, 'pax' => $pax, 'code' => $code, 'pop_id' => $pop_id, 'pax_order' => $pax_order, 'tourist_attractions' => $tourist_attractions, 'edited' => true]);
    }

    public function actionEditTicket(Request $request,$id, $pax, $code){

        $rules = [
            'name.*' => 'required|string|max:255',
            'email.*' => 'required|email|max:255',
            'phone.*' => 'required|numeric|max:20',
        ];
    
        $messages = [
            'name.*.required' => 'The name field is required.',
            'email.*.required' => 'The email field is required.',
            'phone.*.required' => 'The phone field is required.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $pop_id = DB::table('proof_of_payments')->where('uuid', $code) -> get(); 
        $ticket = DB::table('tickets')
        ->where('proof_of_payment_id', $pop_id[0] -> id)
        ->get();
        $tiketreq = $request->all();
        $names = $tiketreq['name'];
        $email = $tiketreq['email'];
        $phone = $tiketreq['phone_number'];

        for ($i = 0; $i < $pax; $i++) {
            DB::table('tickets')
            ->where('uuid', $ticket[$i] -> uuid)
            ->update([
                'name' => $names[$i],
                'email' => $email[$i],
                'phone_number' => $phone[$i],
            ]);
        }

        return redirect('pesan-tiket/'.$id.'/'.$pax.'/'.$code);

    }

    public function viewTiketByUser(){
        
        $tickets =  Ticket::with(['touristAttraction','proofOfPayment']) -> where('user_id', Auth::user()->id) ->get();

        if ($tickets) {
            $tickets = $tickets->map(function ($ticket) {
                $ticket -> pax =  DB::table('tickets') ->where('proof_of_payment_id', $ticket -> proofOfPayment -> id) -> get() -> count(); // menambahkan field baru bernama 'new_field' dengan nilai 'New value'
                $ticket->touristAttraction->new_field = 'New value for attraction'; // menambahkan field baru pada objek relasi 'touristAttraction'
                return $ticket;
            });
        } else {
            $tickets = false;
        }
        return view('viewTiketByUser', ['tickets' => $tickets]);
    }


}
