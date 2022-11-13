<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\FormatTime;
use App\Models\User;
use App\Models\TypeReaction;
use Illuminate\Support\Facades\Auth;
class NoteResource extends JsonResource
{
    public function toArray($request)
    {
        if($this->comments->count()){

            $comments_array = $this->comments;

            foreach ($comments_array as $comment){
                $comments[] = [
                    'usuario' => $comment->user->name,
                    'user_id' => $comment->user_id,
                    'comentario' => $comment->content,
                    'id' => $comment->id
                ];
            }
        }else{
            $comments = 'No tiene comentarios';
        }


        if ($this->reactions->count()) {
            $reactions_array = $this->reactions;
            foreach ($reactions_array as $reaction){
                $reactions[] = [
                    'id' => $reaction->id,
                    'usuario' => $reaction->user->name,
                    'user_id' => $reaction->user_id,
                    'reaction' => $reaction->typereaction->name,
                    'typereaction_id' => $reaction->typereaction_id
                ];
            }
        }else{
            $reactions = 'No tiene reacciones';
        }

        if($this->status == 1 || $this->status == null){
            $status = 'ACTIVE';
        } else{
            $status = 'LOCKED';
        }

        $time = FormatTime::LongTimeFilter($this->created_at);
        // $this->user_id = Auth::user()->id;
        return[
            'id'=> $this->id,
            'creador de la nota'=> $this->user->name,
            'email' => $this->user->email,
            'user_id'=> "/api/user/".$this->user_id,
            'title' => $this->title,
            'content'=> $this->content,
            'image_note_path' => $this->image_note_path,
            'comentarios '.$this->comments->count() => $comments,
            'reacciones '.$this->reactions->count() => $reactions,
            'updated_at' => $this->updated_at,
            'nota creada '=> $time,
            'status' => $status
        ];

    }
}
