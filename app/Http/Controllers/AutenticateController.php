<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use MohamedGaber\SanctumRefreshToken\Traits\HasApiTokens;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Auth;

class AutenticateController extends Controller
{
    public function register(RegisterRequest $request){

        if($request->hasFile('image')) {

            $documentPath = $request->file('image')->store('noteapi', 's3');

            $path = Storage::disk('s3')->url($documentPath);

        } else {
            $path = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png';
        }

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->image_profile_path = $path;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = bcrypt($request->password);
        $user->save();

        if($path){
            $user->image()->create(['url' => $path]);
        }

        event(new Registered($user));

        $user_authtoken = $user->createAuthToken('api',20);

        return response()->json([
            'user'=> $user,
            'user_authtoken'=> $user_authtoken,
            'res' => true,
            'msg' => 'Usuario registrado correctamente',
            'send_email_verification' => 'Se envió un email con un código de verificación'
        ],200);
    }

    public function login(LoginRequest $request){

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $user_authtoken = $user->createAuthToken('api',20);
        $user_refreshtoken = $user->createRefreshToken('api', 120);

        return (new UserResource($user))->additional([
            'res' => true,
            'user_authtoken' => $user_authtoken,
            'user_refreshtoken' => $user_refreshtoken
        ]);
    }

    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'res' => true,
            'msg' => 'Token Eliminado Correctamente'
        ], 200);

    }
}
