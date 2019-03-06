<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				<!-- <li class="active">Dashboards</li> -->
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
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
		</div>
	</div>





<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templete/header.php';

?>

