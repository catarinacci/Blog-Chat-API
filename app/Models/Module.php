<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable =['name', 'icon'];

    // Relación de uno a muchos
    public function methods(){
        return $this->hasMany(Method::class);
    }
}
