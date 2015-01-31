@include('layouts.header')
	@include('partials.message')

	<div class="fluid-grid">
		<div class="grid grid-50">

			@if($plugin->tiles->count() !== 0)
				<div class="container">
					<header>{{Lang::get('plugins.tiles.header')}}</header>

					<ul class="list-container">
						@foreach($plugin->tiles as $key => $tile)
							<li>
								<header>{{{$tile->name}}}</header>

								<div class="align-right">
									@if($tile->installed === true)

									@else
										<a href="{{route('plugin.install', ['key' => $key])}}" class="button">{{{Lang::get('application.action.install')}}}</a>
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