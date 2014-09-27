<?php
namespace Dries\Providers;

use Dries\Markdown\PhpMarkdownParser;
use Illuminate\Support\ServiceProvider;
use Kurenai\Document;
use Kurenai\DocumentParser;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('markdown.parser', function() {
            return new DocumentParser(function() {
                return new Document(new PhpMarkdownParser);
            });
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['markdown.parser'];
    }
}
