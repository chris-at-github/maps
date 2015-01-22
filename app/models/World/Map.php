<?php
namespace App\Models\World;

class Map extends \App\Models\Application {

	/**
	 * database table name
	 *
	 * @var string
	 */
	protected $table = 'world';

	/**
	 * Variablen die ohne Datenbankspalte in die Datenbank geschrieben werden sollen
	 *
	 * @var array
	 */
	protected $appends = array('size');

	/**
	 * rules for validation before saving the model
	 *
	 * @var array
	 */
	protected $rules = array(
		'name'	=> 'required'
	);

	/**
	 * Liefert die Koordinaten wenn toArray oder toJson aufgerufen wird
	 *
	 * @return array
	 */
	public function getSizeAttribute() {
		return $this->getSize();
	}

	/**
	 * Calculate the size of the map in pixels
	 *
	 * @return array
	 */
	public function getSize() {
		return \App\Helpers\ArrayHelper::toObject(array(
			'width'		=> \Config::get('world.map.size.x') * \Config::get('world.tile.size'),
			'height'	=> \Config::get('world.map.size.y') * \Config::get('world.tile.size')
		));
	}

	/**
	 * Return an array with a set of tiles
	 *
	 * @return array
	 */
	public function getTiles() {
		$tiles = array();

		for($x = 0; $x < \Config::get('world.map.size.x'); $x++) {
			for($y = 0; $y < \Config::get('world.map.size.y'); $y++) {
				$tile = new Tile();
				$tile->x = $x;
				$tile->y = $y;

				$tiles[] = $tile;
			}
		}

		return $tiles;
	}
}