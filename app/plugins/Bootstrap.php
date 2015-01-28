<?php
namespace App\Plugins;

class Bootstrap extends \Eloquent {

	/**
	 * properties that not allowed to fill about mass assignment
	 *
	 * var array
	 */
	protected $guarded = array();

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

	 /**
	  * return the html code for this plugin
	  *
	  * @return string
	  */
	 public function render() {
	 	return null;
	 }
}