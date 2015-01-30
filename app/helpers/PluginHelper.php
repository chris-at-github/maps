<?php
namespace App\Helpers;

class PluginHelper {

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