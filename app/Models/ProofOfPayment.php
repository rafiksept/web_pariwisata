<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofOfPayment extends Model
{
    use HasFactory;

    protected $fillable =['uuid','image_post','price', 'is_verify'];
    protected $casts = [
        'is_verify' => 'boolean',
    ];

    protected static function booted()
    {
        static::updated(function ($parent) {
            if ($parent->is_verify == true) {
                $parent->Tickets()->update(['is_verify' => true]);
            } else {
                $parent->Tickets()->update(['is_verify' => false]);
            }
        });
    }

    public function Tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
