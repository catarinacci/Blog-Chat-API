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
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Support\Facades\Hash;
use App\Helpers\UpdateStore;
use App\Http\Resources\UserResource;



class UpdateStoreFiles{

    public static function UpdateNote($request, $nota_object){


        // pregunta si tiene publicaciones
        $user_notes = Note::where('user_id', Auth::user()->id)->get();

        if($user_notes){
            foreach($user_notes as $user_note){
                if($user_note->id == $nota_object->id){
                    $prop_note = true;
                    break;
                }else{
                    $prop_note = false;
                }
            }

            if($prop_note){
                return 'propietario';
            }else{
                return response()->json([
                    'res' => 'Usted no es el propietario de ésta publicación'
                ], 400);
            }

        }else{
            return response()->json([
                'res' => 'Usted no tiene ninguna publicación'
            ], 400);
        }
        $note_exists ='';

        return $note_user;

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


        if($request->password && $request->password_confirmation){

            if($request->password == $request->password_confirmation){

                $validated = $request->validate([
                    'password' => ['required','confirmed', RulesPassword::defaults()]
                ]);

                if($validated){

                    $image_object = Image::where('imageable_id', $user->id)->first();

                    if($request->hasFile('image_profile_path')){

                        //borro la imagen antigua en s3
                        $oldimage_path = $image_object->url;
                        $path_filter = Url::filterUrl($oldimage_path );
                        Storage::disk('s3')->delete($path_filter);

                        // Guardo la imagen nueva en s3
                        $documentPath = $request->file('image_profile_path')->store('noteapi', 's3');
                        $path = Storage::disk('s3')->url($documentPath);

                        // Actualizo la URL de la imagen en la tabla images
                        $image_object->update([
                            'url' => $path
                        ]);

                    }else{
                        $path = $image_object->url;
                    }

                    $user->update([
                        'name' => $request->name,
                        'surname' => $request->surname,
                        'nickname' => $request->nickname,
                        'password' => Hash::make($request->password),
                        'image_profile_path' => $path
                    ]);
                    return (new UserResource($user))->additional([
                        'res' => true,
                        'updated_password' => true,
                        'msj' => 'updated user'
                    ]);
                }
            }else{
                return response()->json([
                    'res' => 'Los campos password y password_confirmation no coinciden',
                ],400);
            }
        }else{

            $image_object = Image::where('imageable_id', $user->id)->first();

            if($request->hasFile('image_profile_path')){

                //borro la imagen antigua en s3
                $oldimage_path = $image_object->url;
                $path_filter = Url::filterUrl($oldimage_path );
                Storage::disk('s3')->delete($path_filter);

                // Guardo la imagen nueva en s3
                $documentPath = $request->file('image_profile_path')->store('noteapi', 's3');
                $path = Storage::disk('s3')->url($documentPath);

                // Actualizo la URL de la imagen en la tabla images
                $image_object->update([
                    'url' => $path
                ]);

            }else{
                $path = $image_object->url;
            }

            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'nickname' => $request->nickname,

                'image_profile_path' => $path
            ]);
            return (new UserResource($user))->additional([
                'res' => true,
                'updated_password' => false,
                'msj' => 'updated user'
            ]);
        };

     }


     public static function storeNote($request){

        $base_location = 'noteapi';

        if($request->hasFile('image_note_path')) {

            $documentPath = $request->file('image_note_path')->store('noteapi', 's3');
            $path = Storage::disk('s3')->url($documentPath);

        } else {
            $path = null;
        }

        $nota = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'image_note_path' => $path
        ]);

        if($path){
            $nota->image()->create(['url' => $path]);
        }

        $nota_creada= new NoteResource($nota);
        return response()->json([
            'nota' => $nota_creada,
            'res' => true,
            'msg' => 'Nota Creada Correctamente',
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
