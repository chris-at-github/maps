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
	 * Properties, die nicht ueber die Massenzuweisung befuellt werden duerfen
	 *
	 * var array
	 */
	protected $guarded = array();

	/**
	 * instance to tile plugin
	 *
	 * @var \App\Plugins\TileBootstrap
	 */
	protected $plugin;

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