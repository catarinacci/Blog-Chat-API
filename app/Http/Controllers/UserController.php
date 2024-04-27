<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use App\Http\Requests\Users\ActualizarUserRequest;
use App\Helpers\Url;
use App\Helpers\UpdateStore;
use App\Helpers\UpdateStoreFiles;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\RegisterRequest;


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
        //return $request;
        $user = Auth::user();
        //return $user;
        if ($user->email === $request->email) {
            // Utilizo un helper que tiene los metodos para actualizar y crear el objeto
            $updated_user = UpdateStoreFiles::UpdateUser($request, $user);

            if ($updated_user) {

                return $updated_user;
            }
            return response()->json(
                [
                    "msg" => "Error de datos",
                    "res" => "false"
                ],
                500
            );
        }else{
            return response()->json(
                [
                    "msg" => "Email incorrecto",
                    "res" => "false"
                ],
                404
            );
        }
    }

    public function destroy(Request $request, User $user)
    {
        $user = Auth::user();

        $user->update(
            ['status' => 2]
        );
        $notes = Note::where('user_id', $user->id)->get();
        //return $notes;
        foreach ($notes as $note) {
            $note->update(
                ['status' => 2]
            );
        }
        return response()->json(
            [
                "res" => "El Usuario se bloqueó correctamente"
            ],
            200
        );
    }
}
