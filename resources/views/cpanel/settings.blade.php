<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>AdminFier - Responsive Bootstrap 4 Admin, Dashboard & Project Management Template</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="{{ url('assets/plugins/themify/css/themify.css') }}" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="{{ url('assets/plugins/angular-tooltip/angular-tooltips.css') }}" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="{{ url('assets/dist/css/animate.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ url('assets/dist/css/adminfier.css') }}" rel="stylesheet">
		<link href="{{ url('assets/dist/css/adminfier-responsive.css') }}" rel="stylesheet">

		<!-- Custom styles for Color -->
		<link id="jssDefault" rel="stylesheet" href="{{ url('assets/dist/css/skins/default.css') }}">
	</head>

	<body class="fixed-nav sticky-footer blue-skin" id="page-top">
	
		<!-- ===============================
			Navigation Start
		====================================-->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
			
			<!-- Start Header -->
			<header class="header-logo">
				<a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
				<a class="navbar-brand" href="index.html">AdminFier</a>
			</header>
			<!-- End Header -->
			
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="ti-align-left"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarResponsive">
				 
				<!-- =============== Start Side Menu ============== -->
				<div class="navbar-side">
				  <ul class="navbar-nav side-navbar" id="exampleAccordion">
				  
				    <!-- Start Dashboard-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Dashboard" data-parent="#exampleAccordion">
						<i class="ti ti-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Dashboard">
						<li>
						  <a href="index.html">Dashboard</a>
						</li>
						<li>
						  <a href="index-2.html">Dashboard 2</a>
						</li>
						<li>
						  <a href="index-3.html">Dashboard 3</a>
						</li>
						<li>
						  <a href="index-4.html">Dashboard 4</a>
						</li>
					  </ul>
					</li>
					<!-- End Dashboard -->
					
					<!-- Start Advance Apps -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advance Apps">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#advance-apps" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Advance Apps</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="advance-apps">
						
						<li>
						  <a href="contact.html">Contact</a>
						</li>
						
						<li>
						  <a href="team.html">Team Member</a>
						</li>
						
						<li>
						  <a href="employee.html">Employee</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Advance Apps -->
					
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
					
					<!-- Start Chatting -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Chatting">
					  <a class="nav-link" href="chatting.html">
						<i class="ti i-cl-9 ti-comment-alt"></i>
						<span class="nav-link-text">Chatting</span>
						<span class="pull-right-container">
						  <small class="label pull-right bg-red">05</small>
						</span>
					  </a>
					</li>
					<!-- End Chatting -->
					
					<!-- Start UI Elements -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Components" data-parent="#exampleAccordion">
						<i class="ti ti-magnet"></i>
						<span class="nav-link-text">UI Components</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Components">
					  
						<li>
						  <a href="card.html">Card</a>
						</li>
						
						<li>
						  <a href="user-card.html">User Card</a>
						</li>
						
						<li>
						  <a href="simple-card.html">Simple Card</a>
						</li>
						
						<li>
						  <a href="icons.html">Icons</a>
						</li>
						
						<li>
						  <a href="buttons.html">Buttons</a>
						</li>
						
						<li>
						  <a href="modals.html">Modals</a>
						</li>
						
						<li>
						  <a href="tooltip-popover.html">Tooltip & Popover</a>
						</li>
						
						<li>
						  <a href="sweet-box.html">Sweet Alert</a>
						</li>
						
						<li>
						  <a href="notification.html">Notification</a>
						</li>
						
						<li>
						  <a href="slider.html">Range Slider</a>
						</li>
						
						<li>
						  <a href="friends-list.html">Friends List</a>
						</li>
						
						<li>
						  <a href="switch-button.html">switch Button</a>
						</li>
						
						<li>
						  <a href="bootstrap-ui.html">Bootstrap UI</a>
						</li>
						
					  </ul>
					</li>
					<!-- End UI Elements -->
					
					<!-- Start Advance Pages -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advance Pages">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Advance" data-parent="#exampleAccordion">
						<i class="ti ti-pencil-alt"></i>
						<span class="nav-link-text">Advance Pages</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Advance">
					  
						<li>
						  <a href="starter.html">Starter Page</a>
						</li>
						
						<li>
						  <a href="blank-page.html">Blank Page</a>
						</li>
						
						<li>
						  <a href="profile-page.html">Profile Page</a>
						</li>
						
						<li>
						  <a href="progress-bar.html">Progress Bar</a>
						</li>
						
						<li>
						  <a href="invoice-detail.html">Invoice Detail</a>
						</li>
						
						<li>
						  <a href="project-detail.html">Project Detail</a>
						</li>
						
						<li>
						  <a href="services.html">Services</a>
						</li>
						
						<li>
						  <a href="tab.html">Tab Design</a>
						</li>
						
						<li>
						  <a href="accordion.html">Accordion</a>
						</li>
						
						<li>
						  <a href="pricing.html">Pricing</a>
						</li>
						
						<li>
						  <a href="team.html">Team Page</a>
						</li>
						
						<li>
						  <a href="login.html">Login Page</a>
						</li>
						
						<li>
						  <a href="signup.html">Sign Up Page</a>
						</li>
						
						<li>
						  <a href="404.html">404 Page</a>
						</li>
						
						<li>
						  <a href="500.html">500 Page</a>
						</li>
						
					  </ul>
					</li>
					<!-- End Advance Pages -->
					
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
					
					<!-- Start Chart -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Chart">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Chart" data-parent="#exampleAccordion">
						<i class="ti ti-pie-chart"></i>
						<span class="nav-link-text">Chart</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Chart">
					  
						<li>
						  <a href="chartjs.html">Chart Js</a>
						</li>
						
						<li>
						  <a href="morris.html">Morris Chart</a>
						</li>
						
						<li>
						  <a href="float.html">Float Chart</a>
						</li>
						
						<li>
						  <a href="inline.html">Inline Chart</a>
						</li>
						
					  </ul>
					</li>
					<!-- End Charts -->
					
					<!-- Start Forms -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Form">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Form" data-parent="#exampleAccordion">
						<i class="ti ti-layout"></i>
						<span class="nav-link-text">Form</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Form">
					  
						<li>
						  <a href="basic-form.html">Basic Form</a>
						</li>
						
						<li>
						  <a href="form-addon.html">Form Addon</a>
						</li>
						
						<li>
						  <a href="form-validation.html">Form Validation</a>
						</li>
						
						<li>
						  <a href="form-mask.html">Form Mask</a>
						</li>
						
						<li>
						  <a href="form-dropzone.html">File Dropzone</a>
						</li>
						
						<li>
						  <a href="form-wizard.html">Form Wizard</a>
						</li>
						
					  </ul>					  
					</li>
					<!-- End Forms -->
					
					<!-- Start Table -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Table">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#table" data-parent="#exampleAccordion">
						<i class="ti ti-shopping-cart"></i>
						<span class="nav-link-text">Table</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="table">
					  
						<li>
						  <a href="basic-table.html">Basic Table</a>
						</li>
						
						<li>
						  <a href="data-table.html">Data Table</a>
						</li>
						
						<li>
						  <a href="advance-table.html">Advance Table</a>
						</li>
						
					  </ul>
					</li>
					<!-- End Table -->
					
					<!-- Start Widgets -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Widgets">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Widgets" data-parent="#exampleAccordion">
						<i class="ti ti-package"></i>
						<span class="nav-link-text">Widgets</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Widgets">
					  
						<li>
						  <a href="data-widget.html">Data Widget</a>
						</li>
						
						<li>
						  <a href="social-widget.html">Social Widget</a>
						</li>
						
						<li>
						  <a href="todo-widget.html">TODO Widget</a>
						</li>
						
					  </ul>
					</li>
					<!-- End Widgets -->
					
					<!-- Start Ecommerce -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ecommerce">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#ecommerce" data-parent="#exampleAccordion">
						<i class="ti ti-shopping-cart"></i>
						<span class="nav-link-text">Ecommerce </span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="ecommerce">
					  
						<li>
						  <a href="product-shop.html">Product Shop</a>
						</li>
						
						<li>
						  <a href="product-order.html">Product Order</a>
						</li>
						
						<li>
						  <a href="product-detail.html">Product Detail</a>
						</li>
						
						<li>
						  <a href="add-to-cart.html">Add To Cart</a>
						</li>
						
					  </ul>
					</li>
					<!-- End Ecommerce -->
					
					<!-- Start Report -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report">
					  <a class="nav-link" href="report.html">
						<i class="ti ti-bar-chart"></i>
						<span class="nav-link-text">Report</span>
					  </a>
					</li>
					<!-- End Report -->
					
					<!-- Start Settings -->
					<li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Settings">
					  <a class="nav-link" href="settings.html">
						<i class="ti ti-settings"></i>
						<span class="nav-link-text">Settings</span>
					  </a>
					</li>
					<!-- End Settings -->
					
					<!-- Start Map -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="vector-map">
					  <a class="nav-link" href="vector-map.html">
						<i class="ti ti-map-alt"></i>
						<span class="nav-link-text">Vector Map</span>
					  </a>
					</li>
					<!-- End Map -->
					
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
			  <!-- =============== End Search Bar ============== -->
			  
			  <!-- =============== Header Rightside Menu ============== -->
			  <ul class="navbar-nav ml-auto">
			  
				<!-- Messages -->
				<li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle mr-lg-3 a-topbar__nav a-nav" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-email"></i>
						<span class="a-nav__link-badge a-badge a-badge--pink">3</span>
						<span class="hidden-lg hidden-md mrg-l-10">New Notification</span>
					 </a>
					 <div class="dropdown-menu animated flipInX" aria-labelledby="messagesDropdown">
						<div class="top-header-dropdown text-center pink-bg">
							<span class="a-dropdown--title">3 New</span>
							<span class="a-dropdown--subtitle">User Messages</span>
						</div>
						<div class="ground-list ground-hover-list" id="message-box">
							<div class="ground ground-list-single">
								<a href="#">
									<img class="ground-avatar" src="{{ url('assets/dist/img/user-1.jpg') }}" alt="...">
									<span class="profile-status bg-online pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">Online</span>
								</div>
							</div>
							
							<div class="ground ground-list-single">
								<a href="#">
									<img class="ground-avatar" src="{{ url('assets/dist/img/user-2.jpg') }}" alt="...">
									<span class="profile-status bg-offline pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">10 Min Ago</span>
								</div>
							</div>
							
							<div class="ground ground-list-single">
								<a href="#">
									<img class="ground-avatar" src="{{ url('assets/dist/img/user-3.jpg') }}" alt="...">
									<span class="profile-status bg-working pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">20 Min Ago</span>
								</div>
							</div>
							
							<div class="ground ground-list-single">
								<a href="#">
									<img class="ground-avatar" src="{{ url('assets/dist/img/user-4.jpg') }}" alt="...">
									<span class="profile-status bg-busy pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">18 Min Ago</span>
								</div>
							</div>
							
							<div class="ground ground-list-single">
								<a href="#">
									<img class="ground-avatar" src="{{ url('assets/dist/img/user-5.jpg') }}" alt="...">
									<span class="profile-status bg-online pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">Online</span>
								</div>
							</div>
						</div>
						 <a class="dropdown-item view-all" href="#">View all Messages</a>
					</div>
				</li>
				<!-- End Messages -->
				
				<!-- Notification -->
				<li class="nav-item dropdown">
				
					<a class="nav-link dropdown-toggle mr-lg-3 a-topbar__nav a-nav" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-bell"></i>
						<span class="a-nav__link-badge a-badge a-badge--accent a-animate-blink">6</span>
						<span class="hidden-lg hidden-md mrg-l-10">New Notification</span>
					</a>
					  
					<div class="dropdown-menu animated flipInX" aria-labelledby="alertsDropdown">
						<div class="top-header-dropdown text-center accent-bg">
							<span class="a-dropdown--title">6 New</span>
							<span class="a-dropdown--subtitle">User Notifications</span>
						</div>
						
						<div class="ground-list ground-hover-list" id="notification-box">
							<div class="ground ground-list-single">
								<a href="#">
									<div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Check New Admin Dashboard..</small>
									<span class="small">Just Now</span>
								</div>
							</div>
								
							<div class="ground ground-list-single">
								<a href="#">
									<div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">You can Customize..</small>
									<span class="small">02 Min Ago</span>
								</div>
							</div>
								
							<div class="ground ground-list-single">
								<a href="#">
									<div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Need Responsive Business Tem...</small>
									<span class="small">10 Min Ago</span>
								</div>
							</div>
								
							<div class="ground ground-list-single">
								<a href="#">
									<div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Next Meeting on Tuesday..</small>
									<span class="small">15 Min Ago</span>
								</div>
							</div>
								
							<div class="ground ground-list-single">
								<a href="#">
									<div class="btn-circle-40 btn-purple"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">You can Change Your Pass..</small>
									<span class="small">18 Min Ago</span>
								</div>
							</div>
						</div>
						<a class="dropdown-item view-all" href="#">View all Notifications</a>
					</div>
				</li>
				<!-- End Notification -->
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mr-lg-0 user-img a-topbar__nav a-nav" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="{{ url('assets/dist/img/user-10.jpg') }}" alt="user-img" width="36" class="img-circle">
					</a>
				  
					<ul class="dropdown-menu dropdown-user animated flipInX" aria-labelledby="userDropdown">
						<li class="top-header-dropdown green-bg">
							<div class="header-user-pic">
								<img src="{{ url('assets/dist/img/user-10.jpg') }}" alt="user-img" width="36" class="img-circle">
							</div>
							<div class="header-user-det">
								<span class="a-dropdown--title">Daniel Dilver</span>
								<span class="a-dropdown--subtitle">UI / UX Expert</span>
							</div>
						</li>
						<li><a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a></li>
						<li><a class="dropdown-item" href="#"><i class="ti-wallet"></i> My Balance</a></li>
						<li><a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a></li>
						<li><a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a></li>
						<li><a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
				</li>
			  </ul>
			  <!-- =============== End Header Rightside Menu ============== -->
			</div>
			<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
		</nav>
		<!-- =====================================================
		                    End Navigations
		======================================================= -->
		
		<!-- =========================================================
		Content Wrapper 
		========================================================== -->
		<div class="content-wrapper">
			<div class="container-fluid">
			
				<!-- Title & Breadcrumbs-->
				<div class="row page-breadcrumbs">
					<div class="col-md-12 align-self-center">
						<h4 class="theme-cl">Settings</h4>
					</div>
				</div>
				<!-- Title & Breadcrumbs-->
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="row">
								<!-- col-md-6 -->
								<div class="col-md-6 col-12">
								
									<div class="form-group">
										<div class="contact-thumb">
											<img src="{{ url('assets/dist/img/user-1.jpg') }}" class="img-circle img-responsive" alt="">
										</div>
									</div>
									
									<div class="col-md-12">
									
										<div class="row">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" placeholder="Daniel">
												</div>
											</div>
											
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" placeholder="Duke">
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label>Password</label>
											<input type="text" class="form-control" placeholder="***********">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label>Email</label>
											<input type="text" class="form-control" placeholder="danielduke@gmail.com">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label>Phone</label>
											<input type="text" class="form-control" placeholder="985 485 75895">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label>Address</label>
											<input type="text" class="form-control" placeholder="#253 Joken Sliteer Shuit QCH12">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label>Nation</label>
											<input type="text" class="form-control" placeholder="Canada">
										</div>
									</div>
								</div>
								
								<!-- col-md-6 -->
								<div class="col-md-6 col-12 padd-top-20">
									
									<!-- col-md-12 -->
									<div class="col-md-12">
									
										<div class="row">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Gender</label>
													<select class="custom-select mb-2 form-control">
														<option selected="" value="Choose...">Gender</option>
														<option value="1">Male</option>
														<option value="2">Female</option>
														<option value="3">Other</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Language</label>
													<select class="custom-select mb-2 form-control">
														<option selected="" value="Choose...">English</option>
														<option value="1">English</option>
														<option value="2">French</option>
														<option value="3">Other</option>
													</select>
												</div>
											</div>
										</div>
										
									</div>
									<!-- col-md-12 -->
									
									<!-- col-md-12 -->
									<div class="col-md-12">
										<div class="form-group">
											<label>Date Of Birth</label>
											<input type="text" class="form-control" placeholder="Canada">
										</div>
									</div>
									<!-- col-md-12 -->
									
									<!-- col-md-12 -->
									<div class="col-md-12">
									
										<div class="row">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Facebook</label>
													<input type="text" class="form-control" placeholder="https://facebook.com/daniel">
												</div>
											</div>
											
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Twitter</label>
													<input type="text" class="form-control" placeholder="https://twitter.com/daniel">
												</div>
											</div>
										</div>
										
									</div>
									<!-- col-md-12 -->
									
									<!-- col-md-12 -->
									<div class="col-md-12">
									
										<div class="row">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Linkedin</label>
													<input type="text" class="form-control" placeholder="https://linkedin.com/daniel">
												</div>
											</div>
											
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label>Google+</label>
													<input type="text" class="form-control" placeholder="+Daniel">
												</div>
											</div>
										</div>
										
									</div>
									<!-- col-md-12 -->
									
									<!-- col-md-12 -->
									<div class="col-md-12">
										<div class="form-group">
											<label>Slogan</label>
											<input type="text" class="form-control" placeholder="World Most Popular Software Development Industry">
										</div>
									</div>
									<!-- col-md-12 -->
									
									<!-- col-md-12 -->
									<div class="col-md-12">
									
										<label>Payment Methode</label>	
										<div class="row">
		
											<div class="col-md-4 col-12">
												<div class="form-group">
													
													<div class="payment-box">
													
														<div class="padd-10">
															<img src="{{ url('assets/dist/img/paypal.png') }}" class="fl-left width-30" alt="" />
															<h5 class="mb-0">Paypal</h5>
															<small>daniel..@gmai</small>
														</div>
														
														<div class="pay-box-footer bt-1">
															<a href="#" data-toggle="tooltip" data-original-title="Remove" class="theme-cl font-13 fl-right">Remove</a>
														</div>
														
													</div>
													
												</div>
											</div>
											
											<div class="col-md-4 col-12">
												<div class="form-group">
													
													<div class="payment-box">
													
														<div class="padd-10">
															<img src="{{ url('assets/dist/img/visa.png') }}" class="fl-left width-30" alt="" />
															<h5 class="mb-0">Visa..456</h5>
															<small>Expire 26/22</small>
														</div>
														
														<div class="pay-box-footer bt-1">
															<a href="#" data-toggle="tooltip" data-original-title="Remove" class="theme-cl font-13 fl-right">Remove</a>
														</div>
														
													</div>
													
												</div>
											</div>
											
											<div class="col-md-4 col-12">
												<div class="form-group">
													
													<div class="payment-box">
													
														<div class="padd-10">
															<img src="{{ url('assets/dist/img/mastercard.png') }}" class="fl-left width-30" alt="" />
															<h5 class="mb-0">Master..256</h5>
															<small>Expire 26/22</small>
														</div>
														
														<div class="pay-box-footer bt-1">
															<a href="#" data-toggle="tooltip" data-original-title="Remove" class="theme-cl font-13 fl-right">Remove</a>
														</div>
														
													</div>
													
												</div>
											</div>
											
										</div>
										
									</div>
									<!-- col-md-12 -->
									
									<!-- col-md-12 -->
									<div class="col-md-12">
										<div class="form-group">
											<a href="" class="btn outline-secondary" data-toggle="tooltip" data-original-title="Add Payment Method">
												<i class="ti-credit-card"></i> Add Payment Method
											</a>
										</div>
									</div>
									<!-- col-md-12 -->
									
								</div>
								
							</div>
							
						</div>
					</div>
				</div>

			</div>  
			<!-- /.content-wrapper-->
			
			<!-- Footer -->
			<footer class="sticky-footer">
			  <div class="container">
				<div class="text-center">
				  <small class="font-15">Copyright © AdminFier Made With <i class="fa fa-heart cl-danger"></i> In India</small>
				</div>
			  </div>
			</footer>
			<!-- /Footer -->
			
			<!-- Switcher Start -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
				<div class="rightMenu-scroll">
				
					<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large theme-bg">Setting Pannel <i class="ti-close"></i></button>
					<div class="right-ch-sideBar" id="side-scroll">
						<div class="user-box">
						
							<div class="profile-img">
								<img src="{{ url('assets/dist/img/user-7.jpg') }}" alt="user">
								<!-- this is blinking heartbit-->
								<div class="notify setp"> <span class="heartbit"></span> <span class="point"></span> </div>
							</div>
							<div class="profile-text">
								<h4>Daniel Dax</h4>
								 <a href="#" class="bg-info-light"><i class="ti-settings"></i></a>
								 <a href="#" class="bg-warning-light"><i class="ti-email"></i></a>
								 <a href="#" class="bg-success-light"><i class="ti-headphone"></i></a>
								 <a href="#" class="bg-danger-light"><i class="ti-power-off"></i></a>
							</div>
							
							<div class="tabbable-line">
							
								<ul class="nav nav-tabs ">
								
									<li class="active">
										<a class="bg-primary-light" href="#options" data-toggle="tab">
										<i class="ti-palette"></i> </a>
									</li>
									
									<li>
										<a class="bg-danger-light" href="#notification" data-toggle="tab">
										<i class="ti-bell"></i> </a>
									</li>
									
									<li>
										<a class="bg-success-light" href="#all-messages" data-toggle="tab">
										<i class="ti-comment-alt"></i> </a>
									</li>
									
								</ul>
								
								<div class="tab-content">
								
									<!-- Option Tab -->
									<div class="tab-pane active" id="options">
										
										<ul id="themecolors" class="m-t-20">
											<li><a href="javascript:void(0)" data-skin="red-skin" class="default-theme">1</a></li>
											<li><a href="javascript:void(0)" data-skin="green-skin" class="green-theme">2</a></li>
											<li><a href="javascript:void(0)" data-skin="blue-skin" class="blue-theme">3</a></li>
											<li><a href="javascript:void(0)" data-skin="yellow-skin" class="yellow-theme">4</a></li>
											<li><a href="javascript:void(0)" data-skin="purple-skin" class="purple-theme">5</a></li>
											<li><a href="javascript:void(0)" data-skin="cyan-skin" class="cyan-theme">6</a></li>
											<li><a href="javascript:void(0)" data-skin="red-skin-light" class="default-light-theme working">7</a></li>
											<li><a href="javascript:void(0)" data-skin="green-skin-light" class="green-light-theme">8</a></li>
											<li><a href="javascript:void(0)" data-skin="blue-skin-light" class="blue-light-theme">9</a></li>
											<li><a href="javascript:void(0)" data-skin="yellow-skin-light" class="yellow-light-theme">10</a></li>
											<li><a href="javascript:void(0)" data-skin="purple-skin-light" class="purple-light-theme">11</a></li>
											<li><a href="javascript:void(0)" data-skin="cyan-skin-light" class="cyan-light-theme ">12</a></li>
										</ul>
										
									</div>
									
									<!-- Active User -->
									<div class="tab-pane" id="notification">
									
										<div class="ground-list ground-hover-list">
											<div class="ground ground-list-single">
												<a href="#">
													<div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Check New Admin Dashboard..</small>
													<span class="small">Just Now</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">You can Customize..</small>
													<span class="small">02 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Need Responsive Business Tem...</small>
													<span class="small">10 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Next Meeting on Tuesday..</small>
													<span class="small">15 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<div class="btn-circle-40 btn-purple"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">You can Change Your Pass..</small>
													<span class="small">18 Min Ago</span>
												</div>
											</div>
										</div>
										
									</div>
									
									<!-- All Messages -->
									<div class="tab-pane" id="all-messages">
									
										<div class="ground-list ground-hover-list">
											<div class="ground ground-list-single">
												<a href="#">
													<img class="ground-avatar" src="{{ url('assets/dist/img/user-1.jpg') }}" alt="...">
													<span class="profile-status bg-online pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">Online</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<img class="ground-avatar" src="{{ url('assets/dist/img/user-2.jpg') }}" alt="...">
													<span class="profile-status bg-offline pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">10 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<img class="ground-avatar" src="{{ url('assets/dist/img/user-3.jpg') }}" alt="...">
													<span class="profile-status bg-working pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">20 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<img class="ground-avatar" src="{{ url('assets/dist/img/user-4.jpg') }}" alt="...">
													<span class="profile-status bg-busy pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">18 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="#">
													<img class="ground-avatar" src="{{ url('assets/dist/img/user-5.jpg') }}" alt="...">
													<span class="profile-status bg-online pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">Online</span>
												</div>
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
			<!-- /Switcher -->
			
			<!-- Scroll to Top Button-->  
			<a class="scroll-to-top rounded cl-white theme-bg" href="#page-top">
			  <i class="ti-angle-double-up"></i>
			</a>

			<!-- Bootstrap core JavaScript-->
			<script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
			<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
			
			<!-- Core plugin JavaScript-->
			<script src="{{ url('assets/plugins/jquery-easing/jquery.easing.min.js') }}"></script>
			
			 <!-- Slick Slider Js -->
			<script src="{{ url('assets/plugins/slick-slider/slick.js') }}"></script>
			
			<!-- Slim Scroll -->
			<script src="{{ url('assets/plugins/slim-scroll/jquery.slimscroll.min.js') }}"></script>
			
			<!-- Angular Tooltip -->
			<script src="{{ url('assets/plugins/angular-tooltip/angular.js') }}"></script>
			<script src="{{ url('assets/plugins/angular-tooltip/angular-tooltips.js') }}"></script>
			<script src="{{ url('assets/plugins/angular-tooltip/index.js') }}"></script>
			
			<!-- Custom scripts for all pages-->
			<script src="{{ url('assets/dist/js/adminfier.js') }}"></script>
			<script src="{{ url('assets/dist/js/jQuery.style.switcher.js') }}"></script>
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}
				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>

			<script>
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>
			
			<script>
			  $('.dropdown-toggle').dropdown()
			  </script>
			
	  </div>
	  <!-- Wrapper -->
	  
	</body>
</html>
