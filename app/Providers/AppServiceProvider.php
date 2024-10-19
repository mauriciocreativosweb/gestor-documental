<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
            ->view('Mail.Auth2FEmailVerify',['url' => $url]);
        });

        Passport::enablePasswordGrant();
        passport::tokensExpireIn(now()->addDays(15));
    }
}
