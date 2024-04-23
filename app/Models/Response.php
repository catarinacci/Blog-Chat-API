<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    // Relación muchos a uno
    public function comment()
    {
        return $this->belongsTo(User::class);
    }
}
