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
		if(\Input::has('username') === true && \Input::has('password') === true) {
			\Session::put('user', 1);

			return \Redirect::route('game.index');
		}

		return \View::make('game.login');
	}
}