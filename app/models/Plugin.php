<?php
namespace App\Models;

use \Illuminate\Filesystem\Filesystem;

class Plugin extends Application {

	/**
	 * const plugin type tiles
	 *
	 * @var const string
	 */
	const TYPE_TILES = 'tiles';

	/**
	 * return the path to the plugin directory. if a type is given, the plugin
	 * path goes directly to the type
	 *
	 * @param string $type
	 * @return string
	 */
	public function getPluginDirectory($type = null) {
		$directory = app_path() . DIRECTORY_SEPARATOR . \Config::get('plugins.directory');

		if($type !== null) {
			$directory .= DIRECTORY_SEPARATOR . ucfirst($type);
		}

		return $directory;
	}

	/**
	 * read all plugins that stored in plugin directory form on type
	 *
	 * @param string $type
	 * @return array
	 */
	public function getPluginsFormDirectory($type) {
		$filesystem 	= new Filesystem();
		$directories 	= $filesystem->directories($this->getPluginDirectory($type));

		foreach($directories as $directory) {
			$name 			= $filesystem->name($directory);
			$bootstrap	= sprintf(\Config::get('plugins.bootstrap'), $name);

			if($filesystem->exists($directory . DIRECTORY_SEPARATOR . 'Bootstrap.php') === true) {
				$filesystem->requireOnce($directory . DIRECTORY_SEPARATOR . 'Bootstrap.php');

				$plugin = new $bootstrap();

				dd($plugin);
			}
		}
	}
}