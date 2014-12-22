a:3:{i:0;s:1052:"<!DOCTYPE html>
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
		";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:4:"
		";s:4:"file";s:71:"E:\xampp\htdocs\playground\app\config/../../app/views/layouts/main.volt";s:4:"line";i:32;}}i:1;s:31:"		
	</div>

</body>
</html>";}