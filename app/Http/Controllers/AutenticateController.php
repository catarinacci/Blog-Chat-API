<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AutenticateController extends Controller
{
    public function register(RegisterRequest $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->email_verified_at = $request->email_verified_at;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
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

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res' => true,
            'token' => $token
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
