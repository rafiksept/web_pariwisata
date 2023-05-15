<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Promo extends Model
{
    use HasFactory;

    protected $fillable =['tourist_attraction_id','kode_promo','name','diskon','minimal_promo', 'expired'];

    public function touristAttraction(){
        return $this->belongsTo(TouristAttraction::class);
    }
}
