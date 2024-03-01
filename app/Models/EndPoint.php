<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndPoint extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relación de uno a uno
    public function contentendpiont(){
        return $this->hasOne(ContentEndPoint::class);
    }

    //Relación de uno a muchos inversa
    public function method(){
        return $this->belongsTo(Method::class);
    }
}
