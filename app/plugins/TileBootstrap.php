<?php
namespace App\Plugins;

class TileBootstrap extends Bootstrap {

	/**
	 * x coordinate
	 *
	 * @var int
	 */
	protected $x = 0;

	/**
	 * y coordinate
	 *
	 * @var int
	 */
	protected $y = 0;

	/**
	 * returns the x coordinate
	 *
	 * @return int
	 */
	public function getXAttribute() {
		return (int) $this->x;
	}

	/**
	 * set the x coordinate
	 *
	 * @param mixed value of x
	 * @return void
	 */
	public function setXAttribute($x) {
		$this->x = $x;
	}

	/**
	 * returns the y coordinate
	 *
	 * @return int
	 */
	public function getYAttribute() {
		return (int) $this->y;
	}

	/**
	 * set the y coordinate
	 *
	 * @param mixed value of y
	 * @return void
	 */
	public function setYAttribute($y) {
		$this->y = $y;
	}

	/**
	 * Liefert die Koordinaten wenn toArray oder toJson aufgerufen wird
	 *
	 * @return array
	 */
	public function getCoordinatesAttribute() {
		return $this->getCoordinates();
	}

	/**
	 * Liefert die Coordinaten fuer das Hexagon
	 *
	 * @return array
	 */
	public function getCoordinates() {
		$size 	= \Config::get('world.tile.size');
		$return	= array(
			'x' =>  $this->x * $size,
			'y' =>  $this->y * $size
		);

		return \App\Helpers\ArrayHelper::toObject($return);
	}

	/**
	 * render the html code of this tile
	 *
	 * @return string
	 */
	public function render() {
		return '<div class="tile tile-green" data-x="' . $this->x . '" data-y="' . $this->y . '" style="top: ' . $this->coordinates->y . 'px; left: ' . $this->coordinates->x . 'px;"></div>';
	}
}