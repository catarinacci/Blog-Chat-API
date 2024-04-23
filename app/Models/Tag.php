<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = [
        'name',
        'status'
    ];

    //relación muchos a muchos
    public function notes(){
        return $this->belongsToMany(Note::class, 'note_tag','tag_id','note_id')->withTimestamps();
    }
}
