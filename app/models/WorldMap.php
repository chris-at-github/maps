<?php

class WorldMap extends Eloquent {
	public function getTiles() {
		$tiles = array();

		for($x = 1; $x <= 3; $x++) {
			for($y = 1; $y <= 2; $y++) {
				$tile = new WorldTile();
				$tile->x = $x;
				$tile->y = $y;

				$tiles[] = $tile;
			}
		}

		return $tiles;
	}
}