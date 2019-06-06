<?php

namespace Omneo\Qantas;

use GuzzleHttp;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(POSClient::class, function ($app)
        {
            list($posUrl, $posUsername, $posPassword) = [
                config('services.qantas.pos_base_url'),
                config('services.qantas.pos_username'),
                config('services.qantas.pos_password')
            ];

            if (! $posUrl || ! $posUsername || ! $posPassword) {
                throw new \Exception('You must configure a pos_base_url, pos_username and pos_password and token to use the Qantas POS client');
            }

            $client = new POSClient($posUrl);
            $client->setCredentials(
                $posUsername,
                $posPassword
            );

            return $client;
        });

        $this->app->singleton(ServiceClient::class, function ($app)
        {
            list($serviceUrl, $serviceUsername, $servicePassword) = [
                config('services.qantas.service_base_url'),
                config('services.qantas.service_username'),
                config('services.qantas.service_password')
            ];

            if (! $serviceUrl || ! $serviceUsername || ! $servicePassword) {
                throw new \Exception('You must configure a service_base_url, service_username and service_password and token to use the Qantas Service client');
            }

            $client = new ServiceClient($serviceUrl);
            $client->setCredentials(
                $serviceUsername,
                $servicePassword
            );

            return $client;
        });
    }
}
