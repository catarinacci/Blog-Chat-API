<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Validation\ValidationException;
use App\Models\PassworReset;
use App\Models\User;
use App\Mail\ResetPassword;

use App\Http\Passwords\MyPasswordBroker;
use App\Notifications\ResetPasswordNotification;
class NewPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        $verify = DB::table('password_resets')->where('email', $email)->first();

        //return $verify;

        if($verify){
            //$verify->delete();
            DB::table('password_resets')->where('email', $email)->delete();
        }

        $token= mb_strtoupper(Str::random(6));

        $password_reset = DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        if($password_reset){
            Mail::to($request->email)->send(new ResetPassword($user, $token));
            return [
                'succes' => true,
                'messaje' => ' Please check your email for a 6 digit pin '];
        }else{
            return [
                'succes' => false,
                'messaje' => ' This email does not exist '
            ];
        }
        // if (Password::RESET_LINK_SENT) {
        //     return [
        //         'status' => ' El email para el restablecimiento de su contraceña fue enviado con èxito '
        //     ];
        // }

        // throw ValidationException::withMessages([
        //     // 'email' => [trans($status)],
        // ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $user = User::where('email', $request->email)->first();

        $email_reset =DB::table('password_resets')->where('email', $request->email)->first();

        if($user){
            if($email_reset->email == $request->email){
                if($email_reset->token == $request->token){

                    $user->update([
                        'password' => Hash::make($request->password)
                    ]);
                    //DB::table('password_resets')->where('email', $request->email)->delete();
                    return response()->json([
                        'succes' => true,
                        'messaje' => ' Updated password '
                    ], 200);
                }else{
                    return response()->json([
                        'succes' => false,
                        'messaje' => ' El código es incorrecto '
                    ], 400);
                }
            }else{
                return response()->json([
                    'succes' => false,
                    'messaje' => ' This email does not exist '
                ],400);
            }
        } return response()->json([
            'succes' => false,
            'messaje' => ' El email es incorrecto '
        ],400);
        //return $email_reset;
        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user) use ($request) {
        //         $user->forceFill([
        //             'password' => Hash::make($request->password),
        //             'remember_token' => Str::random(6),
        //         ])->save();

        //         $user->tokens()->delete();

        //         event(new PasswordReset($user));
        //     }
        // );

        // if ($status == Password::PASSWORD_RESET) {
        //     return response([
        //         'message'=> 'Password reset successfully'
        //     ]);
        // }

        // return response([
        //     'message'=> __($status)
        // ], 500);

    }
}
