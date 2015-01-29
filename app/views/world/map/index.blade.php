@include('layouts.header')

	<div class="fluid-grid">
		<div class="grid grid-50">
			<div class="container">
				<div id="world-map-container" class="map-container">
					<div class="tile-container" style="width: {{$map->size->width}}px; height: {{$map->size->height}}px;">
						@foreach($tiles as $tile)
							{{$tile->render()}}
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="grid grid-50">
			<div class="container">
				<header>{{{Lang::get('world.properties.title')}}}</header>

				@include('partials.error', array('errors' => $errors))

				{{Form::model($map, array('route' => array('world.store', $map->id)))}}
					@include('partials.world.map.fields', array('map' => $map))

					<div class="form-actions">
						<button type="submit" class="button">{{{Lang::get('application.action.save')}}}</button>
					</div>
				{{Form::close()}}
			</div>

			<div class="container data-container hide"></div>
		</div>
	</div>

@include('layouts.footer')