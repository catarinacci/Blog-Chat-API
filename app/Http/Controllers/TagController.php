<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function show(){
        $tags = Tag::all();
        return $tags;
    }
    // public function search($tag_id){

    //     $tag = Tag::where('id', $tag_id)->first();

    //     return response()->json($tag->posts);
    // }

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
