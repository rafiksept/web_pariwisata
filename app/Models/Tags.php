<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable =['name','slug'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($tags) { // before delete() method call this
             $tags->posts()->detach();
        });
    }
}
