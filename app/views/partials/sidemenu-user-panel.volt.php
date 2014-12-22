<div class="sidemenu sidemenu-right">
	<form action="" method="get" class="form form-inline">
		<div class="form-group">
			<input type="text" name="" class="form-control input-sm">
			<button type="submit" class="btn btn-sm btn-primary">Search</button>	
		</div>
	</form>
	<div class="quickmenu">
		<?php echo $currentUser->profile->present()->avatar(); ?>
	</div>
	<ul>
		<li>
			<a href="<?php echo $this->url->get(array('for' => 'profile_route', 'username' => $currentUser->getUsername())); ?>">
				<i class="fa fa-user"></i>
				Profile
			</a>
		</li>
		<li>
			<a href="#"> 
				<i class="fa fa-globe"></i>
				Friends
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fa fa-envelope"></i>
				Messages
			</a>
		</li>
		<li>
			<a href="<?php echo $this->url->get(array('for' => 'settings_route', 'username' => $currentUser->getUsername())); ?>">
				<i class="fa fa-wrench"></i>
				Settings
			</a>
		</li>
		<li>
			<a href="<?php echo $this->url->get(array('for' => 'logout_route')); ?>">
				<i class="fa fa-power-off"></i>
				Logout
			</a>
		</li>
	</ul>
</div>