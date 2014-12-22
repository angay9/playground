<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Network</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				{% if auth.check() %}
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							{{ currentUser.getUsername() }}
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{ url(['for': 'profile_route', 'username': currentUser.getUsername()]) }}">
									<i class="fa fa-user"></i>
									Profile
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{ url(['for': 'logout_route']) }}">
									<i class="fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				{% else %}
					<li>
						{{ link_to(['for': 'login_route'], 'Login') }}
					</li>
				{% endif %}
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>