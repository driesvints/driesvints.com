<?php namespace Dries\Content;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['content_loader'] = $this->app->share(function($app)
		{
			return new ContentLoader($app['config'], $app['files']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('content_loader');
	}

}
