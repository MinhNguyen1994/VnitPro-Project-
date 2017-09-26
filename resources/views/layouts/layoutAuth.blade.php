<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/loginAdmin.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<style type="text/css">
		body{
			background: #343C5C;
			font-family: arial;
			height: 100%;
			width: 100%;					
		}
	</style>

</head>
<body>
	<div class="login">
		<h1 id="loginTitle">@yield('title')</h1>
		@yield('body')
	</div>

</body>
</html>