<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title> @yield('title', __('Dashboard')) :: {{ __('Control Center') }} </title>

		<!-- Bootstrap core CSS -->
		<link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="{{ url('assets/plugins/themify/css/themify.css') }}" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="{{ url('assets/plugins/angular-tooltip/angular-tooltips.css') }}" rel="stylesheet">
		
		<!-- Morris Charts CSS -->
		<link href="{{ url('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="{{ url('assets/dist/css/animate.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ url('assets/dist/css/adminfier.css') }}" rel="stylesheet">
		<link href="{{ url('assets/dist/css/adminfier-responsive.css') }}" rel="stylesheet">

		<!-- Custom styles for Color -->
		<link rel="stylesheet" href="{{ url('assets/dist/css/skins/default.css') }}">
	</head>

	<body class="fixed-nav sticky-footer yellow-skin" id="page-top">
	
		<!-- ===============================
			Navigation Start
		====================================-->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
			
			<!-- Start Header -->
			<header class="logo mx-3">
				<a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler">
				    <i class="ti-align-left"></i>
				</a>
				<a class="navbar-brand" href="/">
				    <img src="{{ url('assets/dist/img/logo.png') }}" height="30"/>
				</a>
			</header>
			<!-- End Header -->
			
			<button class="navbar-toggler navbar-toggler-right my-3" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="ti-align-left"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarResponsive">
				 
				<!-- =============== Start Side Menu ============== -->
				<div class="navbar-side">
				  <ul class="navbar-nav side-navbar" id="exampleAccordion">
				  
				    <!-- Start Dashboard-->
					<li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Dashboard" data-parent="#exampleAccordion">
						<i class="ti ti-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					  </a>
					</li>
					<!-- End Dashboard -->
					
					<!-- Start projects -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Projects">
					  <a class="nav-link" href="projects.html">
						<i class="ti i-cl-2 ti-layers"></i>
						<span class="nav-link-text">Projects</span>
						<span class="pull-right-container">
						  <small class="label pull-right bg-green">new</small>
						</span>
					  </a>
					</li>
					<!-- End Projects -->
					
					<!-- Start Messages -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#messages" data-parent="#exampleAccordion">
						<i class="ti i-cl-4 ti-desktop"></i>
						<span class="nav-link-text">Messages</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="messages">
						
						<li>
						  <a href="inbox.html">Inbox</a>
						</li>
						
						<li>
						  <a href="sent-mail.html">Sent Mail</a>
						</li>
						
						<li>
						  <a href="compose.html">Compose</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Messages -->
					
					<!-- Start invoice -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Invoice">
					  <a class="nav-link" href="invoice.html">
						<i class="ti ti-printer"></i>
						<span class="nav-link-text">Invoice</span>
						<span class="pull-right-container">
						  <small class="label pull-right bg-yellow">07</small>
						</span>
					  </a>
					</li>
					<!-- End Invoice -->
					
					<!-- Start Report -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report">
					  <a class="nav-link" href="report.html">
						<i class="ti ti-bar-chart"></i>
						<span class="nav-link-text">Report</span>
					  </a>
					</li>
					<!-- End Report -->
					
					<!-- Start Settings -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
					  <a class="nav-link" href="settings.html">
						<i class="ti ti-settings"></i>
						<span class="nav-link-text">Settings</span>
					  </a>
					</li>
					<!-- End Settings -->
					
					<!-- Start Help & Support -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Help-Support">
					  <a class="nav-link" href="help.html">
						<i class="ti ti-user"></i>
						<span class="nav-link-text">Help & Support</span>
					  </a>
					</li>
					<!-- End Help & Support -->
				  </ul>
			  </div>
			 <!-- =============== End Side Menu ============== -->
			  
			  <!-- =============== Search Bar ============== -->
			  <ul class="navbar-nav ml-left">
				<li class="nav-item">
				  <form class="form-inline my-2 my-lg-0 mr-lg-2">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">
							  <i class="ti-search"></i>
							</button>
						</span>
					  <input class="form-control" type="text" placeholder="Type In TO Search">
					</div>
				  </form>
				</li>
			  </ul>
			</div>
			<button class="w3-button w3-teal w3-xlarge w3-right" onclick="$('#rightMenu').show()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
		</nav>