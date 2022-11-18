<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\FormatTime;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        $time = FormatTime::LongTimeFilter($this->created_at);
        return[
            "id" => $this->id,
            'user_id' => "/api/user/".$this->user_id,
            "name" => $this->user->name,
            'content' => $this->content,
            'note_id' => "/api/note/".$this->note_id,
            'created_at' => now(),
            'updated_at' => now(),
            'comentario creado '=> $time,

        ];
    }
}
