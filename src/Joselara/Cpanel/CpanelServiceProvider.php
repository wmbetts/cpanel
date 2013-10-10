<?php namespace JoseLara\Cpanel;

use Illuminate\Support\ServiceProvider;

class CpanelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['cpanel'] = $this->app->share(function($app)
        {
            $host = $app['config']['joselara/cpanel::host'];
            $user = $app['config']['joselara/cpanel::user'];
            $password = $app['config']['joselara/cpanel::auth'];

            return new Cpanel($host, $user, $password);
        });
	}

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('Joselara/cpanel');
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}