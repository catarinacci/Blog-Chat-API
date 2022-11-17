<?php

namespace App\Http\Controllers;

use App\Helpers\UpdateStoreFiles;
use App\Http\Resources\ReactionCollection;
use App\Http\Requests\Reactions\GuardarReaccionRequest;
use App\Http\Requests\Reactions\ActualizarReaccionRequest;
use App\Http\Resources\ReactionResource;
use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\Note;

use Illuminate\Support\Facades\Auth;
use App\Events\ReactionEvent;
use App\Models\ReactionMorph;
use App\Models\TypeReaction;

class ReactionController extends Controller
{
    // public function index()
    // {
    //     $reactions = Reaction::orderBy('updated_at','desc')->paginate(10);
    //     return new ReactionCollection($reactions);
    // }

    // public function reactionUser(){
    //     $reaction1 = Reaction::where('user_id', Auth::user()->id)->get();

    //     if (!$reaction1->isEmpty()) {

    //         $reaction = Reaction::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
    //         return new reactionCollection($reaction);
    //     }
    //     return response()->json([
    //         'msg' => 'No tiene ninguna reacción',
    //    ], 400);
    // }

    // public function reactionNote($nota_id){

    //     $nota_exists = Note::where('id', $nota_id)->exists();

    //     if($nota_exists){
    //         $reaction1 = Reaction::where('note_id', $nota_id)->get();

    //         if (!$reaction1->isEmpty()) {

    //             $reaction = Reaction::where('note_id', $nota_id)->orderBy('updated_at', 'desc')->paginate(10);
    //             return new reactionCollection($reaction);
    //         }
    //         return response()->json([
    //             'msg' => 'No tiene ninguna reacción',
    //        ], 400);
    //     }
    //     return response()->json([
    //         'msg' => 'La nota no '.$nota_id.' existe',
    //    ], 400);

    // }

    // public function storeNote(GuardarReaccionRequest $request)
    // {
    //    // return $request->typereaction_id;
    //     $typereaction = TypeReaction::where('id', $request->typereaction_id)->find(1);
    //             $messaje = 'El usuario '. Auth::user()->name .' reaccionó a la nota, con un ';
    //             $nota = Note::where('id', $request->note_id)->find(1);
    //             return $nota->reactionmorphs;
    //              $reaction = $nota->reactionms()->create([

    //                 'mensaje' => $typereaction->name,
    //                 'user_id' => $nota->user_id

    //             ]);
    //             // $reaction = ReactionMorph::create([
    //             //     'messaje' => $messaje
    //             // ]);
    //             // return $nota ;
    //             //event(new ReactionEvent($reaction));
    //             // $nota = Note::where('id', $reaction->reactionmorphable_id)->first();
    //             // return $nota;
    //             return new ReactionResource($reaction);
    //             //return $reaction;
    // }

    // public function show($reaction_id)
    // {
    //     $reaction_exists = Reaction::where('id', $reaction_id)->exists();
    //     if($reaction_exists){
    //         $reaction = Reaction::find($reaction_id);
    //         return new ReactionResource($reaction);
    //     }
    //     return response()->json([
    //         'msj' => 'La reaccion '.$reaction_id.' no existe '
    //     ], 400);

    // }

    // public function update(ActualizarReaccionRequest $request, $reaction_id)
    // {
    //     $reaction = UpdateStoreFiles::UpdateReaction($request, $reaction_id);
    //     return $reaction;;
    // }

    // public function destroy(Request $request, Reaction $reaction)
    // {

    //     if (Auth::user()->id == $reaction->user_id) {

    //         $reaction->delete();

    //         return response()->json([
    //             "res"=>"La reacciòn se eliminó correctamente"], 200);
    //     } else {
    //         return response()->json([
    //             'res' => 'Usted no es el autor de ésta reacción, no la puede borrar'
    //         ], 400);
    //     }


    // }
}
