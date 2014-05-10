<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<br/>
				<h3 class="content-title pull-left">Agency Profile</h3>
			</div>
		</div>
	</div>
</div>
<!-- /PAGE HEADER -->
<!-- USER PROFILE -->
<div class="row">
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border">
			<div class="box-title">
				<h4><i class="fa fa-user"></i></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs user-profile">
					<ul class="nav nav-tabs">
					   <li><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Account</span></a></li>
					   <li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
					</ul>
					<div class="tab-content">
					   <!-- OVERVIEW -->
					   <div class="tab-pane fade in active" id="pro_overview">
						  <div class="row">
							<!-- PROFILE PIC -->
							<div class="col-md-3">
								<div class="list-group">
								  <li class="list-group-item zero-padding">
									<center><img alt="" class="img-responsive" src="http://t2.tagstat.com/im/people/silhouette_m_300.png" style="margin:3px;"></center>
								  </li>
								  <div class="list-group-item profile-details">
										<h2><?php echo $agency->agency_name; ?></h2>
										<span class="span">
								 </div>
								  <a href="#" class="list-group-item"><?php echo AgencyTypes::getAgencyType($agency->agency_type); ?></a>
								  <a href="#" class="list-group-item"><?php echo ($agency->location_scope == "")?"Location Range Not Yet Registered":$agency->location_scope; ?></a>
								</div>														
							</div>
							<!-- /PROFILE PIC -->
							<!-- PROFILE DETAILS -->
							<div class="col-md-9">
								<!-- ROW 1 -->
								<div class="row">
									<div class="col-md-7 profile-details">																
										<h3>My Skills</h3>
										<div class="row">
											<div class="col-md-4 text-center">
												<div id="pie_1" class="piechart" data-percent="76">
													<span class="percent"></span>
												</div>
												<div class="skill-name">Graphic Design</div>
											</div>
											<div class="col-md-4 text-center">
												<div id="pie_2" class="piechart" data-percent="82">
													<span class="percent"></span>
												</div>
												<div class="skill-name">Web Design</div>
											</div>
											<div class="col-md-4 text-center">
												<div id="pie_3" class="piechart" data-percent="66">
													<span class="percent"></span>
												</div>
												<div class="skill-name">Javascript</div>
											</div>
										</div>
										<div class="divide-20"></div>
										<!-- BUTTONS -->
										<div class="row">
											<div class="col-md-3">
												<a class="btn btn-danger btn-icon input-block-level" href="javascript:void(0);">
													<i class="fa fa-google-plus-square fa-2x"></i>
													<div>Google Plus</div>
													<span class="label label-right label-warning">4</span>
												</a>
											</div>
											<div class="col-md-3">
												<a class="btn btn-primary btn-icon input-block-level" href="javascript:void(0);">
													<i class="fa fa-facebook-square fa-2x"></i>
													<div>Facebook</div>
													<span class="label label-right label-danger">7+</span>
												</a>
											</div>
											<div class="col-md-3">
												<a class="btn btn-pink btn-icon input-block-level" href="javascript:void(0);">
													<i class="fa fa-dribbble fa-2x"></i>
													<div>Dribbble</div>
													<span class="label label-right label-info">1</span>
												</a>
											</div>
											<div class="col-md-3">
												<a class="btn btn-success btn-icon input-block-level" href="javascript:void(0);">
													<i class="fa fa-github fa-2x"></i>
													<div>Github</div>
												</a>
											</div>
										</div>
										<!-- /BUTTONS -->
									</div>
									<div class="col-md-5">
										<!-- BOX -->
										<div class="box border inverse">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Statistics</h4>
												<div class="tools">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
													</a>
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="collapse">
														<i class="fa fa-chevron-up"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body big sparkline-stats">
												<div class="sparkline-row">
													<span class="title">Profile Visits</span>
													<span class="value">7453</span>
													<div class="linechart linechart-lg">1:3,2.8:4,3:3,4:3.4,5:7.5,6:2.3,7:5.4</div>
												</div>
												<div class="sparkline-row">
													<span class="title">Account balance</span>
													<span class="value"><i class="fa fa-usd"></i> 45,732</span>
													<span class="sparkline big" data-color="blue">16,6,23,14,12,10,15,4,19,18,4,24</span>
												</div>
												<div class="sparkline-row">
													<span class="title">Revenue distribution</span>
													<span class="value"><i class="fa fa-usd"></i> 25,674</span>
													<span class="sparklinepie big">16,6,23</span>
												</div>
											</div>
										</div>
										<!-- /BOX -->
										<!-- /SAMPLE -->
									</div>
								</div>
								<!-- /ROW 1 -->
								<div class="divide-40"></div>
								<!-- ROW 2 -->
								<div class="row">
									<div class="col-md-12">
									<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-columns"></i> <span class="hidden-inline-mobile">Profile Summary</span></h4>																
									</div>
									<div class="box-body">
										<div class="tabbable">
											<ul class="nav nav-tabs">
											   <li class="active"><a href="#sales" data-toggle="tab"><i class="fa fa-signal"></i> <span class="hidden-inline-mobile">Sales Table</span></a></li>
											   <li><a href="#feed" data-toggle="tab"><i class="fa fa-rss"></i> <span class="hidden-inline-mobile">Recent Activities</span></a></li>
											</ul>
											<div class="tab-content">
											   <div class="tab-pane active" id="sales">
												  <table class="table table-striped table-bordered table-hover">
													 <thead>
														<tr>
														   <th><i class="fa fa-user"></i> Client</th>
														   <th class="hidden-xs"><i class="fa fa-quote-left"></i> Sales Item</th>
														   <th><i class="fa fa-dollar"></i> Amount</th>
														   <th><i class="fa fa-bars"></i> Status</th>
														</tr>
													 </thead>
													 <tbody>
														<tr>
														   <td><a href="#">Fortune 500</a></td>
														   <td class="hidden-xs">Gold Level Virtual Server</td>
														   <td>$ 2310.23</td>
														   <td><span class="label label-success label-sm">Paid</span></td>
														</tr>
														<tr>
														   <td><a href="#">Cisco Inc.</a></td>
														   <td class="hidden-xs">Platinum Level Virtual Server</td>
														   <td>$ 5502.67</td>
														   <td><span class="label label-warning label-sm">Pending</span></td>
														</tr>
														<tr>
														   <td><a href="#">VMWare Ltd.</a></td>
														   <td class="hidden-xs">Hardware Switch</td>
														   <td>$ 3472.54</td>
														   <td><span class="label label-success label-sm">Paid</span></td>
														</tr>
														<tr>
														   <td><a href="#">Wall-Mart Stores</a></td>
														   <td class="hidden-xs">Branding & Marketing</td>
														   <td>$ 6653.25</td>
														   <td><span class="label label-success label-sm">Paid</span></td>
														</tr>
														<tr>
														   <td><a href="#">Exxon Mobil</a></td>
														   <td class="hidden-xs">UX and UI Services</td>
														   <td>$ 45645.45</td>
														   <td><span class="label label-danger label-sm">Overdue</span></td>
														</tr>
														<tr>
														   <td><a href="#">General Electric</a></td>
														   <td class="hidden-xs">Web Designing</td>
														   <td>$ 3432.11</td>
														   <td><span class="label label-warning label-sm">Pending</span></td>
														</tr>
													 </tbody>
												  </table>
											   </div>
											   <div class="tab-pane" id="feed">
												  <div class="scroller" data-height="250px" data-always-visible="1" data-rail-visible="1">
													  <div class="feed-activity clearfix">
														<div>
															<i class="pull-left roundicon fa fa-check btn btn-info"></i>
															<a class="user" href="#"> John Doe </a>
															accepted your connection request.
															<br>
															<a href="#">View profile</a>
															
														</div>
														<div class="time">
															<i class="fa fa-clock-o"></i>
															5 hours ago
														</div>
													  </div>
													  <div class="feed-activity clearfix">
														<div>
															<i class="pull-left roundicon fa fa-picture-o btn btn-danger"></i>
															<a class="user" href="#"> Jack Doe </a>
															uploaded a new photo.
															<br>
															<a href="#">Take a look</a>
															
														</div>
														<div class="time">
															<i class="fa fa-clock-o"></i>
															5 hours ago
														</div>
													  </div>
													  <div class="feed-activity clearfix">
														<div>
															<i class="pull-left roundicon fa fa-edit btn btn-pink"></i>
															<a class="user" href="#"> Jess Doe </a>
															edited their skills.
															<br>
															<a href="#">Endorse them</a>
															
														</div>
														<div class="time">
															<i class="fa fa-clock-o"></i>
															5 hours ago
														</div>
													  </div>
													  <div class="feed-activity clearfix">
														<div>
															<i class="pull-left roundicon fa fa-bitcoin btn btn-yellow"></i>
															<a class="user" href="#"> Divine Doe </a>
															made a bitcoin payment.
															<br>
															<a href="#">Check your financials</a>
															
														</div>
														<div class="time">
															<i class="fa fa-clock-o"></i>
															6 hours ago
														</div>
													  </div>
													  <div class="feed-activity clearfix">
														<div>
															<i class="pull-left roundicon fa fa-dropbox btn btn-primary"></i>
															<a class="user" href="#"> Lisbon Doe </a>
															saved a new document to Dropbox.
															<br>
															<a href="#">Download</a>
															
														</div>
														<div class="time">
															<i class="fa fa-clock-o"></i>
															1 day ago
														</div>
													  </div>
													  <div class="feed-activity clearfix">
														<div>
															<i class="pull-left roundicon fa fa-pinterest btn btn-inverse"></i>
															<a class="user" href="#"> Bob Doe </a>
															pinned a new photo to Pinterest.
															<br>
															<a href="#">Take a look</a>
															
														</div>
														<div class="time">
															<i class="fa fa-clock-o"></i>
															2 days ago
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
								<!-- /ROW 2 -->
							</div>
							<!-- /PROFILE DETAILS -->
						  </div>
					   </div>
					   <!-- /OVERVIEW -->
					   
					   <!-- EDIT ACCOUNT -->
					   <div class="tab-pane fade" id="pro_edit">
						  <form class="form-horizontal" action="#">
							<div class="row">
								 <div class="col-md-6">
									<div class="box border green">
										<div class="box-title">
											<h4><i class="fa fa-bars"></i>General Information</h4>
										</div>
										<div class="box-body big">
											<div class="row">
											 <div class="col-md-12">
												<h4>Basic Information</h4>
												<div class="form-group">
												   <label class="col-md-4 control-label">Name</label> 
												   <div class="col-md-8"><input type="text" name="regular" class="form-control" value="Jennifer"></div>
												</div>
												<div class="form-group">
												   <label class="col-md-4 control-label">Birthday</label> 
												   <div class="col-md-8"><input  class="form-control datepicker" type="text" name="regular" size="10"></div>
												</div>
												<div class="form-group">
												   <label class="col-md-4 control-label">Gender</label> 
												   <div class="col-md-8">
													  <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option1"> Male </label> 
													 <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option2" checked> Female </label>
												   </div>
												</div>
												<h4>Contact Information</h4>
												<div class="form-group">
												   <label class="col-md-4 control-label">Phone</label> 
												   <div class="col-md-8"><input type="number" name="regular" class="form-control" value="1002927323"></div>
												</div>
												
												<div class="form-group">
												   <label class="col-md-4 control-label">Address</label> 
												   <div class="col-md-8"><textarea name="regular" class="form-control"></textarea></div>
												</div>
												<div class="form-group">
												   <label class="col-md-4 control-label">Website</label> 
												   <div class="col-md-8">
														<div class="input-group">
														  <span class="input-group-addon">http://</span>
														  <input type="text" class="form-control" placeholder="Website">
														</div>																			
												   </div>
												</div>
											 </div>
										  </div>
										</div>
									</div>
								 </div>
								 <div class="col-md-6 form-vertical">
									<div class="box border inverse">
										<div class="box-title">
											<h4><i class="fa fa-bars"></i>Profile Settings</h4>
										</div>
										<div class="box-body big">
											<h4>Security Settings</h4>
												<div class="form-group">
												   <label class="col-md-4 control-label">Secure Browsing</label> 
												   <div class="col-md-8">
														<label class="checkbox-inline"> <input type="checkbox" class="uniform" value="" checked> Enable </label> 
														<label class="checkbox-inline"> <input type="checkbox" class="uniform" value=""> Disable </label> 
												   </div>
												</div>
												<div class="form-group">
												   <label class="col-md-4 control-label">Login Notifications</label> 
												   <div class="col-md-8">
														<label class="checkbox-inline"> <input type="checkbox" class="uniform" value=""> Enable </label> 
														<label class="checkbox-inline"> <input type="checkbox" class="uniform" value="" checked> Disable </label> 
												   </div>
												</div>
												<div class="form-group">
												   <label class="col-md-4 control-label">Recognized Devices</label> 
												   <div class="col-md-8">
														<label class="checkbox"> <input type="checkbox" class="uniform" value="" checked> Apple iPhone </label> 
														<label class="checkbox"> <input type="checkbox" class="uniform" value="" checked> Samsung Galaxy Note 3 </label>
														<label class="checkbox"> <input type="checkbox" class="uniform" value=""> Google Nexus 5 </label>
												   </div>
												</div>
												<div class="form-group">
												   <label class="col-md-4 control-label">Active sessions</label> 
												   <div class="col-md-8">
														<div class="divide-10"></div>
														<p>Logged in from <a href="#"><strong>New York, US</strong></a> and <a href="#">6 other</a> locations</p>
												   </div>
												</div>
										</div>
									</div>
								 </div>
							 </div>
						  </form>
						  <div class="form-actions clearfix"> <input type="submit" value="Update Account" class="btn btn-primary pull-right"> </div>
					   </div>
					   <!-- /HELP -->
					</div>
				</div>
				<!-- /USER PROFILE -->
			</div>
		</div>
	</div>
						</div>