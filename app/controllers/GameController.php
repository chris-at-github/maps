<?php
namespace App\Controllers;

class GameController extends ApplicationController {
	public function index() {
		if(\Session::has('user') === false) {
			return \Redirect::route('game.login');
		}

		return \View::make('game.index');
	}

	public function login() {
		return \View::make('game.login');
	}
}