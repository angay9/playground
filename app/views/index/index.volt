{% extends "layouts/main.volt" %}

{% block content %}
	<div class="container">
		<div class="jumbotron">
			<h1>Welcome!</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore iusto, illo veritatis soluta! Quam eum nulla, laudantium officia eveniet aliquid.
			</p>
			{{ link_to(['for': 'register_route'], 'Sign Up!', 'class': 'btn btn-primary btn-lg') }}
		</div>
	</div>
	
{% endblock %}