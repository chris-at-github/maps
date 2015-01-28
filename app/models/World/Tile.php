<?php
namespace App\Models\World;

class Tile extends \App\Models\Application {

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
	 * plugin of this tile
	 *
	 * @var \App\Plugins\TileBootstrap
	 */
	protected $plugin;

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
	 * return the html code for this tile
	 *
	 * @return string
	 */
	public function render() {
		return $this->getPluginInstance()->render();
	}

	/**
	 * return the assigned tile plugin for this tile
	 *
	 * @return \App\Plugins\TileBootstrap
	 */
	protected function getPluginInstance() {
		if(isset($this->plugin) === false) {
			$this->plugin = with(new \App\Models\Plugin())->load('Tiles/TileGreen');
			$this->plugin->fill(array(
				'x'	=> $this->x,
				'y'	=> $this->y
			));
		}

		return $this->plugin;
	}
}