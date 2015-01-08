<?php

class WorldTile extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'world_tiles';

	/**
	 * Variablen die ohne Datenbankspalte in die Datenbank geschrieben werden sollen
	 *
	 * var array
	 */
	protected $appends = array('coordinates', 'center');

	/**
	 * Liefert den Mittelpunkt wenn toArray oder toJson aufgerufen wird
	 *
	 * @return array
	 */
	public function getCenterAttribute() {
		return $this->getCenter();
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
		$size 	= Config::get('world.tile.size');
		$center = $this->getCenter();
		$return	= array();

		for($i = 0; $i <= 6; $i++) {
			$angle 		= 2 * pi() / 6 * $i;
			$return[]	= $center->x + $size * cos($angle);
			$return[]	= $center->y + $size * sin($angle);
		}

		return $return;
	}

	/**
	 * liefert den Mittelpunkt einer Kachel
	 *
	 * @return object Object mit X- und Y-Koordinate
	 */
	public function getCenter() {
		$size 	= Config::get('world.tile.size');
		$width	= $size * 2;
		$height	= sqrt(3) / 2 * $width;

		$offset = 0;
		if(($this->x % 2) == 0) {
			$offset = $height / 2;
		}

		return ArrayHelper::toObject(array(
			'x' => 0.75 * $width * $this->x,
			'y'	=> $height * $this->y + $offset
		));
	}
}