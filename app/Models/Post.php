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

    public function tags(){
        return $this->belongsToMany(Tags::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($post) { // before delete() method call this
             $post->tags()->detach();
        });
    }

}
