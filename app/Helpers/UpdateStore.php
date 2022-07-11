<?php
namespace App\Helpers;
use App\Models\Note;
use App\Models\Comment;
use App\Models\Reaction;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NoteResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReactionResource;
use Illuminate\Support\Facades\Storage;
use App\Helpers\UpdateStore;



class UpdateStoreFiles{

    public static function UpdateNote($request, $nota_object){

        $image_object = Image::where('imageable_id', $nota_object->id)->first();

        if( !is_object($image_object)){

            $oldimage_path = 1;
        }else{

            $oldimage_path = $image_object->url;
        }

            if(Auth::user()->id == $nota_object->user_id){

                    if($request->image){

                        if($oldimage_path <> 1){

                        $path_filter = Url::filterUrl($oldimage_path );
                        Storage::disk('s3')->delete($path_filter);
                        }

                        if( !is_object($image_object)){

                            $image_object_save = $request->file('image')->store('noteapi', 's3');
                            $imagen = Storage::disk('s3')->url($image_object_save);
                            $nota_object->image()->create([
                                'url' => $imagen,
                            ]);

                        }else{
                            $image_object_save = $request->file('image')->store('noteapi', 's3');
                            $imagen = Storage::disk('s3')->url($image_object_save);
                            $image_object->update([
                                'url' => $imagen,
                            ]);
                        }

                    }else{
                        $imagen = $oldimage_path;
                    }

                        $nota_object->update([
                            'title' => $request->title,
                            'content' => $request->content,
                            'user_id' => Auth::user()->id,
                            'image' => $imagen]);

                            return new NoteResource($nota_object);
            }else{
                return response()->json([
                    'res' => 'Usted no es el propietario de ésta nota, no la puede modificar',
                ], 400);
            }
     }


     public static function UpdateUser($request, $user){
        //return $user->id;
        //return Auth::user()->id;

        $image_object = Image::where('imageable_id', $user->id)->first();

        if( !is_object($image_object)){

            $oldimage_path = 1;
        }else{

            $oldimage_path = $image_object->url;
        }

            if(Auth::user()->id == $user->id){

                    if($request->image){

                        if($oldimage_path <> 1){

                        $path_filter = Url::filterUrl($oldimage_path );
                        Storage::disk('s3')->delete($path_filter);
                        }

                        if( !is_object($image_object)){

                            $image_object_save = $request->file('image')->store('noteapi', 's3');
                            $imagen = Storage::disk('s3')->url($image_object_save);
                            $user->image()->create([
                                'url' => $imagen,
                            ]);

                        }else{
                            $image_object_save = $request->file('image')->store('noteapi', 's3');
                            $imagen = Storage::disk('s3')->url($image_object_save);
                            $image_object->update([
                                'url' => $imagen,
                            ]);
                        }

                    }else{
                        $imagen = $oldimage_path;
                    }

                        $user->update([
                            'name' => $request->name,
                            'surname' => $request->surname,
                            'nickname' => $request->nickname,
                            //'id' => Auth::user()->id,
                            'image' => $imagen]);

                            return $user;
            }else{
                return response()->json([
                    'res' => 'Usted no es el propietario de ésta nota, no la puede modificar',
                ], 400);
            }
     }


     public static function storeNote($request){

        $base_location = 'noteapi';

        if($request->hasFile('image')) {

            $documentPath = $request->file('image')->store('noteapi', 's3');

            $path = Storage::disk('s3')->url($documentPath);

        } else {
            $path = null;
        }

        $nota = Note::create([
            'title' => $request->title,
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
