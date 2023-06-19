<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

   

    protected $fillable =['tourist_attraction_id','uuid','name','phone_number','email','tanggal_pemesanan' ,'proof_of_payment_id','is_verify','user_id'];
    protected $casts = [
        'is_verify' => 'boolean',
    ];

    public function touristAttraction(){
        return $this->belongsTo(TouristAttraction::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function proofOfPayment(){
        return $this -> belongsTo(ProofOfPayment::class);
    }

}
