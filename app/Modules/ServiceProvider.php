<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-18 23:34:27
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-18 23:34:50
 */

namespace App\Modules;
use File;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {
	public function boot() {
		$listModule = array_map('basename', File::directories(__DIR__));
		foreach ($listModule as $module) {
			if (file_exists(__DIR__ . '/' . $module . '/routes.php')) {
				include __DIR__ . '/' . $module . '/routes.php';
			}
			if (is_dir(__DIR__ . '/' . $module . '/Views')) {
				$this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
			}
		}
	}
	public function register() {}
}