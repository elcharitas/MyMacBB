
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
				
					<button onclick="$('#rightMenu').hide()" class="w3-bar-item w3-button w3-large theme-bg navbar"> &nbsp; <i class="ti-close"></i></button>
					<div class="right-ch-sideBar" id="side-scroll">
						<div class="user-box">
						
							<div class="profile-img">
								<img src="assets/dist/img/user-7.jpg" alt="user">
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
													<img class="ground-avatar" src="assets/dist/img/user-1.jpg" alt="...">
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
													<img class="ground-avatar" src="assets/dist/img/user-2.jpg" alt="...">
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
													<img class="ground-avatar" src="assets/dist/img/user-3.jpg" alt="...">
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
													<img class="ground-avatar" src="assets/dist/img/user-4.jpg" alt="...">
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
													<img class="ground-avatar" src="assets/dist/img/user-5.jpg" alt="...">
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
			<a class="scroll-to-top rounded cl-white theme-bg mr-2 mb-5" href="#page-top">
			  <i class="ti-angle-double-up"></i>
			</a>

			<!-- Bootstrap core JavaScript-->
			<script src="assets/plugins/jquery/jquery.min.js"></script>
			<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			
			<!-- Core plugin JavaScript-->
			<script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>
			
			 <!-- Slick Slider Js -->
			<script src="assets/plugins/slick-slider/slick.js"></script>
			
			<!-- Slim Scroll -->
			<script src="assets/plugins/slim-scroll/jquery.slimscroll.min.js"></script>
			
			<!-- Angular Tooltip -->
			<script src="assets/plugins/angular-tooltip/angular.js"></script>
			<script src="assets/plugins/angular-tooltip/angular-tooltips.js"></script>
			<script src="assets/plugins/angular-tooltip/index.js"></script>
			
			<!-- Morris.js charts -->
		    <script src="assets/plugins/raphael/raphael.min.js"></script>
		    <script src="assets/plugins/morris.js/morris.min.js"></script>
			
			<!-- Custom Chart JavaScript -->
		    <script src="assets/dist/js/custom/dashboard/dashboard-2.js"></script>
			
			<!-- Custom scripts for all pages -->
			<script src="assets/dist/js/adminfier.js"></script>
			<script src="assets/dist/js/jQuery.style.switcher.js"></script>
			
		</div>
	</body>
</html>