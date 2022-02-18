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

class ReactionController extends Controller
{
    public function index()
    {
        $reactions = Reaction::orderBy('updated_at','desc')->paginate(10);
        return new ReactionCollection($reactions);
    }

    public function reactionUser(){
        $reaction1 = Reaction::where('user_id', Auth::user()->id)->get();

        if (!$reaction1->isEmpty()) {

            $reaction = Reaction::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
            return new reactionCollection($reaction);
        }
        return response()->json([
            'msg' => 'No tiene ninguna reacción',
       ], 400);
    }

    public function reactionNote($nota_id){

        $nota_exists = Note::where('id', $nota_id)->exists();

        if($nota_exists){
            $reaction1 = Reaction::where('note_id', $nota_id)->get();

            if (!$reaction1->isEmpty()) {

                $reaction = Reaction::where('note_id', $nota_id)->orderBy('updated_at', 'desc')->paginate(10);
                return new reactionCollection($reaction);
            }
            return response()->json([
                'msg' => 'No tiene ninguna reacción',
           ], 400);
        }
        return response()->json([
            'msg' => 'La nota no '.$nota_id.' existe',
       ], 400);

    }

    public function store(GuardarReaccionRequest $request)
    {
                $reaction = Reaction::create([
                    'user_id' => Auth::user()->id,
                    'note_id' => $request->note_id,
                    'typereaction_id' => $request->typereaction_id
                ]);
                return new ReactionResource($reaction);
    }

    public function show($reaction_id)
    {
        $reaction_exists = Reaction::where('id', $reaction_id)->exists();
        if($reaction_exists){
            $reaction = Reaction::find($reaction_id);
            return new ReactionResource($reaction);
        }
        return response()->json([
            'msj' => 'La reaccion '.$reaction_id.' no existe '
        ], 400);

    }

    public function update(ActualizarReaccionRequest $request, $reaction_id)
    {
        $reaction = UpdateStoreFiles::UpdateReaction($request, $reaction_id);
        return $reaction;;
    }

    public function destroy(Request $request, Reaction $reaction)
    {

        if (Auth::user()->id == $reaction->user_id) {

            $reaction->delete();

            return response()->json([
                "res"=>"La reacciòn se eliminó correctamente"], 200);
        } else {
            return response()->json([
                'res' => 'Usted no es el autor de ésta reacción, no la puede borrar'
            ], 400);
        }


    }
}
