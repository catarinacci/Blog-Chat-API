<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeReaction;
use App\Http\Requests\TypeReactions\GuardarTypeReaccionRequest;

class TypeReactionController extends Controller
{

    public function index()
    {
        return TypeReaction::all();
    }


    public function store(GuardarTypeReaccionRequest $request)
    {
        TypeReaction::create($request->all());

        return response()->json([
            'res' => true,
            'msg' => 'Reacción Guardada Correctamente'
        ],200);
    }

    public function show(TypeReaction $typereaction)
    {
        return $typereaction;
    }

    public function update(Request $request, TypeReaction $typereaction )
    {
        $typereaction->update($request->all());
        return response()->json($typereaction);
    }

    public function destroy( TypeReaction $typereaction)
    {
        $typereaction->delete();

        return response()->json(["res"=>"El tipo de reacción se elimino correctamente"], 200);
    }
}
