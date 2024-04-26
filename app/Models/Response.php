<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Response extends Model
{
    use HasFactory;

    // Relación muchos a uno
    public function comment()
    {
        return $this->belongsTo(User::class);
    }

    // Relación polimórfica uno a mucho

    public function response(): MorphMany
    {
        return $this->morphMany(Reactionm::class, 'reactionmable');
    }
}
