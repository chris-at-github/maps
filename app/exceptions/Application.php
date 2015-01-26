<?php
namespace App\Exceptions;

class Application extends \Exception {

	/**
	 * argument(s) for description
	 *
	 * @var mixed
	 */
	protected $argument;

	/**
	 * constructor of exception
	 *
	 * @param string $message
	 * @param int $code
	 * @param mixed $argument
	 */
	public function __construct($message, $code = 0, $argument = null) {
		parent::__construct($message, $code);

		if(isset($argument) === true) {
			$this->argument = $argument;
		}
	}

	/**
	 * return the given argument
	 *
	 * @return $argument
	 */
	public function getArgument() {
		return $this->argument;
	}
}