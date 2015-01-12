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
	protected $appends = array('coordinates');

	/**
	 * Properties, die nicht ueber die Massenzuweisung befuellt werden duerfen
	 *
	 * var array
	 */
	protected $guarded = array();

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
		$return	= array(
			'x' =>  $this->x * $size,
			'y' =>  $this->y * $size
		);

		return ArrayHelper::toObject($return);
	}
}