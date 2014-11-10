<?php

namespace JansenFelipe\SintegraPHP;

use Illuminate\Support\ServiceProvider;

class SintegraPHPServiceProvider extends ServiceProvider {

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
        $this->package('JansenFelipe/sintegra-php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('sintegra_php', function() {
            return new \JansenFelipe\SintegraPHP\SintegraPHP;
        });
    }

}
