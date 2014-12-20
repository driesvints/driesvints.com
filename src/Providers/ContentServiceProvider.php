<?php
namespace Dries\Providers;

use Dries\Content\Manager;
use Dries\Content\Markdown\LeagueCommonMarkParser;
use Illuminate\Support\ServiceProvider;
use Kurenai\Document;
use Kurenai\DocumentParser;
use League\CommonMark\CommonMarkConverter;

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
            $markdownParser = new DocumentParser(function() {
                return new Document(new LeagueCommonMarkParser(new CommonMarkConverter()));
            });

            return new Manager($app['config']->get('content'), $app['files'], $markdownParser);
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
