<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Note;
use App\Http\Resources\NoteResource;
use App\Http\Resources\NoteCollection;

class CategoryCotroller extends Controller
{
    public function show(){
        $categories = Category::all();
        return $categories;
    }

    public function searchCategory($category_id){

        $category = Category::where('id', $category_id)->first();

        if($category){

            $notes_category = Note::where('category_id', $category_id)
                                    ->where('status', 1)
                                    ->paginate(10);
            return new NoteCollection($notes_category);
        }else{
            return response()->json([
                'res' => false,
                'msj' => 'No existe la cetegoría '
            ],400);
        }
    }
}
