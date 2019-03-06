<!DOCTYPE html>
<html>
<head>
	<!-- <title>Third Quarter Report oct-dec,16</title> -->
	 <link href="assert_FRONT/dist/css/bootstrap.min.css" rel="stylesheet">
	  <script src="assert_FRONT/dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$id=$_REQUEST['stock'];
if($id=="1"){
	?>
	<title>Third Quarter Report oct-dec,16</title>
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h2>Third Quarter Report oct-dec 2016</h2>
			</div>
		</div>
	</div>
	<iframe src="https://docs.google.com/spreadsheets/d/1i6FCeK-sW_ScIWGbnCycZG8TKLqF37Q9SETErabyHiw/pubhtml?gid=554736881&amp;single=true&amp;widget=true&amp;headers=false" width="100%" style="height: 550px"></iframe>
	<?php

}else if($id=="2"){?>
<title>Population Base Forecasting 2016-17</title>
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h2>Population Base Forecasting 2016-17</h2>
			</div>
		</div>
	</div>
	<iframe src="https://docs.google.com/spreadsheets/d/1HKK3edeRKJv4TfIqedZaGQrO6Px4TvofZbHN6ud5a3I/pubhtml?gid=1265464502&amp;single=true&amp;widget=true&amp;headers=false"  width="100%" style="height: 550px"></iframe>
<?php
	}?>

<center><a href="index.php">Back </a></center>
</body>
</html>