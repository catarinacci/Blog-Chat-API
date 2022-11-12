<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class NoteController extends Controller
{
    public function index()
    {
        $orden_desc = Note::orderBy('updated_at', 'desc')->paginate(10);
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
        $notas1= Note::where('user_id', Auth::user()->id)->get();

       if(!$notas1->isEmpty()){
            $notas= Note::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);

            return new NoteCollection($notas);
       }
       return response()->json([
            'msg' => 'No tiene ninguna nota',
       ], 400);

    }


    public function store(GuardarNotaRequest $request)
    {

        $note =UpdateStoreFiles::storeNote($request);
        return $note;
    }

    public function show ($nota_id)
    {
        $nota_exists = Note::where('id', $nota_id)->exists();

        if ($nota_exists){
            $nota = Note::find($nota_id);
            return new NoteResource($nota);
        }
        return response()->json([
            'msj' => 'La nota '.$nota_id.' no existe '
        ], 400);


    }

    public function update(ActualizarNotaRequest $request, $nota_id)
    {
        $nota = Note::where('id', $nota_id)->first();


        if($nota){

            // Utilizo un helper que tiene los metodos para actualizar y crear el objeto
            $nota_object = UpdateStoreFiles::UpdateNote($request, $nota);
        }else{
            return response()->json([
            'res' => 'La nota '.' '.$nota_id.' '.' no existe',
            ], 400);
        }

        return $nota_object;

    }

    public function destroy($nota_id)
    {
        $nota = Note::findOrFail($nota_id);

         if (Auth::user()->id == $nota->user_id) {

            $nota->delete();

            return response()->json([

                "res"=>"La nota " .$nota->id." se eliminó correctamente"], 200);
        } else {
            return response()->json([
                'res' => 'Usted no es el propietario de ésta nota, no la puede borrar',
            ], 400);
        }

    }

}
