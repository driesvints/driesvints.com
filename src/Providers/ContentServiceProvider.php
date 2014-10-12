<?php
namespace Dries\Providers;

use Dries\Content\Manager;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['Dries\Content\Manager'] = $this->app->share(function ($app) {
            return new Manager($app['config']->get('content'), $app['files'], $app['markdown.parser']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Dries\Content\Manager'];
    }
}
