<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php if ($this->flash->has('error')) { ?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<?php echo nl2br(implode('\r\n', $this->flash->getMessages('error'))); ?>
				</div>
			<?php } elseif ($this->flash->has('notice')) { ?>
				<div class="alert alert-notice">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<?php echo nl2br(implode('\r\n', $this->flash->getMessages('notice'))); ?>
				</div>
			<?php } elseif ($this->flash->has('warning')) { ?>
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<?php echo nl2br(implode('\r\n', $this->flash->getMessages('warning'))); ?>
				</div>
			<?php } elseif ($this->flash->has('success')) { ?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<?php echo nl2br(implode('\r\n', $this->flash->getMessages('success'))); ?>
				</div>
			<?php } ?> 
		</div>
	</div>
</div>