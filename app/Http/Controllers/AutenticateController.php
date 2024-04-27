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
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password as RulesPassword;

class AutenticateController extends Controller
{
    public function register(RegisterRequest $request)
    {

        //return($request->country);
        if ($request->hasFile('profile_photo_path')) {

            $documentPath = $request->file('profile_photo_path')->store('noteapi', 's3');

            $path = Storage::disk('s3')->url($documentPath);
        } else {

            $path = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/blank-profile-picture.jpg';
        }

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->save();
        
        if ($path) {
            $user->image()->create(['url' => $path]);
        }

        $profile = $user->profile()->create([
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube
        ]);

        $profile->location()->create([
            'country_id' => $request->country_id
        ]);

        //dd($location);
        event(new Registered($user));

        $user_authtoken = $user->createAuthToken('api', 60 * 24);
        $cookie = cookie('cookie_token', $user_authtoken->plainTextToken, 60 * 24);

        $user_object = new UserResource($user);

        return response([
            'data' => $user_object,
            'user_authtoken' => [
                'token' => $user_authtoken->plainTextToken,
                'expired_at' => $user_authtoken->accessToken->expired_at
            ],
            'res' => true,
            'msg' => 'Usuario registrado correctamente',
            'send_email_verification' => 'Se envió un email con un código de verificación'
        ])->withoutCookie($cookie);
    }

    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->status == 1) {
                // return 1;
                if (!$user || !Hash::check($request->password, $user->password)) {
                    throw ValidationException::withMessages([
                        'msg' => ['Las credenciales son incorrectas.'],
                    ]);
                }
                $status = 'ACTIVE';
                $user_authtoken = $user->createAuthToken('api', 60 * 24);
                $user_refreshtoken = $user->createRefreshToken('api', 60 * 48);
                $cookie = cookie('cookie_token', $user_authtoken->plainTextToken, 60 * 24);
                $user_object = new UserResource($user);
                return response([
                    'data' => $user_object,
                    'user_authtoken' => [
                        'token' => $user_authtoken->plainTextToken,
                        'expired_at' => $user_authtoken->accessToken->expired_at
                    ],
                    'user_refreshtoken' => [
                        'token' => $user_refreshtoken->plainTextToken,
                        'expired_at' => $user_refreshtoken->accessToken->expired_at
                    ],              
                
                ],200)->withoutCookie($cookie);
            }

            $status = 'LOCKED';

            return response()->json([
                'res' => false,
                'user_status' => $status,
                'msg' => 'Esta cuenta se encuentra bloqueada'
            ], 403);
        }
        return response()->json([
            'res' => false,
            'msg' => 'No existe el usuario'
        ], 404);
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        $cookie = cookie('cookie_token', "", -1);
        
        return response([
            'res' => true,
            'msg' => 'Token Eliminado Correctamente'
        ],200)->withoutCookie($cookie);
    }
}
