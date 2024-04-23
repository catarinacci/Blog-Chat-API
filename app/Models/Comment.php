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

    public function reactionms()
    {
        return $this->morphMany(Reactionm::class, 'reactionmable');
    }


    // Relación muchos a uno
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    // Relación de uno a muchos
    public function responses()
    {
        return $this->hasMany(Comment::class);
    }
}
