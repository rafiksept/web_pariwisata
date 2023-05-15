<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable =['tourist_attraction_id','title','slug','content','is_published','image_post'];
    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function touristAttraction(){
        return $this->belongsTo(TouristAttraction::class);
    }

}
