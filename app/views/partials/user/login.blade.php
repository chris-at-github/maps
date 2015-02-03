<div class="form-item">
	<div class="form-label"><label for="username">Benutzer</label></div>
	<div class="form-field">{{Form::text('username', null, array('id' => 'username'))}}</div>
</div>

<div class="form-item">
	<div class="form-label"><label for="password">Passwort</label></div>
	<div class="form-field">{{Form::password('password', array('id' => 'password'))}}</div>
</div>