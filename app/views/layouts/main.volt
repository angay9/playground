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
	{{ partial('/partials/navbar') }}

	<!-- Flash messages -->
	{{ partial('/partials/flash') }}

	<!-- Content -->
	{% block content %}
	
	{% endblock %}
</body>
</html>