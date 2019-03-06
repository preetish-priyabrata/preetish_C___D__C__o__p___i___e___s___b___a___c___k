

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
					<ul class="breadcrumb">
						<li><a href="index.html"></a></li>
						<li class="active">Dashboards</li>
					</ul>
				</div>
			</div>
			<!-- /Page Header-->

			<div class="container-fluid page-content">
				<div class="row">

					<!-- Leads -->
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-flat border-none">
							<div class="panel-body p-b-10">
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<div id="leads"></div>
									</div>
									<div class="col-md-6 col-xs-6 no-padding">
										<span class="">Total Leads</span>
										<div class="x3 text-light no-padding no-margin m-t-10 m-b-10">543 <i class="icon-arrow-up16 text-success text-size-large"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Leads -->

					<!-- Payments -->
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-flat border-none">
							<div class="panel-body p-b-10">
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<div id="payment"></div>
									</div>
									<div class="col-md-6 col-xs-6 no-padding">
										<span class="">Total Payment</span>
										<div class="x3 text-light no-padding no-margin m-t-10 m-b-10">$6,210</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Payments -->

					<!-- Sales -->
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-flat border-none">
							<div class="panel-body p-b-10">
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<div id="sales"></div>
									</div>
									<div class="col-md-6 col-xs-6 no-padding">
										<span class="">Total Sales</span>
										<div class="x3 text-light no-padding no-margin m-t-10 m-b-10">765 <i class="icon-arrow-down16 text-danger text-size-large"></i></div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Sales -->

					<!-- Orders -->
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-flat border-none">
							<div class="panel-body p-b-10">
								<div class="col-md-6 col-xs-6">
									<div class="row">
										<div id="orders"></div>
									</div>
								</div>
								<div class="col-md-6 col-xs-6 no-padding">
									<span class="">Total Orders</span>
									<div class="x3 text-light no-padding no-margin m-t-10 m-b-10">532 <i class="icon-arrow-up16 text-success text-size-large"></i></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Orders -->
				</div>

				<!-- Income & Expenses -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Income & Expenses <small>(Current Year)</small></h5>
						<div class="elements">
							<ul class="icons-list">
								<li><a data-action="collapse" data-popup="tooltip" title="Collapse"></a></li>
								<li><a data-action="reload" data-popup="tooltip" title="Reload"></a></li>
								<li><a data-action="close" data-popup="tooltip" title="Close"></a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<div class="row hidden-xs">
							<div class="col-md-12 text-right">
								<div class="button-toolbar">
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-default">Week</button>
										<button type="button" class="btn btn-sm btn-default active">Month</button>
										<button type="button" class="btn btn-sm btn-default">Year</button>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-default">Today</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="income"></div>
				</div>
				<!-- /Income & Expenses -->

				<div class="row">

					<!-- Quick Stats -->
					<div class="col-md-4">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Quick Stats</h5>
							</div>
							<div class="panel-body">
								<div class="row text-center">
									<div class="col-md-4 col-sm-4 col-xs-4 p-t-20">
										<span class="pie-chart monthly" data-percent="86">
											<span class="pie-percent per_monthly"></span>
										</span>
										<h6 class="no-margin-t">Monthly</h6>
									</div>

									<div class="col-md-4 col-sm-4 col-xs-4 p-t-20">
										<span class="pie-chart yearly" data-percent="74">
											<span class="pie-percent per_yearly"></span>
										</span>
										<h6 class="no-margin-t">Yearly</h6>
									</div>

									<div class="col-md-4 col-sm-4 col-xs-4 p-t-20">
										<span class="pie-chart total" data-percent="54">
											<span class="pie-percent per_total"></span>
										</span>
										<h6 class="no-margin-t">Total</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Quick Stats -->

					<!-- Annual Growth -->
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Annual Growth</h5>
							</div>
							<div class="panel-body">
								<div id="growth"></div>
							</div>
						</div>
					</div>
					<!-- /Annual Growth -->

					<!-- Website Stats -->
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Website Stats</h5>
							</div>
							<div class="panel-body">
								<div id="stats" style="margin: 0 auto"></div>
							</div>
						</div>
					</div>
					<!-- /Website Stats -->
				</div>

				<div class="row">

					<!-- Recent Activities -->
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">
								Recent Activities
								</h5>
							</div>
							<div class="panel-body p-l-20 p-b-20">
								<div class="streamline">
									<div class="sl-item sl-primary">
										<div class="sl-content">
											<small class="text-muted"><i class="icon-user-plus position-left"></i>2 mins ago</small>
											<p>Jane Elliott added a new friend.</p>
										</div>
									</div>

									<div class="sl-item sl-danger">
										<div class="sl-content">
											<small class="text-muted"><i class="icon-pencil5 position-left"></i>10 mins ago</small>
											<p>Florence Douglas posted on your timeline.</p>
										</div>
									</div>

									<div class="sl-item sl-success">
										<div class="sl-content">
											<small class="text-muted"><i class="icon-user position-left"></i>14 mins ago</small>
											<p>Jacqueline Howell sent you a friend request.</p>
										</div>
									</div>

									<div class="sl-item sl-warning">
										<div class="sl-content">
											<small class="text-muted"><i class="icon-calendar position-left"></i>20 mins ago</small>
											<p>Sara has invited you for an event.</p>
										</div>
									</div>

									<div class="sl-item sl-primary">
										<div class="sl-content">
											<small class="text-muted"><i class="icon-user-plus position-left"></i>1 day ago</small>
											<p>Ann Porter added a new friend.</p>
										</div>
									</div>

									<div class="sl-item sl-success">
										<div class="sl-content">
											<small class="text-muted"><i class="icon-comments position-left"></i>1 day ago</small>
											<p>Jacqueline commented on your post.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Recent Activities -->

					<!-- Recent Comments -->
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-flat">
							<div class="panel-heading p-b-5">
								<h5 class="panel-title">
								Recent Comments
								</h5>
							</div>

							<ul class="media-list media-list-linked m-b-20">
								<li class="media bg-light-lighter">
									<a href="#" class="media-link">
										<div class="media-left">
											<img src="img/demo/img1.jpg" class="img-circle" alt="">
										</div>

										<div class="media-body">
											<h6 class="media-heading">Jane Elliott <span class="media-annotation">4 hours ago</span></h6>
										Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
										</div>
									</a>
								</li>

								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left">
											<img src="img/demo/img2.jpg" class="img-circle" alt="">
										</div>

										<div class="media-body">
											<h6 class="media-heading">Florence Douglas <span class="media-annotation">3 hours ago</span></h6>
										Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. In enim justo, rhoncus ut.
										</div>
									</a>
								</li>

								<li class="media bg-light-lighter">
									<a href="#" class="media-link">
										<div class="media-left">
											<img src="img/demo/img3.jpg" class="img-circle" alt="">
										</div>

										<div class="media-body">
											<h6 class="media-heading">Jacqueline Howell <span class="media-annotation">2 hours ago</span></h6>
										Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum.
										</div>
									</a>
								</li>

								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left">
											<img src="img/demo/img4.jpg" class="img-circle" alt="">
										</div>

										<div class="media-body">
											<h6 class="media-heading">Eugine Turner <span class="media-annotation">Yesterday, 14:54</span></h6>
										Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. In enim justo.
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /Recent Comments -->

					<!-- Recent Leads -->
					<div class="col-md-5 col-sm-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Recent leads</h5>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-striped user-list">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Date</th>
											<th>Status</th>
											<th>Priority</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Jane Elliott</td>
											<td>Jun 14, 2016</td>
											<td><span class="label label-info">Opened</span></td>
											<td><span class="label label-danger">High</span></td>
										</tr>

										<tr>
											<td>2</td>
											<td>Florence Douglas</td>
											<td>Jun 14, 2016</td>
											<td><span class="label label-success">Closed</span></td>
											<td><span class="label label-success">Low</span></td>
										</tr>

										<tr>
											<td>3</td>
											<td>Jacqueline Howell</td>
											<td>Jun 14, 2016</td>
											<td><span class="label label-info">Opened</span></td>
											<td><span class="label label-warning">Medium</span></td>
										</tr>

										<tr>
											<td>4</td>
											<td>Eugine Turner</td>
											<td>Jun 13, 2016</td>
											<td><span class="label label-danger">Pending</span></td>
											<td><span class="label label-danger">High</span></td>
										</tr>

										<tr>
											<td>5</td>
											<td>Andrew Brewer</td>
											<td>Jun 14, 2016</td>
											<td><span class="label label-danger">Pending</span></td>
											<td><span class="label label-success">Low</span></td>
										</tr>
										<tr>
											<td>6</td>
											<td>Jonaly Smith</td>
											<td>Jun 12, 2016</td>
											<td><span class="label label-info">Opened</span></td>
											<td><span class="label label-success">Low</span></td>
										</tr>
										<tr>
											<td>7</td>
											<td>Ann Porter</td>
											<td>Jun 12, 2016</td>
											<td><span class="label label-info">Opened</span></td>
											<td><span class="label label-success">Low</span></td>
										</tr>
										<tr>
											<td>8</td>
											<td>John Deo</td>
											<td>Jun 11, 2016</td>
											<td><span class="label label-danger">Pending</span></td>
											<td><span class="label label-success">Low</span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Recent Leads -->
				</div>

				<div class="row">

					<!-- World Map -->
					<div class="col-md-5">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">World Map</h5>
							</div>
							<div class="panel-body">
								<div class="map-container map-world-markers" style="max-height:250px;"></div>
							</div>
						</div>
					</div>
					<!-- /World Map -->

					<!-- Weather -->
					<div class="col-md-7">
						<div class="panel panel-flat no-border">
							<img src="img/covers/weather.jpg" class="img-responsive img-100" alt="">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-5 col-sm-5">
										<p class="text-bold text-uppercase no-margin">Today</p>
										<div class="row-fluid no-margin">
											<div class="col-md-3 col-sm-3 col-xs-3 no-margin">
												<div class="wi wi-day-snow wi-30 p-l-20 p-t-15 text-warning"></div>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9 no-margin">
												<div class="weather-cent text-warning"><span class="text-semibold">22</span></div>
											</div>
										</div>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-12 p-r-20">
										<div class="row">
											<div class="col-md-2 col-xs-2 col-sm-2">
												<p class="text-bold text-uppercase no-margin">Mon</p>
												<div class="wi wi-day-snow wi-20 p-l-20 text-indigo"></div>
												<div class="weather-cent wi-small"><span class="text-bold">17</span></div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<p class="text-bold text-uppercase no-margin">Tue</p>
												<div class="wi wi-day-cloudy-windy wi-20 p-l-20 text-lime"></div>
												<div class="weather-cent wi-small"><span class="text-bold">19</span></div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<p class="text-bold text-uppercase no-margin">Wed</p>
												<div class="wi wi-day-lightning wi-20 p-l-20 text-amber"></div>
												<div class="weather-cent wi-small"><span class="text-bold">18</span></div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<p class="text-bold text-uppercase no-margin">Thur</p>
												<div class="wi wi-night-rain-mix wi-20 p-l-20 text-blue"></div>
												<div class="weather-cent wi-small"><span class="text-bold">21</span></div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<p class="text-bold text-uppercase no-margin">Fri</p>
												<div class="wi wi-night-rain wi-20 p-l-20 text-slate"></div>
												<div class="weather-cent wi-small"><span class="text-bold">19</span></div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<p class="text-bold text-uppercase no-margin">Sat</p>
												<div class="wi wi-sunrise wi-20 p-l-20 text-success"></div>
												<div class="weather-cent wi-small"><span class="text-bold">18</span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Weather -->
				</div>

			</div>