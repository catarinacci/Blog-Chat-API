<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactionm extends Model
{
    use HasFactory;

    protected $table = 'reactionms';

    protected $fillable = [
        'mensaje',
        'reactionmable_id',
        'reactionmable_type',
        'user_id',
        'status'
    ];

    //relación polimórfica
    public function reactionmable(){
        return $this->morphTo();
    }
    // Relación uno a muchos inversa
    public function user(){
        $this->belongsTo(User::class);
    }

}
