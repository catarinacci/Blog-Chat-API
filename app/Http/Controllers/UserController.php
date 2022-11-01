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
        if($user_exists){
            $user = User::find($user_id);
            return $user;
        }
        return response()->json([
            'msg' => 'El usuario no existe'
        ],200);

    }


    public function update(Request $request, $user_id)
    {
        //return $user_id;
        //return $request;

        $user_object = User::where('id', $user_id)->first();
        // return $user_object;
        if($user_object){
            //return $user_object;
            // Utilizo un helper que tiene los metodos para actualizar y crear el objeto
            $user_object_updated = UpdateStoreFiles::UpdateUser($request, $user_object);

        }else{
            return response()->json([
            'res' => 'El usuario '.$user_id.' no existe',
            ], 400);
        }
        return $user_object_updated;
        // return $request. $user;
        // if (Auth::user()->id == $user->id) {
        //     $user->update($request->all());
        //     return response()->json($user, 200);
        //     ;
        // } else {
        //     return response()->json([
        //         'res' => 'Usted no es el propietario de ésta cuenta, no la puede modificar',
        //     ], 200);
        // };
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
