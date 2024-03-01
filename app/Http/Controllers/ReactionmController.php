<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsReactionCommentRequest;
use App\Http\Requests\Reactions\GuardarReaccionRequest;
use App\Http\Resources\NoteResource;
use App\Models\Comment;
use App\Models\Note;
use App\Events\ReactionEvent;
use App\Models\Reactionm;
use App\Models\TypeReaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ReactionCommentEvent;

class ReactionmController extends Controller
{
    public function index(){
        // $reaction = Reactionm::find(88);
        // return $reaction->user;
        // $user = Auth::user();
        // return $user->reactionms;
        // $reaction = Reactionm::all();
        // return $reaction;
        // return $reactions;
    //     $note = Note::find(55);
    //    return $note->reactionms;
       // $user = User::find(1);
        // $a = $note->reactionms;
        // $a = $user->reactionms;
        // return $a;
       $comment = Comment::find(3);

        return $comment->reactionms;
        $reactions = Reactionm::where('reactionmable_id',$note->id)
                                ->where('reactionmable_type', 'App\Model\Note')
                                ->get();
        return $reactions;

       //$reactions = Reactionm::all();
       return new NoteResource($note);
    }
    public function reactionNote(GuardarReaccionRequest $request){

        $status_note = Note::where('id', $request->note_id)
        ->where('status', 1)->first();
        if ($status_note){

            $reaction_msj = TypeReaction::where('id', $request->typereaction_id)->first();

            $reaction_note = new Reactionm;

            $res = $reaction_note->create([
                'mensaje' => $reaction_msj->name,
                'reactionmable_id' => $request->note_id,
                'reactionmable_type' => 'App\Model\Note',
                'user_id' => Auth::user()->id,
                'create_at' => now(),
                'update_at' => now()
            ]);
            event(new ReactionEvent($res));

            return response()->json([
                'reaction_note' => $res,
                'res' => true,
                'msg' => 'Reaccionó a la nota con id = '. $res->reactionmable_id,
           ], 200);

        }else{
        return response()->json([
        'res' => false,
        'msj' => 'La publicación se encuentra bloqueada'
        ]);
        }
    }

    public function reactionComment(CommentsReactionCommentRequest $request){


        $status_comment = Comment::where('id', $request->comment_id)

        ->where('status', 1)->first();
        if ($status_comment){

            $reaction_msj = TypeReaction::where('id', $request->typereaction_id)->first();

            $reaction_comment = new Reactionm;

            $reactionComment = $reaction_comment->create([
                'mensaje' => $reaction_msj->name,
                'reactionmable_id' => $request->comment_id,
                'reactionmable_type' => 'App\Model\Comment',
                'user_id' => Auth::user()->id
            ]);

            event(new ReactionCommentEvent($reactionComment));

            return response()->json([
                'reaction_comment' => $reactionComment,
                'res' => true,
                'msg' => 'Reaccionó al commentario con id = '. $reactionComment->reactionmable_id,
           ], 200);

        }else{
        return response()->json([
        'res' => false,
        'msj' => 'El comentario se encuentra bloqueado'
        ]);
        }


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

    public function show(){
        $type_reactions = TypeReaction::all();
        return $type_reactions;
    }

}
