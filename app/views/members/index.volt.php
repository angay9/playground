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
	<?php if ($this->length($members->items) > 0) { ?>
		<?php foreach (array_chunk($members->items, 3) as $chunk) { ?>
			<div class="row">
				<?php foreach ($chunk as $member) { ?>
					<div class="col-md-4">
						<div class="media user-block">
							<?php echo $member->profile->present()->avatar(30, 30); ?>
							<a href="<?php echo $this->url->get(array('for' => 'profile_route', 'username' => $member->getUsername())); ?>">
								<?php echo $member->getUsername(); ?>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		
		<?php echo $this->partial('/partials/paginator', array('currentUser' => $currentUser, 'collection' => $members, 'route' => $this->url->get(array('for' => 'members_route', 'username' => $currentUser->getUsername())))); ?>
	<?php } else { ?>
		<h3>No members yet.</h3>
	<?php } ?>
</div>

		
	</div>

</body>
</html>