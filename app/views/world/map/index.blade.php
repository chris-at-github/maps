@include('layouts.header')

	<div id="world-map-container">
		<div class="tile-container">
			@foreach($tiles as $tile)
				<div class="tile" style="top: {{$tile->coordinates->y}}px; left: {{$tile->coordinates->x}}px;"></div>
			@endforeach
		</div>
	</div>

@include('layouts.footer')