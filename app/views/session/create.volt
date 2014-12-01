{% extends "layouts/main.volt" %}

{% block content %}
	<?php //die(var_dump($this->flash->getMessages())); ?>
	
	<div class="container">
		<div class="row ">
			<div class="col-md-6">
				{{ form(['for':'register_route'], 'method': 'post') }}
					<!-- Name: -->
					<div class="form-group">
						<label class="control-label" for="name">Name:</label>
						{{ form.render('name', ['class': 'form-control']) }}
						
						{{ form.messages('name') }}
					</div>
					
					<!-- Username: -->
					<div class="form-group">
						<label class="control-label" for="username">Username:</label>
						{{ form.render('username', ['class': 'form-control']) }}
						
						{{ form.messages('username') }}
					</div>
					
					<!-- Email: -->
					<div class="form-group">
						<label class="control-label" for="email">Email:</label>
						{{ form.render('email', ['class': 'form-control']) }}
						
						{{ form.messages('email') }}
					</div>

					<!-- Password: -->
					<div class="form-group">
						<label class="control-label" for="password">Password:</label>
						{{ form.render('password', ['class': 'form-control']) }}
						
						{{ form.messages('password') }}
					</div>
					
					<!-- Password confirmation -->
					<div class="form-group">
						<label class="control-label" for="passwordConfirmation">Password confirmation:</label>
						{{ form.render('passwordConfirmation', ['class': 'form-control']) }}
						
						{{ form.messages('passwordConfirmation') }}
					</div>
					
					<!-- Sing Up! -->
					<div class="form-group">
						<input type="submit" value="Sign Up!" class="btn btn-primary">
					</div>
				{{ endForm() }}	
			</div>
		</div>
	</div>
	

{% endblock %}