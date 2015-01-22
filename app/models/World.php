<?php
class World extends Eloquent {

	/**
	 * database table name
	 *
	 * @var string
	 */
	protected $table = 'world';

	/**
	 * black list for mass assignment
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * Variablen die ohne Datenbankspalte in die Datenbank geschrieben werden sollen
	 *
	 * var array
	 */
	protected $appends = array('size');

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
		return ArrayHelper::toObject(array(
			'width'		=> Config::get('world.map.size.x') * Config::get('world.tile.size'),
			'height'	=> Config::get('world.map.size.y') * Config::get('world.tile.size')
		));
	}

	/**
	 * Return an array with a set of tiles
	 *
	 * @return array
	 */
	public function getTiles() {
		$tiles = array();

		for($x = 0; $x < Config::get('world.map.size.x'); $x++) {
			for($y = 0; $y < Config::get('world.map.size.y'); $y++) {
				$tile = new WorldTile();
				$tile->x = $x;
				$tile->y = $y;

				$tiles[] = $tile;
			}
		}

		return $tiles;
	}
}