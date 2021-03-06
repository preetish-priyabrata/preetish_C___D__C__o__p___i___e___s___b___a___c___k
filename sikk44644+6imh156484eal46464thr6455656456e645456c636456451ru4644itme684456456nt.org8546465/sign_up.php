<?php 

ob_start();
$title="Registration Form";
?>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assert/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assert/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assert/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assert/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assert/css/util.css">
	<link rel="stylesheet" type="text/css" href="assert/css/main.css">
<!--===============================================================================================-->
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assert/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form" action="#" id="reli" method="POST">
					<span class="login100-form-title">
						Candidate Registration
					</span>

					<div class="wrap-input100">
						<input class="input100" type="number" name="Mobile" id="Mobile" placeholder="Mobile" pattern="[1-9]{1}[0-9]{9}" maxlength="10">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile " aria-hidden="true"></i>
						</span>
					</div>
					
				<span id="process"></span>
				<span id="errornews" style="color: red"></span>
				<span class="slidingDiv1">
					<div class="container-login100-form-btn">
						<button type="button" style="background: red; color: white" class="login100-form-btn">
							Application Submission Closed
						</button>
					</div>
				</span>
				

					<div class="text-center p-t-12">
						<span class="txt1">
							Already Register
						</span>
						<a class="txt2" href="sign_in.php">
							Click Here
						</a>
					</div>

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	



<?php 
$content_details = ob_get_contents();
ob_clean();
include 'template.php';
?>

<!--===============================================================================================-->
	<script src="assert/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assert/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<!-- <script src="assert/js/main.js"></script> -->

	<script type="text/javascript">
		$( document ).ready(function() {
		    console.log( "ready!" );
		     $(".slidingDiv").hide();
		      $(".slidingDiv12").hide();
		});
		
	</script>