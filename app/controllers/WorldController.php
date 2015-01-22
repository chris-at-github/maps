<?php

class WorldController extends ApplicationController {

	public function index(World $world = null)	{
		if($world === null) {
			return Redirect::route('world.wizard');
		}

		return View::make('world.map.index')
			->with('world', $world)
			->with('tiles', $world->getTiles());
	}

	public function wizard() {
	}

	public function save($id = null) {
		$world 			= new World();
		$arguments	= Input::all();

		$validator = Validator::make($arguments, array(
			'name'	=> 'required|email'
		));

		if($validator->fails() === true) {
		  return Redirect::back()
		  	->withInput()
		  	->withErrors($validator->messages());
		}
		// if($id !== null) {
		// 	$world = World::find($id);
		// }

		// $world->fill($arguments);

		// if($world->save() === true) {
		// 	return Redirect::route('world.index', array('world' => $world->id));
		// }
	}
}