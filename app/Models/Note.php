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
        'image_note_path',
        'status',
        'category_id'
    ];

    // Relación uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // Relación uno a muchos
    // public function reactions(){
    //     return $this->hasMany(Reaction::class);
    // }

    //relación de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class, 'note_tag', 'note_id', 'tag_id');
    }

    // Relación muchos a uno
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación muchos a uno
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Relación uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    // Relación polimórfica uno a mucho

    public function reactionms(){
        return $this->morphMany(Reactionm::class, 'reactionmable');
    }
    use HasFactory;
}
