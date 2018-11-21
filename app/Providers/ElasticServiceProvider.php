<?php

namespace App\Providers;

use App\Shop\Services\Elastic;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\ElasticSearchHandler;

class ElasticServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Elastic::class, function($app){
           return new Elastic(
               ClientBuilder::create()
                   ->setLogger(ClientBuilder::defaultLogger(storage_path('logs/elastic.log')))
                   ->build()
           );
        });
    }
}
