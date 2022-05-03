<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Users\ActualizarUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::paginate(10);
    //     return new UserCollection($users);
    // }

    // public function store(Request $request)
    // {
    //     return response()->json([
    //         'msg' => 'No puede realizar ésta acción'
    //     ],200);
    // }

    public function show($user_id)
    {
        $user_exists = User::where('id', $user_id)->exists();
        if($user_exists){
            $user = User::find($user_id);
            return new UserResource($user);
        }
        return response()->json([
            'msg' => 'El usuario no existe'
        ],200);

    }


    public function update(ActualizarUserRequest $request, User $user)
    {
        return $request. $user;
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
