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
	 * collection of generated tiles
	 *
	 * @var array
	 */
	protected $tiles;

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
		if(isset($this->tiles) === false) {
			$this->tiles = array();

			for($x = 0; $x < \Config::get('world.map.size.x'); $x++) {
				for($y = 0; $y < \Config::get('world.map.size.y'); $y++) {
					$tile = new Tile();
					$tile->x = $x;
					$tile->y = $y;

					$this->tiles[] = $tile;
				}
			}
		}

		return $this->tiles;
	}

	/**
	 * save the map data in the database store the object in cache
	 *
	 * @param  array $options
	 * @return boolean
	 */
	public function save(array $options = array()) {
		if($return = parent::save($options) === true) {
			\Cache::forever($this->getCacheKey(), $this);
		}

		return $return;
	}

	/**
	 * generate an unique key for the cache
	 *
	 * @return string
	 */
	public function getCacheKey() {
		return 'world.map.' . $this->id;
	}

	/**
	 * load the map from database. if a cache entry exists the map will be load out of the cache
	 *
	 * @param mixed $id
	 * @param array $columns
	 * @return \App\Models\World\Map
	 */
	public static function find($id, $columns = array('*')) {
		$map = parent::find($id, $columns);

		if($map !== null && \Cache::has($map->getCacheKey()) === true) {
			$map = \Cache::get($map->getCacheKey());
		}

		return $map;
	}
}