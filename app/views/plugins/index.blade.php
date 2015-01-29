@include('layouts.header')

	<div class="fluid-grid">
		<div class="grid grid-50">

			@if(empty($plugin->tiles) === false)
				<div class="container">
					<header>{{Lang::get('plugins.tiles.header')}}</header>

					<ul class="list-container">
						@foreach($plugin->tiles as $tile)
							<li>
								<header>{{{$tile->name}}}</header>

								<div class="align-right">
									@if($tile->installed === true)

									@else
										<a href="{{route('plugin.install', ['namespace' => 'Tiles\TileGreen'])}}" class="button">{{{Lang::get('application.actions.install')}}}</a>
									@endif
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

@include('layouts.footer')