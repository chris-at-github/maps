@include('layouts.header')

	<div class="fluid-grid">
		<div class="grid grid-50">
			<div class="container">
				<div id="world-map-container" class="map-container">
					<div class="tile-container" style="width: {{$map->size->width}}px; height: {{$map->size->height}}px;">
						@foreach($tiles as $tile)
							<div class="tile" data-x="{{$tile->x}}" data-y="{{$tile->y}}" style="top: {{$tile->coordinates->y}}px; left: {{$tile->coordinates->x}}px;"></div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="grid grid-50">
			<div class="container">
				<header>Kartenkonfiguration</header>

				{{Form::open(array('route' => 'map.create'))}}
					<div class="form-item">
						<div class="form-label"><label for="map-name">Kartenname:</label></div>
						<div class="form-field">{{Form::text('name', null, array('id' => 'map-name'))}}</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="button">Speichern</button>
					</div>
				{{Form::close()}}
			</div>

			<div class="container data-container hide"></div>
		</div>
	</div>

@include('layouts.footer')