<?php

namespace Casdr\Moneybird;

use Illuminate\Support\ServiceProvider;
use Picqer\Financials\Moneybird\Connection;
use Picqer\Financials\Moneybird\Moneybird;

class MoneybirdServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/moneybird.php' => config_path('moneybird.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/moneybird.php', 'moneybird');

        $this->app->bind('moneybird', function ($app) {
            $connection = new Connection();
            $connection->setRedirectUrl(config('moneybird.redirect_uri'));
            $connection->setClientId(config('moneybird.client_id'));
            $connection->setClientSecret(config('moneybird.client_secret'));

            if(config('moneybird.authorization_token')) {
                $connection->setAuthorizationCode(config('moneybird.authorization_token'));
            }
            if(config('moneybird.access_token')) {
                $connection->setAccessToken(config('moneybird.access_token'));
            }
            if(config('moneybird.administration_id')) {
                $connection->setAdministrationId(config('moneybird.administration_id'));
            }

            $moneybird = new Moneybird($connection);

            return $moneybird;
        });

    }

    public function provides() {
        return ['moneybird'];
    }
}
