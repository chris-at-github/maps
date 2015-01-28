<?php
namespace App\Plugins;

class Bootstrap extends \Eloquent {

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