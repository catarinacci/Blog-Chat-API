<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }

     // relación uno a uno a través de 
     public function posts()
     {
         return $this->hasManyThrough(Note::class, User::class);
     }
}
