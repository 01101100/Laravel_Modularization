<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$repositories = [
			'OrderRepositoryInterface'     => 'OrderRepository',
			'OrderlineRepositoryInterface' => 'OrderlineRepository',
			'ProductRepositoryInterface'   => 'ProductRepository',
		];

		foreach ($repositories as $key => $val) {
			$this->app->bind("App\\Repositories\\Interfaces\\$key", "App\\Repositories\\Eloquents\\$val");
		}
	}
}
