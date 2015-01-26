<?php
namespace App\Exceptions\World;

class Map extends \App\Exceptions\Application {

	/**
	 * map not found
	 *
	 * @var const int
	 */
	const NOT_FOUND = 1;

	/**
	 * map not valid
	 *
	 * @var const int
	 */
	const NOT_VALID = 2;
}