<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $table = 'categories';

    protected $fillable = [
       'name'
    ];

    // Relación uno a muchos
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
