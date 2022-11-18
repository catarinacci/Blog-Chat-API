<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reactionm;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\Notes\GuardarNotaRequest;
use App\Http\Requests\Notes\ActualizarNotaRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\NoteCollection;
use App\Helpers\Url;
use App\Helpers\UpdateStore;
use App\Helpers\UpdateStoreFiles;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class NoteController extends Controller
{
    public function index()
    {
        $orden_desc = Note::where('status', 1)->orderBy('updated_at', 'desc')->paginate(10);
        return new NoteCollection($orden_desc);
    }

    public function image(Note $nota){

        $url = Url::filterUrl($nota->image);
        //$ruta = Storage::disk('s3')->put($url, 'public');
        // return $nota;
        // return $url;
        // return $nota->image;
        // return $ruta;
        // return response()->download(($url),$nota->content);
    }

    public function noteUser()
    {
        $my_notes= Note::where('user_id', Auth::user()->id)->get();

       if($my_notes){
            $notas= Note::where('user_id', Auth::user()->id)->where('status',1)->orderBy('updated_at', 'desc')->paginate(10);

            return new NoteCollection($notas);
       }
       return response()->json([
            'msg' => 'No tiene ninguna publicación.',
       ], 400);

    }


    public function store(GuardarNotaRequest $request)
    {

        $note =UpdateStoreFiles::storeNote($request);
        return $note;
    }

    public function show ($nota_id)
    {
        // $nota = Note::where('id', $nota_id)->first();
        $nota = Note::find($nota_id);
        // $comment = Comment::find(1);
        // // return $nota->reactionms;
        // return $comment->reactionms;
        // return $nota;
        //Reaction note
        // $reactions_note = Reactionm::where('reactionmable_id',$nota_id)
        //                         ->where('reactionmable_type', 'App\Model\Note')
        //                         ->get();
        // $reactions_comment = Reactionm::where('reactionmable_id',$nota_id)
        //                     ->where('reactionmable_type', 'App\Model\Comment')
        //                     ->get();

        // $comments = Comment::where('note_id', $nota_id)->get();
        //$comments = Comment::find(13);
        //return $comments;
        //return $reactions_comment;

                //    foreach ($comments as $comment){
                //        foreach($reactions_comment as $Rc){
                        //$r = Reactionm::where('reactionmable_id', $comment->id)->get();
                        //$c = $comment[]=['reacciones' => $Rc];
                        // $comments[]
                        // = [
                        //     //'msj' => $comment,
                        //     // 'usuario' => $comment->user->name,
                        //     // 'user_id' => $comment->user_id,
                        //     //'comentario' => $comment->content,
                        //     //'id' => $comment->id,
                        //     //'reaction' => $Rc,
                        //  $reacciones = Reactionm::where('reactionmable_id', $comment->id)
                        //  ->where('reactionmable_type', 'App\Model\Comment')
                        //  ->get();
                        // ];
                        //$comment[] =['msj' => $Rc];
                    //     $comment1 []= [
                    //         array('comment' => $comment, array('reacciones_comentarios' => $reacciones))
                    //     ];
                    //   }

                    // }
                    //return $comment1;

        if ($nota){
            $status = $nota->status;
            if($status == 1){
                // return (new NoteResource($nota))->additional([
                //     'comentarios:' => $comment1,
                //     'reacciones_nota:' => $reactions_note
                // ]);
                 return new NoteResource($nota);
            }else{
                return response()->json([
                    'res' => false,
                    'msj' => 'La publicación se encuentra bloqueada'
                ],400);
            }
        }
        return response()->json([
            'msj' => 'La nota '.$nota_id.' no existe '
        ], 400);


    }

    public function update(ActualizarNotaRequest $request, $nota_id)
    {
        $nota = Note::where('id', $nota_id)->first();

        $status = $nota->status;

        if($status == 1){
            if($nota){

                // Utilizo un helper que tiene los metodos para actualizar y crear el objeto
                $nota_object = UpdateStoreFiles::UpdateNote($request, $nota);
            }else{
                return response()->json([
                'res' => 'La nota '.' '.$nota_id.' '.' no existe',
                ], 400);
            }

            return $nota_object;
        }else{
            return response()->json([
                'res' => false,
                'msj' => 'La publicación se encuentra bloqueada'
            ],400);
        }

    }

    public function destroy($nota_id)
    {


        $nota = Note::where('id',$nota_id)->first();

        if($nota){
            // pregunta si tiene publicaciones
            $user_notes = Note::where('user_id', Auth::user()->id)->get();

            if(!$user_notes->count() == 0){
                foreach($user_notes as $user_note){

                    if($user_note->id == $nota->id){

                        $prop_note = true;
                        break;
                    }else{
                        $prop_note = false;
                    }
                }
                if($prop_note){

                    $nota->update(
                        ['status' => 2]
                    );

                    return response()->json([
                            "res" => "La publicación se bloqueó correctamente"
                        ],200);
                }else{
                    return response()->json([
                        'res' => false,
                        'msj' => 'Usted no es el propietario de la publicación'
                    ],400);
                }
            }else{
                return response()->json([
                    'res' => false,
                    'msj' => 'No tiene publicaciones'
                ],400);
            }
        }else{
            return response()->json([
                "res" => false,
                'msj' => 'La publicación no existe'
            ], 400);
        }
    }

    public function search($value)
    {
        $notes = Note::where('title', 'LIKE', '%'.$value.'%')
                        ->orWhere('content', 'LIKE', '%'.$value.'%')
                        ->where('status', 1)
                        ->orderBy('updated_at', 'desc')
                        ->paginate(10);
        // return $value;
        return new NoteCollection($notes);
    }

}
