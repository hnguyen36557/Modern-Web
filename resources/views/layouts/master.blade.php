<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" text="text/css" href="{{ URL::to('src/css/main.css') }}">
	@yield('styles')
</head>
<body>
	@include('includes.header')
	<div class="main">
		@yield('content')
	</div>
</body>
</html>