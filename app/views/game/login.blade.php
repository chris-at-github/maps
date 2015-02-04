@include('layouts.header', array('header' => false))


		<div class="vertical-center">
			<div id="container-login" class="container">
				{{Form::open(array('route' => 'game.login'))}}
					@include('partials.user.login')

					<div class="form-actions">
						<button type="submit" class="button button-submit">Anmelden</button>
					</div>
				{{Form::close()}}
			</div>
		</div>

@include('layouts.footer')