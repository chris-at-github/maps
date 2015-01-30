<?php
namespace App\Helpers;

class Arr {
	public static function toObject($array) {
		return (object) $array;
	}
}