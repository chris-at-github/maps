<?php

class ColonyController extends ApplicationController {

	public function index()	{
		return View::make('colony.index')->with('tiles', Colony::getTiles());
	}
}