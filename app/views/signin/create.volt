{% extends "layouts/guest.volt" %}

{% block content %}
<div class="container">
	<div class="row">
		<div class="col-md-6">
			{{ form(['for':'login_route'], 'method': 'post') }}
			<!-- Username: -->
			<div class="form-group">
				<label class="control-label" for="username">Username:</label>
				{{ form.render('username', ['class': 'form-control']) }}
				{{ form.messages('username') }}
			</div>

			<!-- Password: -->
			<div class="form-group">
				<label class="control-label" for="password">Password:</label>
				{{ form.render('password', ['class': 'form-control']) }}					
				{{ form.messages('password') }}
			</div>

			<!-- Login -->
			<div class="form-group">
				{{ form.render('csrf') }}
				<input type="submit" value="Login" class="btn btn-primary">
			</div>
			{{ endForm() }}
		</div>
	</div>
</div>

{% endblock %}