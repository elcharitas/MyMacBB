@extends('cpanel.layout')
@section('content')
		<div class="content-wrapper">
			<div class="container-fluid">
			
				<!-- row -->
				<div class="card-group mb-4">
					
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 col-12">
									<div class="float-right">
										<i class="ti-user cl-primary font-25"></i>
									</div>
									<h4 class="mb-0">470</h4>
									<span>New Users</span>
								</div>
								<div class="col-12">
									<div class="progress mt-3 mb-1" style="height: 6px;">
										<div class="progress-bar bg-blue" role="progressbar" style="width:90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
									</div>
									<div class="text-muted f12">
										<span>Progress</span>
										<span class="float-right">80%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 col-12">
									<div class="float-right">
										<i class="ti-shopping-cart-full cl-danger font-25"></i>
									</div>
									<h4 class="mb-0">Order Placed</h4>
									<span>110 New Order Placed</span>
								</div>
								<div class="col-12">
									<div class="progress mt-3 mb-1" style="height: 6px;">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 65%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
									</div>
									<div class="text-muted f12">
										<span>Progress</span>
										<span class="float-right">65%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 col-12">
									<div class="float-right">
										<i class="ti-medall cl-warning font-25"></i>
									</div>
									<h4 class="mb-0">$2,874</h4>
									<span>Monthly Profits</span>
								</div>
								<div class="col-12">
									<div class="progress mt-3 mb-1" style="height: 6px;">
										<div class="progress-bar bg-warning" role="progressbar" style="width:72%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
									</div>
									<div class="text-muted f12">
										<span>Progress</span>
										<span class="float-right">72%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 col-12">
									<div class="float-right">
										<i class="ti-briefcase cl-success font-25"></i>
									</div>
									<h4 class="mb-0">512</h4>
									<span>Delivery Processing</span>
								</div>
								<div class="col-12">
									<div class="progress mt-3 mb-1" style="height: 6px;">
										<div class="progress-bar bg-success" role="progressbar" style="width:85%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
									</div>
									<div class="text-muted f12">
										<span>Progress</span>
										<span class="float-right">85%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- /row -->
				
				<!-- row -->
				<div class="row">
				
					<!-- Area Chart -->
					<div class="col-md-8 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">Area Chart</h4>
							</div>
							<div class="card-body">
								<div class="chart" id="revenue-chart" style="height: 300px;"></div>
							</div>
						</div>
					</div>
					
					<!-- Donut Chart -->
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">Donut Chart</h4>
							</div>
							<div class="card-body">
								<ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 cl-inverse"></i> 12 Sales</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 cl-purple"></i> 20 Order</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 cl-success"></i> 200 Store</h5>
                                    </li>
                                </ul>
								<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
							</div>
						</div>	
					</div>
					
				</div>
				<!-- /.row -->
				
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-sm-6 mb-4">
						<div class="social-box facebook">
							<i class="fa fa-facebook"></i>
							<ul>
							  <li>
								<strong>89k</strong>
								<span>friends</span>
							  </li>
							  <li>
								<strong>459</strong>
								<span>feeds</span>
							  </li>
							</ul>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6 mb-4">
						<div class="social-box twitter">
							<i class="fa fa-twitter"></i>
							<ul>
							  <li>
								<strong>973k</strong>
								<span>followers</span>
							  </li>
							  <li>
								<strong>1.792</strong>
								<span>tweets</span>
							  </li>
							</ul>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6 mb-4">
						<div class="social-box linkedin">
							<i class="fa fa-linkedin"></i>
							<ul>
							  <li>
								<strong>500+</strong>
								<span>contacts</span>
							  </li>
							  <li>
								<strong>292</strong>
								<span>feeds</span>
							  </li>
							</ul>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6 mb-4">
						<div class="social-box google-plus">
							<i class="fa fa-google-plus"></i>
							<ul>
							  <li>
								<strong>894</strong>
								<span>followers</span>
							  </li>
							  <li>
								<strong>92</strong>
								<span>circles</span>
							  </li>
							</ul>
						</div>
					</div>
					
				</div>
				<!-- ./row -->
				
				<!-- row -->
				<div class="row">
				
					<!-- Area Chart -->
					<div class="col-md-8 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">Contact list</h4>
							</div>
							<div class="card-body padd-0">
								<div class="table-responsive">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>Name</th>						
												<th>Phone</th>
												<th>Email</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td><a href="#"><img src="assets/dist/img/user-1.jpg" class="avatar img-circle" alt="Avatar">Ryan D. Davis</a></td>                      
												<td>626-566-4904</td>
												<td>davisryan@gmail.com</td>
												<td>
													<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
													<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
												</td>
											</tr>
											
											<tr>
												<td><a href="#"><img src="assets/dist/img/user-2.jpg" class="avatar img-circle" alt="Avatar">Maura T. Lopez</a></td>                      
												<td>626-586-2504</td>
												<td>Denton, NY 10958</td>
												<td>
													<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
													<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
												</td>
											</tr>
											
											<tr>
												<td><a href="#"><img src="assets/dist/img/user-3.jpg" class="avatar img-circle" alt="Avatar">James C. Calhoun</a></td>
												<td>726-698-4104</td>
												<td>calhoun15@gmail.com</td> 							
												<td>
													<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
													<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
												</td>                        
											</tr>
											
											<tr>
												<td><a href="#"><img src="assets/dist/img/user-4.jpg" class="avatar img-circle" alt="Avatar">Susan D. White</a></td>
												<td>826-566-6874</td>
												<td>whitesusan@gmail.com</td>
												<td>
													<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
													<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
												</td>
											</tr>
											
											<tr>
												<td><a href="#"><img src="assets/dist/img/user-5.jpg" class="avatar img-circle" alt="Avatar">Jacob C. Slaugh</a></td>                      
												<td>624-578-3987</td>
												<td>slaughjac@gmail.com</td>
												<td>
													<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
													<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Donut Chart -->
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h6>Friends</h6>
								<a href="#" class="show-more" title=""><i class="ti-arrow-right"></i></a>
							</div>
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
				<!-- /.row -->

			</div>  
			<!-- /.content-wrapper -->
@endsection