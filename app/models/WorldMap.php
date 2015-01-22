<?php

class WorldMap extends Eloquent {

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

	public function getSize() {
		return ArrayHelper::toObject(array(
			'width'		=> Config::get('world.map.size.x') * Config::get('world.tile.size'),
			'height'	=> Config::get('world.map.size.y') * Config::get('world.tile.size')
		));
	}

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