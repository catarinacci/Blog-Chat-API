<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsReactionCommentRequest;
use App\Http\Requests\Reactions\GuardarReaccionRequest;
use App\Http\Resources\NoteResource;
use App\Models\Comment;
use App\Models\Note;

use App\Models\Reactionm;
use App\Models\TypeReaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionmController extends Controller
{
    public function index(){
        // $reaction = Reactionm::find(88);
        $reaction = Reactionm::all();
        return $reaction;
        // return $reactions;
        $note = Note::find(3);
        $user = User::find(1);
        // $a = $note->reactionms;
        // $a = $user->reactionms;
        // return $a;
        $comment = Comment::find(3);
        // $a = $comment->id;
        // return $a;
        $reactions = Reactionm::where('reactionmable_id',$comment->id)
                                ->where('reactionmable_type', 'App\Model\Comment')
                                ->get();

       //$reactions = Reactionm::all();
       return new NoteResource($note);
    }
    public function reactionNote(GuardarReaccionRequest $request){

        $reaction_msj = TypeReaction::where('id', $request->typereaction_id)->first();

        $reaction_note = new Reactionm;

        $res = $reaction_note->create([
            'mensaje' => $reaction_msj->name,
            'reactionmable_id' => $request->note_id,
            'reactionmable_type' => 'App\Model\Note',
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'reaction_note' => $res,
            'res' => true,
            'msg' => 'Reaccionó a la nota con id = '. $res->reactionmable_id,
       ], 200);
    }

    public function reactionComment(CommentsReactionCommentRequest $request){

        $reaction_msj = TypeReaction::where('id', $request->typereaction_id)->first();

        $reaction_comment = new Reactionm;

        $res = $reaction_comment->create([
            'mensaje' => $reaction_msj->name,
            'reactionmable_id' => $request->comment_id,
            'reactionmable_type' => 'App\Model\Comment',
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'reaction_comment' => $res,
            'res' => true,
            'msg' => 'Reaccionó al commentario con id = '. $res->reactionmable_id,
       ], 200);
    }

    public function reactionDelete($reaction_id){

        $reaction = Reactionm::where('id', $reaction_id)->first();

        $reactions_user = Reactionm::where('user_id', Auth::user()->id)->get();
        if($reaction){
            if((!$reactions_user->count() == 0)){

                foreach($reactions_user as $reaction_user){

                    if($reaction_user->id == $reaction->id){
                        $prop_note = true;
                        break;
                    }else{
                        $prop_note = false;
                    }
                }
                if($prop_note){

                    $reaction->update(
                        ['status' => 2]
                    );
                    return response()->json(
                        [
                            "res" => "La Reacción se bloqueó correctamente"
                        ],200 );
                }else{
                    return response()->json([
                        'res' => false,
                        'msj' => 'Usted no es el propietatio de esta reacción'
                    ],400);
                }


            }else{
                return response()->json([
                    "res" => 'No tiene reacciones'
                ],400);
            }
        }else{
            return response()->json([
                "res" => false,
                'msj' => 'La Reacción con el id = '.$reaction_id.' no existe'
            ],200);
        }


    }

}
