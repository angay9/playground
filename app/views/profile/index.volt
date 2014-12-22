{% extends "layouts/main.volt" %}

{% block content %}
<div class="container">
	<div class="row">
		{% if (user.getId() == currentUser.getId()) %}
			<div class="col-lg-6 col-xs-12 col-lg-offset-3 clearfix">
				{{ form(['for':'profile_route', 'username': currentUser.getUsername()], 'method': 'post') }}
				<!-- Body -->
				<div class="form-group">
					<label class="control-label" for="body">What's on your mind?</label>
					{{ form.render('body', ['class': 'form-control']) }}
						{{ form.render('id') }}
						{{ form.messages('body') }}
				</div>

				<!-- Post -->
				<div class="form-group pull-right">
					{{ form.render('csrf') }}
					<input type="submit" value="Post" class="btn  btn-sm btn-primary">
					<a href="{{ url(['for': 'profile_route', 'username': currentUser.getUsername() ]) }}" class="btn btn-sm btn-default">Cancel</a>
				</div>
				{{ endForm() }}
			</div>
		{% endif %}
	</div>
	<div class="row">
		<div class="col-lg-6 col-xs-12 col-lg-offset-3">
			
			{% if statuses.items|length > 0 %}
				{% for status in statuses.items %}
					<div class="media">
						<div class="media-heading">
							{% if status.user.getId() == currentUser.getId() %}
								<div class="pull-right clearfix media-actions">
									<a href="{{ url(['for': 'edit_status_route', 'username': currentUser.getUsername(), 'id': status.getId()]) }}" class="pull-left action-icon"> <i class="fa fa-pencil"></i>
									</a>
									{{ form(['for': 'delete_status_route', 'username': currentUser.getUsername()], 'method': 'post', 'class': 'pull-left') }}
										{{ deleteStatusForm.render('id', ['value' : status.getId() ]) }}
										{{ deleteStatusForm.render('csrf') }}
									<button type="submit" class="close action-icon">&times;</button>
									{{ endForm() }}
								</div>
							{% endif %}	
							{{ status.getUpdatedAt() }}
						</div>
						<div class="media-body">{{ status.getBody() }}</div>
					</div>
				{% endfor %}
				{{ partial('/partials/paginator', ['currentUser' : currentUser, 
					'collection' : statuses, 
					'route': url(['for': 'profile_route', 'username': currentUser.getUsername() ]) ]) 
				}}
			
			{% else %}
				<h3>A user has no statuses yet</h3>
			{% endif %}
		</div>
	</div>
</div>
{% endblock %}