<?php
namespace App\Models\World;

class MapRenderer extends \App\Models\Application {

	/**
	 * variables which not in database but render when toJson or toArray is called
	 *
	 * @var array
	 */
	protected $appends = array('size');

	/**
	 * number of tiles in x path
	 *
	 * @var int
	 */
	protected $x = 0;

	/**
	 * number of tiles in y path
	 *
	 * @var int
	 */
	protected $y = 0;

	/**
	 * Calculate the size of the map in pixels
	 *
	 * @return array
	 */
	public function getSize() {
		return \App\Helpers\Arr::toObject(array(
			'width'		=> $this->x * \Config::get('world.tile.size'),
			'height'	=> $this->y * \Config::get('world.tile.size')
		));
	}

	/**
	 * Return an array with a set of tiles
	 *
	 * @return array
	 */
	public function getTiles() {
		if(empty($this->tiles) === true) {
			$this->generateTiles();
		}

		return $this->tiles;
	}
}