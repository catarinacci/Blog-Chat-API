<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Notifications\Notifiable;

class Reactionm extends Model
{
    use HasFactory;


    protected $table = 'reactionms';

    protected $fillable = [
        'typereaction_id',
        'reactionmable_id',
        'reactionmable_type',
        'user_id',
        'status'
    ];

    protected $guarded = [];

    //relación polimórfica
    public function reactionmable(): MorphTo
    {
        return $this->morphTo();
    }
    
    // Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

}
