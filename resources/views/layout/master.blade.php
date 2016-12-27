<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Well drilling chart</title>
	<link rel="icon" href="{{ asset('img/raindrop.png') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	<link rel="stylesheet" href="{{ asset('css/index.css') }}?v=1.2">
	@yield("cssExtra")
</head>
<body>
	<!-- Replace with your own analytics script -->
	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-89112654-1', 'auto'); ga('send', 'pageview');</script>
	<!-- End analytics script -->

	<ul id="r_electric" class="dropdown-content">
		<li><a href="#!">Potencial</a></li>
		<li><a href="#!">Resistividad</a></li>		
	</ul>
	<nav>
		<div class="nav-wrapper teal darken-3">
			<a href="{{ url('/') }}" class="brand-logo"><i class="icon_menu material-icons">multiline_chart</i>Gráficas</a>
			<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>      
			<ul class="right hide-on-med-and-down">
				<li><a href="{{ url('penetration_rate') }}">Velocidad de penetración</a></li>				
				<li><a href="#!">Viscosidad de lodos</a></li>
				<li><a href="{{ url('/lithology-data') }}">Litología</a></li>
				<li><a class="dropdown-button" href="#!" data-activates="r_electric">Registro eléctrico<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			<ul class="side-nav" id="mobile">				
				<li><a href="{{ url('penetration_rate') }}">Velocidad de penetración</a></li>
				<li><a href="#!">Viscosidad de lodos</a></li>
				<li><a href="{{ url('/lithology-data') }}">Litología</a></li>								
				<li><a class="subheader">Registro eléctrico</a></li>
				<li><a href="#!">Potencial</a></li>
				<li><a href="#!">Resistividad</a></li>
			</ul>
		</div>
	</nav>

	@yield("cuerpo")
	

	<!--JS-->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<script>var path = '{{ url('/') }}';</script>
	<script src="{{ asset('js/master.js') }}"></script>
	@yield("jsExtra")
</body>
</html>