<div class="container">
	<div class="row">
		<div class="col-xs-12">
			{% if flash.has('error') %}
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ nl2br(implode("\r\n", flash.getMessages('error'))) }}
				</div>
			{% elseif flash.has('notice') %}
				<div class="alert alert-notice">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ nl2br(implode("\r\n", flash.getMessages('notice'))) }}
				</div>
			{% elseif flash.has('warning') %}
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ nl2br(implode("\r\n", flash.getMessages('warning'))) }}
				</div>
			{% elseif flash.has('success') %}
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ nl2br(implode("\r\n", flash.getMessages('success'))) }}
				</div>
			{% endif %} 
		</div>
	</div>
</div>