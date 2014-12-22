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
		<?php if (($user->getId() == $currentUser->getId())) { ?>
			<div class="col-lg-6 col-xs-12 col-lg-offset-3 clearfix">
				<?php echo $this->tag->form(array(array('for' => 'profile_route', 'username' => $currentUser->getUsername()), 'method' => 'post')); ?>
				<!-- Body -->
				<div class="form-group">
					<label class="control-label" for="body">What's on your mind?</label>
					<?php echo $form->render('body', array('class' => 'form-control')); ?>
						<?php echo $form->render('id'); ?>
						<?php echo $form->messages('body'); ?>
				</div>

				<!-- Post -->
				<div class="form-group pull-right">
					<?php echo $form->render('csrf'); ?>
					<input type="submit" value="Post" class="btn  btn-sm btn-primary">
					<a href="<?php echo $this->url->get(array('for' => 'profile_route', 'username' => $currentUser->getUsername())); ?>" class="btn btn-sm btn-default">Cancel</a>
				</div>
				<?php echo $this->tag->endform(); ?>
			</div>
		<?php } ?>
	</div>
	<div class="row">
		<div class="col-lg-6 col-xs-12 col-lg-offset-3">
			
			<?php if ($this->length($statuses->items) > 0) { ?>
				<?php foreach ($statuses->items as $status) { ?>
					<div class="media">
						<div class="media-heading">
							<?php if ($status->user->getId() == $currentUser->getId()) { ?>
								<div class="pull-right clearfix media-actions">
									<a href="<?php echo $this->url->get(array('for' => 'edit_status_route', 'username' => $currentUser->getUsername(), 'id' => $status->getId())); ?>" class="pull-left action-icon"> <i class="fa fa-pencil"></i>
									</a>
									<?php echo $this->tag->form(array(array('for' => 'delete_status_route', 'username' => $currentUser->getUsername()), 'method' => 'post', 'class' => 'pull-left')); ?>
										<?php echo $deleteStatusForm->render('id', array('value' => $status->getId())); ?>
										<?php echo $deleteStatusForm->render('csrf'); ?>
									<button type="submit" class="close action-icon">&times;</button>
									<?php echo $this->tag->endform(); ?>
								</div>
							<?php } ?>	
							<?php echo $status->getUpdatedAt(); ?>
						</div>
						<div class="media-body"><?php echo $status->getBody(); ?></div>
					</div>
				<?php } ?>
				<?php echo $this->partial('/partials/paginator', array('currentUser' => $currentUser, 'collection' => $statuses, 'route' => $this->url->get(array('for' => 'profile_route', 'username' => $currentUser->getUsername())))); ?>
			
			<?php } else { ?>
				<h3>A user has no statuses yet</h3>
			<?php } ?>
		</div>
	</div>
</div>
		
	</div>

</body>
</html>