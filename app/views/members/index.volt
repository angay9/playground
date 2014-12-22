{% extends "layouts/main.volt" %}
{% block content %}

<div class="container">
	{% if members.items|length > 0 %}
		{% for chunk in array_chunk(members.items, 3) %}
			<div class="row">
				{% for member in chunk %}
					<div class="col-md-4">
						<div class="media user-block">
							{{ member.profile.present().avatar(30, 30) }}
							<a href="{{ url(['for': 'profile_route', 'username': member.getUsername() ]) }}">
								{{ member.getUsername() }}
							</a>
						</div>
					</div>
				{% endfor %}
			</div>
		{% endfor %}
		
		{{ partial('/partials/paginator', ['currentUser' : currentUser, 
			'collection' : members, 
			'route': url(['for': 'members_route', 'username': currentUser.getUsername() ]) ]) 
		}}
	{% else %}
		<h3>No members yet.</h3>
	{% endif %}
</div>

{% endblock %}