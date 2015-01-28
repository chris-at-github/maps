<?php
namespace App\Plugins;

class Bootstrap {

	/**
	 * name of plugin
	 *
	 * @var string $name
	 */
	 protected $name;

	 /**
	  * returns the name of the plugin
	  *
	  * @return string
	  */
	 public function getName() {
	 	return $this->name;
	 }
}