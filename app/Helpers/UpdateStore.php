<?php
namespace App\Helpers;
use App\Models\Note;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NoteResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReactionResource;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class UpdateStoreFiles{

    public static function UpdateNote($request, $nota_id){

        $nota_exists = Note::where('id', $nota_id)->exists();

        if($nota_exists){
            $nota = Note::findOrFail($nota_id);
            if($request->image){
                $imagen =$request->image->store('public/notas');
             }else{
                 $imagen = null;
             }

            if(Auth::user()->id == $nota->user_id){
                $nota->update([
                    'content' => $request->content,
                    'user_id' => Auth::user()->id,
                    'image' => $imagen]);

                    return new NoteResource($nota);
            }else{
                return response()->json([
                    'res' => 'Usted no es el propietario de ésta nota, no la puede modificar',
                ], 400);
            }
        }return response()->json([
            'res' => 'La nota '.$nota_id.' no existe',
        ], 400);
     }

     public static function storeNote($request){

        $base_location = 'noteapi';

        // Handle File Upload
        if($request->hasFile('image')) {

            $documentPath = $request->file('image')->store('noteapi', 's3');

            $path = Storage::disk('s3')->url($documentPath);

        } else {
            $path = null;
        }

        $nota = Note::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'image' => $path
        ]);

        if($path){
            $nota->image()->create(['url' => $path]);
        }

        $nota_creada= new NoteResource($nota);
        return response()->json([
            'nota' => $nota_creada,
            'res' => true,
            'msg' => 'Nota Guardada Correctamente',
        ],200);
     }

     public static function UpdateComment($request, $comment_id){
        $comment_exist = Comment::where('id', $comment_id)->exists();

        if($comment_exist){
            $comment = Comment::findOrFail($comment_id);
            if (Auth::user()->id == $comment->user_id) {

                $comment->update([
                    'user_id' => Auth::user()->id,
                    'note_id' => $comment->note_id,
                    'content' => $request->content
                ]);
                return new CommentResource($comment);

            } else {
                return response()->json([
                    'res' => 'Usted no es el autor de éste comentario, no lo puede modificar',
                ], 400);
            };
        }
        return response()->json([
            'res' => 'El comentario '.$comment_id.' no existe ' ,
        ], 400);
     }

     public static function UpdateReaction($request, $reaction_id){
        $reaction_exists = Reaction::where('id', $reaction_id)->exists();

        if( $reaction_exists){

            $reaction = Reaction::findOrFail($reaction_id);

            if (Auth::user()->id == $reaction->user_id){
                $reaction->update([
                    'user_id' => Auth::user()->id,
                    'note_id' => $reaction->note_id,
                    'typereaction_id' => $request->typereaction_id
                ]);
                return new ReactionResource($reaction);
            }else{
            return response()->json([
                'res' => 'Usted no es el autor de ésta reacción, no la puede modificar'
            ], 400);
            }
        }
        return response()->json([
            'res' => 'La reacción '.$reaction_id.' no existe ' ,
        ], 400);
     }
}
