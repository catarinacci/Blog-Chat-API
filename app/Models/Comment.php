<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'user_id',
        'note_id',
        'status'
    ];

    use HasFactory;

    // Relación muchos a uno
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function note(){
        return $this->belongsTo(Note::class);
    }

    // Relación uno a muchos
    public function reactions(){
        return $this->hasMany(Reaction::class);
    }
    // Relación polimórfica uno a mucho

    public function reactionmorph(){

        return $this->morphToMany(ReactionMorph::class,'reactionmorphable');
    }
}
