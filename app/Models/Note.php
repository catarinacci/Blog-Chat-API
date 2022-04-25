<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Comment;
// use App\Models\Like;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image'
    ];

    // Relación uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // Relación uno a muchos
    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    // Relación muchos a uno
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    use HasFactory;
}
