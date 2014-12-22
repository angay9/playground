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
	
	<!-- Flash messages -->
	<?php echo $this->partial('/partials/flash'); ?>
	
	<!-- Content -->
	
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->tag->form(array(array('for' => 'login_route'), 'method' => 'post')); ?>
			<!-- Username: -->
			<div class="form-group">
				<label class="control-label" for="username">Username:</label>
				<?php echo $form->render('username', array('class' => 'form-control')); ?>
				<?php echo $form->messages('username'); ?>
			</div>

			<!-- Password: -->
			<div class="form-group">
				<label class="control-label" for="password">Password:</label>
				<?php echo $form->render('password', array('class' => 'form-control')); ?>					
				<?php echo $form->messages('password'); ?>
			</div>

			<!-- Login -->
			<div class="form-group">
				<?php echo $form->render('csrf'); ?>
				<input type="submit" value="Login" class="btn btn-primary">
			</div>
			<?php echo $this->tag->endform(); ?>
		</div>
	</div>
</div>

		

</body>
</html>