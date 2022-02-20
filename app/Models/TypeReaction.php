<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reaction;

class TypeReaction extends Model
{

    protected $table = 'typereactions';

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    // public function reaction() {
    //     return $this->hasOne(Reaction::class);
    //   }
}
