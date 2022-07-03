<?php

namespace App\Http\Controllers;

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

class AutenticateController extends Controller
{
    public function register(RegisterRequest $request){

        if($request->hasFile('image')) {

            $documentPath = $request->file('image')->store('noteapi', 's3');

            $path = Storage::disk('s3')->url($documentPath);

        } else {
            $path = null;
        }

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->image = $path;
        //$user->email_verified_at = $request->email_verified_at;
        $user->password = bcrypt($request->password);
        $user->save();

        if($path){
            $user->image()->create(['url' => $path]);
        }

        event(new Registered($user));

        return response()->json([
            'user'=> $user,
            'res' => true,
            'msg' => 'Usuario registrado correctamente'
        ],200);
    }

    public function login(LoginRequest $request){

        $user = User::where('email', $request->email)->first();


        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas.'],
            ]);
        }

        //$token = $user->createToken($request->email)->plainTextToken;
        $user_authtoken = $user->createAuthToken('web',20);
        $user_refreshtoken = $user->createRefreshToken('web', 120);

        return response()->json([
            'res' => true,
            //'token' => $token,
            'user_authtoken' => $user_authtoken,
            'user_refreshtoken' => $user_refreshtoken
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'res' => true,
            'msg' => 'Token Eliminado Correctamente'
        ], 200);
    }
}
