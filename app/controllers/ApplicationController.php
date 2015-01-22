<?php
namespace App\Controllers;

class ApplicationController extends \Controller {

	protected $layout = 'layouts.default';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {
		if($this->layout !== null) {
			$this->layout = \View::make($this->layout);
		}
	}
}