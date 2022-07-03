<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl){

        //  return (new MailMessage)

        // ->subject(Lang::get('Verify Email Address'))
        // ->line(Lang::get('You are receiving this email to verify your email address.'))
        // ->line(Lang::get('Verify Email Address Code '), $verificationUrl)
        // ->line(Lang::get('If you did not create an account, no further action is required.'));
        // };

        // VerifyEmail::$createUrlCallback = function($notifiable){
        //     return URL::temporarySignedRoute(
        //         'verification.verify',
        //         Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
        //         [
        //             'id' => $notifiable->getKey(),
        //             'hash' => sha1($notifiable->getEmailForVerification()),
        //         ]
        //     );
        // };
    }
}
