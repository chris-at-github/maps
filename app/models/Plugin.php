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
	public function getDirectory($type = null) {
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
	public function getByType($type) {
		$plugins 			= array();
		$filesystem 	= new Filesystem();
		$directories 	= $filesystem->directories($this->getDirectory($type));

		foreach($directories as $directory) {
			$namespace 	= ucfirst($type) . '\\' . $filesystem->name($directory);
			$plugin 		= $this->load($namespace);

			if($plugin !== null) {
				$plugins[] = $plugin;
			}
		}

		return $plugins;
	}

	/**
	 * load a plugin from the directory and create an instance
	 *
	 * @param string $namespace
	 * @return \App\Plugins\Bootstrap
	 */
	public function load($namespace) {
		$filesystem = new Filesystem();
		$directory 	= $this->getDirectory() . DIRECTORY_SEPARATOR . $namespace;
		$bootstrap	= sprintf(\Config::get('plugins.bootstrap'), $filesystem->name($directory));

		if($filesystem->exists($directory . DIRECTORY_SEPARATOR . 'Bootstrap.php') === true) {
			$filesystem->requireOnce($directory . DIRECTORY_SEPARATOR . 'Bootstrap.php');

			return new $bootstrap();
		}

		return null;
	}
}