<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title> 
			@section('title') 
			@show 
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Normalize.css - https://github.com/necolas/normalize.css -->
		<link href="{{ asset('css/normalize.css') }}" rel="stylesheet">

		<!-- Sentinel Blank Theme CSS -->
		<link href="{{ asset('css/sentinel-blank-theme.css') }}" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>

	<body>
		<div id="container">

			<!-- Navbar --> 
			<nav id="sentinel-navbar">		
				<div class="sentinel-navbar-header">
		        	<h1><a class="sentinel-nav" href="{{ URL::route('home') }}">Sentinel</a></h1>
		        </div>
		        <ul id="sentinel-navbar-right">
		           	@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
						<li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/users') }}">Users</a></li>
						<li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/groups') }}">Groups</a></li>
					@endif
		            @if (Sentry::check())
					<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}/{{ Session::get('userId') }}">{{ Session::get('email') }}</a></li>
					<li><a href="{{ URL::to('logout') }}">Logout</a></li>
					@else
					<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::to('login') }}">Login</a></li>
					<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="{{ URL::to('users/create') }}">Register</a></li>
					@endif
		        </ul>
			</nav>
			<!-- ./ navbar -->

			<!-- Container -->
			<div class="sentinel-content">
				<!-- Notifications -->
				@include('layouts/notifications')
				<!-- ./ notifications -->

				<!-- Content -->
				@yield('content')
				<!-- ./ content -->
			</div>

		</div>
		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('js/jquery-2.0.2.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script> 
		<!-- Thanks to Zizaco for the Restfulizer script.  http://zizaco.net  -->
	</body>
</html>