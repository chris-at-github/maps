<?php
namespace App\Helpers;

class Plugin {

	/**
	 * return the path to the plugin directory. if a type is given, the plugin
	 * path goes directly to the type
	 *
	 * @param string $type
	 * @return string
	 */
	public static function directory($type = null) {
		$directory = app_path() . DIRECTORY_SEPARATOR . \Config::get('plugins.directory');

		if($type !== null) {
			$directory .= DIRECTORY_SEPARATOR . ucfirst($type);
		}

		return $directory;
	}

	/**
	 * return an encoded key for a plugin
	 *
	 * @param string $namespace
	 * @return string
	 */
	public static function key($namespace) {
		return md5($namespace);
	}
}