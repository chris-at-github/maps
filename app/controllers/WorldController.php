<?php
namespace App\Controllers;

class WorldController extends ApplicationController {

	public function index(\App\Models\World $world = null)	{
		if($world === null) {
			return \Redirect::route('world.wizard');
		}

		return \View::make('world.map.index')
			->with('world', $world)
			->with('tiles', $world->getTiles());
	}

	public function wizard() {
	}

	public function store($id = null) {
		$world 			= new \App\Models\World();
		$arguments	= \Input::all();

		if($id !== null) {
			$world = \App\Models\World::find($id);
		}

		if($world->store($arguments) === false) {
			return \Redirect::back()
				->withInput()
				->withErrors($world->errors());
		}

		return \Redirect::route('world.index', array('world' => $world->id));
	}
}