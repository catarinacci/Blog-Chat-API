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

    public function show()
    {
        $user_auth = Auth::user();
        return (new UserResource($user_auth))->additional(
            [
                'res' => true
            ]
        );
    }


    public function update(ActualizarUserRequest $request)
    {
        // return $request;
        $user_object = Auth::user();


        // Utilizo un helper que tiene los metodos para actualizar y crear el objeto
        $updated_user = UpdateStoreFiles::UpdateUser($request, $user_object);

        if ($updated_user) {

            return $updated_user;

        }
        return response()->json(
            [
                "msg" => "Error de datos",
                "res" => "false"
            ],
            400
        );
    }

    public function destroy(Request $request, User $user)
    {
        $user = Auth::user();

        $user->update(
            ['status' => 2]
        );

        return response()->json(
            [
                "res" => "El Usuario se bloqueó correctamente"
            ],
            200
        );

    }
}
