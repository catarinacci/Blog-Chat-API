<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class NewPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        // return $request->email;


        //return $user;

        // $token = $user->sendPasswordResetNotification('hola');
        // return $token;
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        $token_create = $user->createToken('authtoken');
        $token = $token_create->plainTextToken;


        $data = $user->sendPasswordResetNotification($token);

        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        if (Password::RESET_LINK_SENT) {
            return [
                'status' => ' El email para el restablecimiento de su contraceña fue enviado con èxito ',
                'email_password_reset' => $data
            ];
        }

        throw ValidationException::withMessages([
            // 'email' => [trans($status)],
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                $user->tokens()->delete();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response([
                'message'=> 'Password reset successfully'
            ]);
        }

        return response([
            'message'=> __($status)
        ], 500);

    }
}
