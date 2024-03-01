<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTagNoteRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Note;
class TagController extends Controller
{
    public function show(){
        $tags = Tag::all();
        return $tags;
    }
    public function addNote(AddTagNoteRequest $request){

        $note = Note::where('id', $request->note_id)
                        ->where('status', 1)->first();
                    // ->where('status', 1)->get();
        if($note){
            $note->tags()->attach($request->tag_id);
            return response()->json([
                'res' => true,
                'msj' => 'Tag agregado correctamente'

            ]);
        }else{
            return response()->json([
                'res' => false,
                'msj' => 'La publicacíon se encuentra bloqueada',

            ]);
        }


        return $a;
    }

    public function search($tag_id){

       $tag = Tag::where('id', $tag_id)->first();

       if($tag){
        return $tag->notes()->where('status', 1)->get();
       }else{
        return response()->json([
            'res' => false,
            'msj' => 'El Tag no existe'
        ]);
       }

    }
}
