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
		  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		  
		  <!-- Custom fonts for this template -->
		  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		  
		  <!-- Custom fonts for this template -->
		  <link href="assets/plugins/themify/css/themify.css" rel="stylesheet" type="text/css">
		  
		  <!-- Page level plugin CSS -->
		  <link href="assets/dist/css/animate.css" rel="stylesheet">
		  
		  <!-- Custom styles for this template -->
		  <link href="assets/dist/css/adminfier.css" rel="stylesheet">
		  <link href="assets/dist/css/adminfier-responsive.css" rel="stylesheet">
		  
		  <!-- Custom styles for Color -->
		  <link id="jssDefault" rel="stylesheet" href="assets/dist/css/skins/default.css">
	</head>

	<body>
	
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<section class="error-page text-center">
					<h1 class="theme-cl">500</h1>
					<h3 class="theme-cl">Opps! Page Not Found</h3>
					<p>The page you are looking for can't be found.</p>
					<a href="index.html" class="btn cl-white no-br theme-bg">Go To Home Page</a>
				</section>
			</div> <!-- .login-ch-sideBar -->
		</div> <!-- .row -->
		
		
		<!-- Switcher -->
			<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin theme-cl fa fa-cog" aria-hidden="true"></i></button>
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
			  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large theme-bg">Close &times;</button>
				<div class="title-logo">
				  <img src="assets/img/logo.png" alt="" class="img-responsive">
				  <h4>Choose Your Color</h4>
			  </div>
			   <ul id="styleOptions" title="switch styling">
					<li>
						<a href="javascript: void(0)" class="cl-box cl-red" data-theme="skins/red"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box cl-green" data-theme="skins/green"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box cl-orange" data-theme="skins/orange"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box cl-blue" data-theme="skins/blue"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box cl-default" data-theme="skins/default"></a>
					</li>
				</ul>
			</div>
			<!-- /Switcher -->
			<script src="assets/plugins/jquery/jquery.min.js"></script>
			
			<script src="assets/dist/js/jQuery.style.switcher.js"></script>
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
		
	</body>
</html>
