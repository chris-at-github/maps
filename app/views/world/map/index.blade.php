@include('layouts.header')

	<svg id="world-map-container"></svg>

	<script type="text/javascript">
		var tileCollection = [
			@foreach ($tiles as $tile)
				{{ $tile->toJson() }},
			@endforeach
		];
	</script>


@include('layouts.footer', array('scripts' => array('/js/world/index.js')))