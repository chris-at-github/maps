@include('layouts.header')

	<div class="fluid-grid">
		<div class="grid grid-50">
			<div class="container">
				<div id="world-map-container" class="map-container">
					<div class="tile-container" style="width: {{$world->size->width}}px; height: {{$world->size->height}}px;">
						@foreach($tiles as $tile)
							<div class="tile" data-x="{{$tile->x}}" data-y="{{$tile->y}}" style="top: {{$tile->coordinates->y}}px; left: {{$tile->coordinates->x}}px;"></div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="grid grid-50">
			<div class="container">
				<header>{{{Lang::get('world.properties.title')}}}</header>

				@if($errors->any())
					<ul class="message message-error">
						@foreach($errors->getMessages() as $error)
							<li>{{$error[0]}}</li>
						@endforeach
					</ul>
				@endif

				{{Form::model($world, array('route' => array('world.store', $world->id)))}}
					<div class="form-item">
						<div class="form-label"><label for="world-name">{{{Lang::get('application.global.name')}}}:</label></div>
						<div class="form-field">{{Form::text('name', null, array('id' => 'world-name'))}}</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="button">{{{Lang::get('application.action.save')}}}</button>
					</div>
				{{Form::close()}}
			</div>

			<div class="container data-container hide"></div>
		</div>
	</div>

@include('layouts.footer')