<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title><?=$title?></title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.ico" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.ico" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">
    <!-- /Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="../asserts/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../asserts/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="../asserts/lib/css/main.css">
    <!-- /Global stylesheets -->

	<!-- Page css -->
	<link type="text/css" rel="stylesheet" href="../asserts/lib/assets/icons/weather/weather-icons.min.css">
	<link type="text/css" rel="stylesheet" href="../asserts/lib/assets/icons/weather/weather-icons-wind.min.css">
	<!-- 
    https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css
    https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css
 -->
	<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
	<script src="../asserts/ckeditor1/ckeditor.js"></script>
	<!-- /page css -->
</head>
<body id="top">
<!-- Preloader -->
<div id="preloader">
	<div id="status">
		<div class="loader"></div>
	</div>
</div>
<!-- /Preloader -->
	<div id="body-wrapper" class="body-container">

	<?php
 		include 'side_bar.php';
 		
 ?>

	<!-- AFTER MENU -->

	<!-- Page container begins -->
	<section class="main-container">
	<?php
	// include 'content.php';
	 echo "$contents"; 

	?>
	<!-- CONTENT -->

	<!-- FOOTER -->

    <!-- Footer -->
			<footer class="footer-container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="pull-left">
								©  <?php echo date('Y'); ?> Innovadors Lab &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Web app kit by <a href="http://innovadorslab.com/" target="_blank">I-lab</a>.							</div>
	                        <div class="pull-right">
								<div class="label label-info">Version: 1.0</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
       </section>
	</div>
	<?php
	include 'footer.php';
	?>
