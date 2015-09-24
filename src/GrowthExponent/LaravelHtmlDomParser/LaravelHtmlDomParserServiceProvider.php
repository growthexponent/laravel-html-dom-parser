<?php namespace GrowthExponent\LaravelHtmlDomParser;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelHtmlDomParserServiceProvider
 * @package GrowthExponent\LaravelHtmlDomParser
 */
class LaravelHtmlDomParserServiceProvider extends ServiceProvider {

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
		$this->package('growthexponent/laravel-html-dom-parser');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
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
