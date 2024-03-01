<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relación de uno a muchos
    public function endpionts(){
        return $this->hasMany(EndPoint::class);
    }

    //Relación uno a muchos inversa

    public function module(){
        return $this->belongsTo(Module::class);
    }

}
