<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsEmpty;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];
    }

    public function verify(Request $request)
    {
        //return($request->code);
        $user = Auth::user();

        // return $request->user();
        if ($user->hasVerifiedEmail()) {
            return [
                'message' => 'Email already verified'
            ];
        }

        //return $user->code_verify_email . $request->code;

        $code1 = (string)$user->code_verify_email;
        $code2 = (string)$request->code;

        if($code1 == $code2 ){

            if ($user->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }

            return [
                'message'=>'Email has been verified'
            ];
        }else{
            return [
                'message' => 'El código ingresado es incorrecto '
            ];
        }
    }
}
