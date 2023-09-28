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

        if ($verify) {
            DB::table('password_resets')->where('email', $email)->delete();
        }
        
        $pin = mb_strtoupper(Str::random(6));
        
        
        $password_reset = DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $pin,
            'created_at' => Carbon::now()
        ]);

        if ($password_reset) {
            Mail::to($request->email)->send(new ResetPassword($user, $pin));
            return [
                'succes' => true,
                'messaje' => ' Please check your email for a 6 digit pin '];
        } else {
            return [
                'succes' => false,
                'messaje' => ' This email does not exist '
            ];
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $user = User::where('email', $request->email)->first();

        $email_reset = DB::table('password_resets')->where('email', $request->email)->first();

        if ($user) {
            if ($email_reset) {
                if ($email_reset->email == $request->email) {
                    if ($email_reset->token == $request->token) {

                        $user->update([
                            'password' => Hash::make($request->password)
                        ]);
                        DB::table('password_resets')->where('email', $request->email)->delete();
                        return response()->json([
                            'succes' => true,
                            'messaje' => ' Your password has been reset '
                        ], 200);
                    } else {
                        return response()->json([
                            'succes' => false,
                            'messaje' => ' El código es incorrecto '
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'succes' => false,
                        'messaje' => ' This email does not exist '
                    ], 400);
                }
            }else{
                return response()->json([
                    'succes' => false,
                    'messaje' => "El email"." " .$request->email." ". "no posee una solicitud para restablecer su contraceña. "
                ], 400);
            }
        }
        return response()->json([
            'succes' => false,
            'messaje' => ' El email es incorrecto '
        ], 400);

    }
}
