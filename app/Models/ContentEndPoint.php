<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentEndPoint extends Model
{
    use HasFactory;

    //Relación de uno a uno

    public function endpoint(){
        return $this->hasOne(EndPoint::class);
    }
}
