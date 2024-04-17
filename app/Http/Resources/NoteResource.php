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

        $reactions_note = Reactionm::where('reactionmable_id',$this->id)
        ->where('reactionmable_type', 'App\Model\Note')
        ->where('status', 1 )
        ->get();
        //return $reactions_note;

        $comments = Comment::where('note_id', $this->id)->get();

        $comment1 = array();
        $r = array();

        foreach($comments as $comment){

            $reactions_comment = Reactionm::where('reactionmable_id',$comment->id)
            ->where('reactionmable_type', 'App\Model\Comment')
            ->get();

            if(!$reactions_comment->isEmpty()){
                //return true;
                foreach($reactions_comment as $reaction){

                     array_push($r, [
                         'reaccion_comentario' => $reaction
                    ]);
                }

                array_push($comment1, [
                    'comment' => $comment, array('reaccion_comentario' => $r)
                ]);
                $r = [];
            }else{
                //return false;
                array_push($comment1, [
                    'comment' => $comment, array('reaccion_comentario' => null)
                ]);
            }

        }
        // return $comment1;

        //return $reactions_comment;
        // $comment1 = array();
        // foreach ($comments as $comment){
        //     foreach($reactions_comment as $c){
        //       $c = Reactionm::where('reactionmable_id', $comment->id)
        //       ->where('reactionmable_type', 'App\Model\Comment')
        //       ->where('status', 1 )
        //       ->get();
        //       $comment1 []= [
        //         array('comment' => $comment, array('reaccion_comentario' => $c))
        //     ];
        //    }
        //  }
        //  $c = $comment1;

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
            'creador de la nota'=> $this->user->name,
            'email' => $this->user->email,
            'user_id'=> "/api/user/".$this->user_id,
            'title' => $this->title,
            'content'=> $this->content,
            'image_note_path' => $this->image_note_path,
           
            'comentarios: ' => $comment1,
            'tags' => $tags,
            'status' => $status,
            //'reacciones '.$this->reactions->count() => $reactions,
            'reacciones_nota' => $reactions_note,
            'updated_at' => $this->updated_at,
            'nota creada '=> $time
        ];

    }
}
