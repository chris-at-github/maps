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
	 * Calculate the size of the map in pixels
	 *
	 * @return array
	 */
	public function getSize() {
		return \App\Helpers\ArrayHelper::toObject(array(
			'width'		=> $this->x * \Config::get('world.tile.size'),
			'height'	=> $this->y * \Config::get('world.tile.size')
		));
	}

	/**
	 * generate and fill the tiles array
	 *
	 * @return void
	 */
	public function generateTiles() {
		if(empty($this->tiles) === true) {
			for($x = 0; $x < $this->x; $x++) {
				for($y = 0; $y < $this->y; $y++) {
					$tile = new Tile();
					$tile->x = $x;
					$tile->y = $y;

					$this->tiles[] = $tile;
				}
			}
		}
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

		} else {
			throw new \App\Exceptions\World\Map(null, \App\Exceptions\World\Map::NOT_FOUND, $map);
		}

		return $map;
	}
}