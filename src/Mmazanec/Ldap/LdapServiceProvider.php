<?php namespace Mmazanec\Ldap;

use Illuminate\Support\ServiceProvider;

class LdapServiceProvider extends ServiceProvider {

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
	public function boot()
	{
		$this->publishes([
						dirname(__FILE__).'/../../config/ldap.php' => config_path('ldap.php'),
		], 'config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['ldap'] = $this->app->share(function($app)
		{
			return new Ldap($this->getConfig());
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Ldap', 'Mmazanec\Ldap\Facades\Ldap');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('');
	}

	/**
	 * Get ldap configuration
	 *
	 * @return array
	 */
	public function getConfig()
	{
		return $this->app['config']['ldap'];
	}

}
