<!doctype html>
<html class="no-js" lang="de">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Maps</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Ubuntu:400,500'>
	<link rel="stylesheet" href="/css/screen.css">
</head>
<body>

	<div id="page">

		@if(isset($header) === false || $header === true)
			<div id="header">
				<div id="menu-main">
					<ul class="list-inline">
						<li><a href="{{route('world.index')}}">{{Lang::get('application.navigation.world')}}</a></li>
						<li><a href="{{route('plugin.index')}}">{{Lang::get('application.navigation.plugins')}}</a></li>
					</ul>
				</div>
			</div>
		@endif

		<div id="body">