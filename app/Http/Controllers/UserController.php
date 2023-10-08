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

    // public function create(RegisterRequest $request){

        
    //     if($request->hasFile('profile_photo_path')) {

    //         $documentPath = $request->file('profile_photo_path')->store('noteapi', 's3');

    //         $path = Storage::disk('s3')->url($documentPath);

    //     } else {
            
    //         $path = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.jpg';
    //     }

    //     $request->validate([
    //         'password' => ['required', 'confirmed', RulesPassword::defaults()],
    //     ]);
        
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->surname = $request->surname;
    //     $user->nickname = $request->nickname;
    //     $user->email = $request->email;
    //     $user->profile_photo_path = $path;
    //     $user->email_verified_at = $request->email_verified_at;
    //     $user->password = bcrypt($request->password);
    //     $user->save();
    //     if($path){
    //         $user->image()->create(['url' => $path]);
    //     }
        
    //     event(new Registered($user));

    //     $user_authtoken = $user->createAuthToken('api',20);

    //     return response()->json([
    //         'user'=> $user,
    //         'user_authtoken'=> $user_authtoken,
    //         'res' => true,
    //         'msg' => 'Usuario registrado correctamente',
    //         'send_email_verification' => 'Se envió un email con un código de verificación'
    //     ],200);
    // }

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
         $notes = Note::where('user_id', $user->id)->get();
         //return $notes;
         foreach($notes as $note){
            $note->update(
                ['status' =>2]
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
