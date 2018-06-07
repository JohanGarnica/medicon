<!DOCTYPE html>
<html>
<head>
	<title>Medicon - @yield('titulo')</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  	<script src="{{ asset('js/jquery.min.js') }}"></script>
  	<script src="{{ asset('js/popper.min.js') }}"></script>
  	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
  	<link rel="stylesheet" href="{{ asset('css/estilosfoot.css') }}">

</head>
<body>

	<!-- HEADER -->
	@include('front.secciones.menu')
	<!-- END HEADER -->

	@yield('contenido')

	<!-- FOOTER -->
	@include('front.secciones.footer')
	<!-- END FOOTER -->


</body>
</html>