<?php

namespace Tale\Jade\Bridge\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Tale\Jade\Renderer;

/**
 * Provides the ability to use Jade templates in Laravel.
 *
 * {@inheritDoc}
 */
class ServiceProvider extends LaravelServiceProvider
{

    /**
     * {@inheritDoc}
     */
    public function register()
    {

        $app = $this->app;

        $app['jade.options'] = [];
        $app['jade'] = $app->share(function($app) {

            $app['jade.options'] = array_replace([
                'paths' => $app['config']['view.paths'],
                'cache_path' => $app['path.storage'].'/jade'
            ], $app['jade.options']);

            return new Renderer($app['jade.options']);
        });
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {

        return ['jade', 'jade.options'];
    }

    /**
     * {@inheritDoc}
     */
    public function boot()
    {

        $app = $this->app;

        $app['view']->addExtension('jade', 'jade', function() use($app) {

            return new Engine($app['jade']);
        });
    }
}