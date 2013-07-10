<?php namespace Content;

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

		$this->app['content_manager'] = $this->app->share(function($app)
		{
			return new ContentManager;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('content_loader', 'content_manager');
	}

}
