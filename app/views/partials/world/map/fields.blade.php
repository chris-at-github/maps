<div class="form-item">
	<div class="form-label"><label for="map-name">{{{Lang::get('application.global.name')}}}:</label></div>
	<div class="form-field">{{Form::text('name', null, array('id' => 'map-name'))}}</div>
</div>

<div class="fluid-grid">
	<div class="grid grid-50 form-item">
		<div class="form-label"><label for="map-x">{{{Lang::get('world.properties.x')}}}:</label></div>
		<div class="form-field">
			@if(empty($map->x) === true)
				{{Form::text('x', null, array('id' => 'map-x'))}}
			@else
				{{Form::text('x', null, array('id' => 'map-x', 'class' => 'disabled', 'readonly' => 'readonly'))}}
			@endif
		</div>
	</div>
	<div class="grid grid-50 form-item">
		<div class="form-label"><label for="map-y">{{{Lang::get('world.properties.y')}}}:</label></div>
		<div class="form-field">
			@if(empty($map->y) === true)
				{{Form::text('y', null, array('id' => 'map-y'))}}
			@else
				{{Form::text('y', null, array('id' => 'map-y', 'class' => 'disabled', 'readonly' => 'readonly'))}}
			@endif
		</div>
	</div>
</div>