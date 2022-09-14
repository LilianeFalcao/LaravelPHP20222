<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            Storage::extends('google', function ($app, $config){
                $options= [];
                if (!empty($config ['teamDriveId'] ?? null )){
                    $options['teamDriveId'] = $config['teamDriveId'];
                }
                $client->setClientId($config['clientId']);
                $client->setClientaSecret($config['clientSecret']);
                $client->refreshToken($config['refreshToken']);
                $client->setAccessToken($config['AccessToken']);

                $service = new \Google\Service\Drive($client);
                $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, $config['folder'] ?? '/', $options);
                $service = new \League\Flysystem\Flysystem($adapter);

                return new Illuminate\Flysystem\FlysystemAdapter($driver, $adapter);
            });
        }catch(\Exception $e){
            dd($e);
        } 
    }
}
