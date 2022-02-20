<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{

    protected $table = 'reactions';

    protected $fillable = [
        'user_id',
        'note_id',
        'typereaction_id'
    ];

    use HasFactory;

    // Relación muchos a uno
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function note(){
        return $this->belongsTo(Note::class);
    }

    // Relación de muchos a uno
    public function typereaction() {
        return $this->belongsTo(TypeReaction::class);
      }
}
