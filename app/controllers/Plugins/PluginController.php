<?php
namespace App\Controllers\Plugins;

class PluginController extends \App\Controllers\ApplicationController {

	public function index()	{

		$plugin = new \App\Models\Plugin();
		$plugin->getByType(\App\Models\Plugin::TYPE_TILES);

		return \View::make('plugins.index');
	}
}