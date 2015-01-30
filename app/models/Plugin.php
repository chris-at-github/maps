<?php
namespace App\Models;

use \Illuminate\Filesystem\Filesystem;

class Plugin extends Application {

	/**
	 * database table name
	 *
	 * @var string
	 */
	protected $table = 'plugin';

	/**
	 * const plugin type tiles
	 *
	 * @var const string
	 */
	const TYPE_TILES = 'tiles';

	/**
	 * read all plugins that stored in plugin directory
	 *
	 * @param array $options
	 * @return array
	 */
	public function collect($options = array()) {
		$plugins 			= new \Illuminate\Support\Collection();
		$filesystem 	= new Filesystem();
		$directories 	= $filesystem->directories(\App\Helpers\Plugin::directory($options['type']));

		foreach($directories as $directory) {
			$namespace 	= ucfirst($options['type']) . '\\' . $filesystem->name($directory);
			$plugin 		= $this->load($namespace);

			if($plugin !== null) {
				$plugins->put(\App\Helpers\Plugin::key($namespace), $plugin);
			}
		}

		return $plugins;
	}

	/**
	 * read one plugin and return an instance to the bootstrap class
	 *
	 * @param array $options
	 * @return \App\Plugins\Bootstrap
	 */
	public function one($options = array()) {
		$plugins = $this->collect($options);

		if(isset($options['key']) === true) {

		}
	}

	/**
	 * load a plugin from the directory and create an instance
	 *
	 * @param string $namespace
	 * @return \App\Plugins\Bootstrap
	 */
	public function load($namespace) {
		$filesystem = new Filesystem();
		$directory 	= \App\Helpers\Plugin::directory() . DIRECTORY_SEPARATOR . $namespace;
		$bootstrap	= sprintf(\Config::get('plugins.bootstrap'), $filesystem->name($directory));

		if($filesystem->exists($directory . DIRECTORY_SEPARATOR . 'Bootstrap.php') === true) {
			$filesystem->requireOnce($directory . DIRECTORY_SEPARATOR . 'Bootstrap.php');

			return new $bootstrap();
		}

		return null;
	}

	/**
	 * Alias for collect(type => TILES)
	 *
	 * @return array
	 */
	public function getTilesAttribute() {
		return $this->collect(array(
			'type' => self::TYPE_TILES
		));
	}
}