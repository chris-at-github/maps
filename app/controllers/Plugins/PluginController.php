<?php
namespace App\Controllers\Plugins;

class PluginController extends \App\Controllers\ApplicationController {

	public function index()	{
		return \View::make('plugins.index')
			->with('plugin', new \App\Models\Plugin());
	}
}