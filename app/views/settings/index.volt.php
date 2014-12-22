<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Network</title>
	<!-- Scripts -->
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.wysihtml5/0.0.2/bootstrap-wysihtml5-0.0.2.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/main.css" type="text/css">

</head>
<body>
	<!-- Navbar -->
	<?php echo $this->partial('/partials/navbar'); ?>

	<div id="wrapper">		
		<?php if ($currentUser) { ?>
			<!-- Sidemenu user panel-->
			<?php echo $this->partial('/partials/sidemenu-user-panel'); ?>
		<?php } ?>
		
		<!-- Flash messages -->
		<?php echo $this->partial('/partials/flash'); ?>
		
		<!-- Content -->
		
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
							<?php echo $currentUser->profile->present()->avatar(500, 500); ?>
						</div>
						<?php echo $this->tag->form(array(array('for' => 'save_profile_settings_route', 'username' => $currentUser->getUsername()), 'method' => 'post', 'enctype' => 'multipart/form-data')); ?>
							<div class="form-group">
								<label for="avatar" class="control-label">Please choose a file (square size) : </label>
								<?php echo $form->render('avatar'); ?>
								<?php echo $form->messages('avatar'); ?>
							</div>
							<div class="form-group text-right">
								<?php echo $form->render('csrf'); ?>
								<input type="submit" value="Save" class="btn btn-primary">
							</div>
						<?php echo $this->tag->endform(); ?>
					</div>
					<div id="a3" class="tab-pane">
						CC
					</div>	
				</div>
				
			</div>
		</div>
	</div>
		
	</div>

</body>
</html>