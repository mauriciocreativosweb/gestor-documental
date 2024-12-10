<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Laravel\Passport\Passport;
use App\Models\Company;

use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;


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
            $id = $notifiable['id'];
            $company = new Company();
            $company['userId'] = $id;
            $company['nameCompany'] = 'Cambia por el nombre de la empresa';
            $company['nit'] = 'Escribe el nit de la empresa';
            $company['numberEmployees'] = 0;
            $company['address'] = 'cambia por la dirección de tu empresa';
            $company['cellphone'] = 0000000000;
            $company['whatsapp'] = 0000000000;
            $company['legalRepresentative'] = 'Escribe tu representante legal';
            $company['webSite'] = 'Escribe la url de tu sitio web';
            $company['typology_foreigner'] = 1;
            $company['companyDescription'] = 'Escribe una descripción pequeña de tu empresa';
            $company['contactEmail'] = 'Escribe el email de tu contacto';
            $company['typePerson_foreigner'] = 1;
            $company['sector_foreigner'] = 1;
            $company['department_foreigner'] = 1;
            $company['review_foreigner'] = 1;
            $company['percent'] = 0.0;
            $company->save();

            return (new MailMessage)->view('Mail.Auth2FEmailVerify',['url' => $url]);
        });

        Passport::enablePasswordGrant();
        passport::tokensExpireIn(now()->addDays(15));
    }
}
