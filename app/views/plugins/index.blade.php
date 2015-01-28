@include('layouts.header')

	<div class="fluid-grid">
		<div class="grid grid-33">

			@if(empty($plugin->tiles) === false)
				<div class="container">
					<header>{{Lang::get('plugins.tiles.header')}}</header>

					<ul class="list-container">
						@foreach($plugin->tiles as $tile)
							<li>
								<header>{{{$tile->getName()}}}</header>
							</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

@include('layouts.footer')