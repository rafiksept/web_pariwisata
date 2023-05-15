<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristAttraction extends Model
{
    use HasFactory;

    protected $fillable =['name','location','definition','description','ticket','slug','image_post'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
