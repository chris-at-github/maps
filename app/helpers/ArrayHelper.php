<?php
namespace App\Helpers;

class ArrayHelper {
	public static function toObject($array) {
		return (object) $array;
	}
}