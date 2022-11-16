<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Reactionm;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\FormatTime;
use App\Models\Nota;
use App\Models\TypeReaction;
use Illuminate\Support\Facades\Auth;
class NoteResource extends JsonResource
{
    public function toArray($request)
    {


        //return $this->reactions;
        // if($this->comments->count()){

        //     $comments_array = $this->comments;

        //     foreach ($comments_array as $comment){
        //         $comments[] = [
        //             'usuario' => $comment->user->name,
        //             'user_id' => $comment->user_id,
        //             'comentario' => $comment->content,
        //             'id' => $comment->id
        //         ];
        //     }
        // }else{
        //     $comments = 'No tiene comentarios';
        // }

        //$reactions= $this->reactionms;
        //return $this->id;
        // $reactions = Reactionm::where('reactionmable_id',8)
        //                         ->where('reactionmable_type', 'App\Model\Note')
        //                         ->get();
        // return $reactions;
        // if ($this->reactions->count()) {
        //     $reactions_array = $this->reactions;
        //     foreach ($reactions_array as $reaction){
        //         $reactions[] = [
        //             'id' => $reaction->id,
        //             'usuario' => $reaction->user->name,
        //             'user_id' => $reaction->user_id,
        //             'reaction' => $reaction->typereaction->name,
        //             'typereaction_id' => $reaction->typereaction_id
        //         ];
        //     }
        // }else{
        //     $reactions = 'No tiene reacciones';
        // }

        $reactions_note = Reactionm::where('reactionmable_id',$this->id)
        ->where('reactionmable_type', 'App\Model\Note')
        ->get();
        //return $reactions_note;

        $reactions_comment = Reactionm::where('reactionmable_id',$this->id)
        ->where('reactionmable_type', 'App\Model\Comment')
        ->get();

        $comments = Comment::where('note_id', $this->id)->get();
        $comment1 = array();
        foreach ($comments as $comment){
            foreach($reactions_comment as $Rc){
              $reacciones = Reactionm::where('reactionmable_id', $comment->id)
              ->where('reactionmable_type', 'App\Model\Comment')
              ->get();

             $comment1 []= [
                 array('comment' => $comment, array('reaccion_comentario' => $reacciones))
             ];
           }
         }
         $c = $comment1;

        if($this->status == 1 || $this->status == null){
            $status = 'ACTIVE';
        } else{
            $status = 'LOCKED';
        }

       // $reactions = $this->reactionms->user_id;

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
            'comentarios ' => $comment1,
            //'reacciones '.$this->reactions->count() => $reactions,
            'reacciones_nota' => $reactions_note,
            'updated_at' => $this->updated_at,
            'nota creada '=> $time,
            'status' => $status
        ];

    }
}
