<?php
namespace App\Controllers\Plugins;

class PluginController extends \App\Controllers\ApplicationController {

	public function index()	{
		return \View::make('plugins.index')
			->with('plugin', new \App\Models\Plugin());
	}

	public function install($key)	{
		$plugin 	= with(new \App\Models\Plugin())->one(array(
			'key'		=> $key,
			'type'	=> \App\Models\Plugin::TYPE_TILES
		));

		if($plugin !== null) {
			$install = new \App\Models\Plugin();
			$install->fill(array(
				'namespace' => $plugin->namespace
			));

			if($install->save() === false) {
				return \Redirect::route('plugin.index')->with('error', \Lang::get('plugins.error.install'));
			}
		}

		return \Redirect::route('plugin.index')->with('notice', \Lang::get('plugins.notice.install'));
	}
}