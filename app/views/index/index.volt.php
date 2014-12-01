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
	
	<div class="container">
		<div class="jumbotron">
			<h1>Welcome!</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore iusto, illo veritatis soluta! Quam eum nulla, laudantium officia eveniet aliquid.
			</p>
			<?php echo $this->tag->linkTo(array(array('for' => 'register_route'), 'Sign Up!', 'class' => 'btn btn-primary btn-lg')); ?>
		</div>
	</div>
	

</body>
</html>