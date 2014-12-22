{% extends "layouts/main.volt"  %}
{% block content %}
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ul class="nav nav-tabs">
					<li role="presentation" class=""><a href="#a1"  data-toggle="tab">Home</a></li>
					<li role="presentation" class="active"><a href="#a2" data-toggle="tab">Profile</a></li>
					<li role="presentation"><a href="#a3"  data-toggle="tab">Messages</a></li>
				</ul>
				<div class="tab-content">
					<div id="a1" class="tab-pane">
						
					</div>
					<div id="a2" class="tab-pane active">
						<h3 class="text-center">Current avatar: </h3>
						<div class="text-center">
							{{ currentUser.profile.present().avatar(500, 500) }}
						</div>
						{{ form(['for': 'save_profile_settings_route', 'username': currentUser.getUsername() ], 'method': 'post', 'enctype': "multipart/form-data") }}
							<div class="form-group">
								<label for="avatar" class="control-label">Please choose a file (square size) : </label>
								{{ form.render('avatar') }}
								{{ form.messages('avatar') }}
							</div>
							<div class="form-group text-right">
								{{ form.render('csrf') }}
								<input type="submit" value="Save" class="btn btn-primary">
							</div>
						{{ endform() }}
					</div>
					<div id="a3" class="tab-pane">
						CC
					</div>	
				</div>
				
			</div>
		</div>
	</div>
{% endblock %}