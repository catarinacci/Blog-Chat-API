<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactionMorph extends Model
{
    use HasFactory;

    protected $table = 'reaction_morphs';
    //protected $guarded = [];
    protected $fillable = [
        'mensaje',
        'reactionmorphsable_id',
        'reactionmorphsable_type'
    ];
    //Ralación polifmorfica
    public function reactionmorphable(){
        return $this->morphTo();
    }

    //Relación uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

}
