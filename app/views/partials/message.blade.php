@if($errors->any())
	<ul class="message message-error">
		@foreach($errors->getMessages() as $error)
			<li>{{$error[0]}}</li>
		@endforeach
	</ul>
@endif

@if(isset($notice) === true)
	<div class="message message-notice">{{{$notice}}}</div>
@endif

@if(isset($error) === true)
	<div class="message message-error">{{{$error}}}</div>
@endif