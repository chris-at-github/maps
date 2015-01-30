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
	 * is this plugin already register in the database
	 *
	 * @var boolean $installed
	 */
	 protected $installed = false;

	/**
	 * namespace of this plugin
	 *
	 * @var string $namespace
	 */
	 protected $namespace;

	 /**
	  * returns the name of the plugin
	  *
	  * @return string
	  */
	 public function getNameAttribute($name) {
	 	if(empty($name) === true) {
	 		$name = $this->getName();
	 	}

	 	return $name;
	 }

	/**
	 * Gets the is this plugin already register in the database.
	 *
	 * @return boolean $installed
	 */
	public function getInstalledAttribute() {
		return $this->installed;
	}

	/**
	 * Sets the is this plugin already register in the database.
	 *
	 * @param boolean $installed $installed the installed
	 * @return self
	 */
	public function setInstalledAttribute($installed) {
		$this->installed = $installed;
		return $this;
	}

	/**
	 * Gets the namespace of the plugin
	 *
	 * @return string $namespace
	 */
	public function getNamespaceAttribute() {
		return $this->namespace;
	}

	/**
	 * Sets the namespace
	 *
	 * @param string $namespace
	 * @return self
	 */
	public function setNamespaceAttribute($namespace) {
		$this->namespace = $namespace;
		return $this;
	}

	/**
	 * returns the name of the plugin
	 *
	 * @return string
	 */
	public function getName() {
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