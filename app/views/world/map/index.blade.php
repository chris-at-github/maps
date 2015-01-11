@include('layouts.header')

	<div id="world-map-container" class="map-container">
		<div class="tile-container" style="width: {{$map->size->width}}px; height: {{$map->size->height}}px;">
			@foreach($tiles as $tile)
				<div class="tile" style="top: {{$tile->coordinates->y}}px; left: {{$tile->coordinates->x}}px;"></div>
			@endforeach
		</div>
	</div>

@include('layouts.footer')