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
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // VerifyEmail::toMailUsing(function ($notifiable, $url) {
        //     $spaUrl = "http://spa.test?email_verify_url=".$url;

        //     return (new MailMessage)
        //         ->subject('Verify Email Address')
        //         ->line('Click the button below to verify your email address.')
        //         ->action('Verify Email Address', $spaUrl);
        // });

        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl){

         return (new MailMessage)

        ->subject(Lang::get('Verify Email Address'))
        ->line(Lang::get('You are receiving this email to verify your email address.'))
        ->greeting(Lang::get("Hello ") . $notifiable->name)
        ->line(Lang::get('Verify Email Address Code: '). $verificationUrl)
        ->line(Lang::get('If you did not create an account, no further action is required.'));
        };

        VerifyEmail::$createUrlCallback = function($notifiable){

            $code_string = Str::random(6);
            $code = mb_strtoupper($code_string);

            $user = User::where('id', $notifiable->id)->first();

            $user->forceFill([
                'code_verify_email' => $code,
            ])->save();

            return $code ;
        };


    }
}
