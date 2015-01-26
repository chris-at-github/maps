@include('layouts.header')

	@if(isset($error) === true)
		<div class="message message-error">{{{$error}}}</div>
	@endif

	<div class="fluid-grid">
		<div class="grid grid-50">
			<div class="container">
				<header>{{{Lang::get('world.index.title')}}}</header>
				@if(empty($maps) === false)
					<ul class="list-container">
						@foreach($maps as $map)
							<li>
								<header>{{{$map->name}}}</header>
								<div class="align-right">
									<a href="{{route('world.index', array('map' => $map->id))}}" class="button">{{{Lang::get('application.action.load')}}}</a>
								</div>
							</li>
						@endforeach
					</ul>
				@endif

			</div>
		</div>
		<div class="grid grid-50">
			<div class="container">
				<header>{{{Lang::get('world.properties.title')}}}</header>

				@include('partials.error', array('errors' => $errors))

				{{Form::open(array('route' => array('world.store')))}}
					@include('partials.world.map.fields')

					<div class="form-actions">
						<button type="submit" class="button">{{{Lang::get('application.action.save')}}}</button>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</div>

@include('layouts.footer')