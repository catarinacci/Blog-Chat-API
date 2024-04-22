<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Reactionm;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\FormatTime;
use App\Models\Note;
use App\Models\TypeReaction;
use Illuminate\Support\Facades\Auth;
class NoteResource extends JsonResource
{
    public function toArray($request)
    {

        $note = Note::where('id', $this->id)->first();
       
        $note_reactionms = $note->reactionms->load('user');

        $comments = Comment::where('note_id', $this->id)->get();

        $comments_user = $comments->load('user');

        $comments = array();
       
        foreach ($comments_user as $comment) {

            if(!$comment->reactionms->isEmpty()){

                $comment->reactionms->load('user')->first();

                array_push($comments, $comment );
                
            }else{
                
                array_push($comments, $comment);
            }        
        }

        if($this->status == 1 || $this->status == null){
            $status = 'ACTIVE';
        } else{
            $status = 'LOCKED';
        }

       // $reactions = $this->reactionms->user_id;
       
        $time = FormatTime::LongTimeFilter($this->created_at);
        $nota = Note::where('id', $this->id)->first();
        $tags= $nota->tags()->get();
        // $this->user_id = Auth::user()->id;
        return[
            'id'=> $this->id,
            'title' => $this->title,
            'content'=> $this->content,
            'image_note_path' => $this->image_note_path,
            'updated_at' => $this->updated_at,
            'nota creada '=> $time,
            'user'=> $this->user,
            'comentarios: ' => $comments,
            'reacctionms' => $note_reactionms,
            'tags' => $tags,
            'status' => $status,
            
        ];

    }
}
