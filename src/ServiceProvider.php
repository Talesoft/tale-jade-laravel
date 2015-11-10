<?php

namespace Tale\Jade\Bridge\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Tale\Jade\Renderer;

class ServiceProvider extends LaravelServiceProvider
{

    public function register()
    {

        $app = $this->app;

        $app['jade.options'] = [];
        $app['jade'] = $app->share(function($app) {

            $app['jade.options'] = array_replace([
                'adapter' => 'file',
                'adapterOptions' => [
                    'path' => $app['path.storage'].'/jade'
                ]],
                $app['jade.options']
            );

            return new Renderer($app['jade.options']);
        });
    }

    public function provides()
    {

        return ['jade', 'jade.options'];
    }

    public function boot()
    {

        $app = $this->app;

        $app['view']->addExtension('jade', 'jade', function() use($app) {

            return new Engine($app['jade']);
        });
    }
}