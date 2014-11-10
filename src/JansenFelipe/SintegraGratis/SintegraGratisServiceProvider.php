<?php

namespace JansenFelipe\SintegraGratis;

use Illuminate\Support\ServiceProvider;

class SintegraGratisServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->package('JansenFelipe/sintegra-gratis');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('sintegra_gratis', function() {
            return new \JansenFelipe\SintegraGratis\SintegraGratis;
        });
    }

}
