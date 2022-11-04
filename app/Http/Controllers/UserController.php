<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Users\ActualizarUserRequest;
use App\Helpers\Url;
use App\Helpers\UpdateStore;
use App\Helpers\UpdateStoreFiles;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;



class UserController extends Controller
{

    public function show($user_id)
    {
        $user_exists = User::where('id', $user_id)->exists();

        $user_auth = Auth::user();

        if($user_exists){

            $user = User::find($user_id);

            if($user_auth->id == $user->id){

                return (new UserResource($user))->additional([
                    'res' => true
                ]);
            }else{
                return response()->json([
                    'msg' => 'No es propietario de ésta cuenta'
                ],400);
            }
        }else{
            return response()->json([
                'msg' => 'El usuario no existe'
            ],400);
        }
    }


    public function update(ActualizarUserRequest $request)
    {
        $user_object= Auth::user();
            // Utilizo un helper que tiene los metodos para actualizar y crear el objeto
             UpdateStoreFiles::UpdateUser($request, $user_object);
    }

    public function destroy(Request $request, User $user)
    {
        if (Auth::user()->id == $user->id) {

            $user->delete();

            return response()->json([

                "res"=>"El Usuario se eliminó correctamente"], 200);
        } else {
            return response()->json([
                'res' => 'Usted no es el propietario de ésta cuenta, no la puede borrar',
            ], 200);
        }

    }
}
