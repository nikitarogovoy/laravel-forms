<?php namespace BenAllfree\Trackable;

use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider {

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
      __DIR__.'/../../publish/config/forms.php' => config_path('forms.php'),
    ]);
    $this->loadViewsFrom(__DIR__.'/views', 'forms');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
    $this->mergeConfigFrom(
        __DIR__.'/../../publish/config/forms.php', 'forms'
    );
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
