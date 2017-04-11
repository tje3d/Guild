<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title', config('app.name'))</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	{{-- Datatables --}}
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="{{url('css/panel/panel.css')}}">
	<link rel="stylesheet" href="{{url('css/panel/panel-purple.css')}}">
	@stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed skin-purple">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="{{route('dashboard')}}" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>K</b>TD</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img src="{{url('img/logo_white.png')}}" alt="Logo" height="40"></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{Gravatar::src(\Auth::user()->email)}}" class="user-image" alt="User Image">
								<span class="hidden-xs">{{\Auth::user()->name}}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="{{Gravatar::src(\Auth::user()->email)}}" class="img-circle" alt="User Image">
									<p>
										{{\Auth::user()->name}} - {{\Auth::user()->email}}
										<small>Member since {{\Auth::user()->created_at->format("F. Y")}}</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="{{Gravatar::src(Auth::user()->email)}}" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>{{\Auth::user()->name}} <i style="font-size: 10px">Online</i></p>
						<p style="margin-bottom: 0"><small>{{date("Y-m-d / H:i:s")}}</small></p>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				@include('layouts.sidebar-menu')
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					@yield('title')
					<small>@yield('sub-title')</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
					@yield('breadcrumb')
					{{-- <li><a href="#">Examples</a></li>
					<li class="active">Blank page</li> --}}
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				@include('components.alert-both')
				@yield('content')
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		@include('components.copyright')

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
	<!-- AdminLTE App -->
	{{-- Datatables --}}
	<script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script src="{{url('js/panel/panel.js')}}"></script>
	@stack('scripts')
</body>
</html>