<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Network</title>
	<!-- Scripts -->
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<!-- Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body>
	<!-- Navbar -->
	<?php echo $this->partial('/partials/navbar'); ?>

	<!-- Flash messages -->
	<?php echo $this->partial('/partials/flash'); ?>

	<!-- Content -->
	
	<?php //die(var_dump($this->flash->getMessages())); ?>
	
	<div class="container">
		<div class="row ">
			<div class="col-md-6">
				<?php echo $this->tag->form(array(array('for' => 'register_route'), 'method' => 'post')); ?>
					<!-- Name: -->
					<div class="form-group">
						<label class="control-label" for="name">Name:</label>
						<?php echo $form->render('name', array('class' => 'form-control')); ?>
						
						<?php echo $form->messages('name'); ?>
					</div>
					
					<!-- Username: -->
					<div class="form-group">
						<label class="control-label" for="username">Username:</label>
						<?php echo $form->render('username', array('class' => 'form-control')); ?>
						
						<?php echo $form->messages('username'); ?>
					</div>
					
					<!-- Email: -->
					<div class="form-group">
						<label class="control-label" for="email">Email:</label>
						<?php echo $form->render('email', array('class' => 'form-control')); ?>
						
						<?php echo $form->messages('email'); ?>
					</div>

					<!-- Password: -->
					<div class="form-group">
						<label class="control-label" for="password">Password:</label>
						<?php echo $form->render('password', array('class' => 'form-control')); ?>
						
						<?php echo $form->messages('password'); ?>
					</div>
					
					<!-- Password confirmation -->
					<div class="form-group">
						<label class="control-label" for="passwordConfirmation">Password confirmation:</label>
						<?php echo $form->render('passwordConfirmation', array('class' => 'form-control')); ?>
						
						<?php echo $form->messages('passwordConfirmation'); ?>
					</div>
					
					<!-- Sing Up! -->
					<div class="form-group">
						<input type="submit" value="Sign Up!" class="btn btn-primary">
					</div>
				<?php echo $this->tag->endform(); ?>	
			</div>
		</div>
	</div>
	


</body>
</html>