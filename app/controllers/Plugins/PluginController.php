<?php
namespace App\Controllers\Plugins;

class PluginController extends \App\Controllers\ApplicationController {

	public function index()	{

		$bootstrap = new \App\Plugins\Bootstrap();

		$plugin = new \App\Models\Plugin();
		$plugin->getPluginsFormDirectory(\App\Models\Plugin::TYPE_TILES);

		return \View::make('plugins.index');
	}
}