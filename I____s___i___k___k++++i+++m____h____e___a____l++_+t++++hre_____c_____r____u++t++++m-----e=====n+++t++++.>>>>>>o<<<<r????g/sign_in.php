<?php 

	ob_start();
	session_start();
	include 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Login Form";
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
						Candidate Login
					</span>
					
						<?php $msg->display(); ?>
					
					<input type="hidden" name="form_type" value="<?=web_encryptIt('registered')?>">
					<div class="wrap-input100">
						<input class="input100" type="number" name="Mobile" id="Mobile" placeholder="Mobile" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile " aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="Password" name="user_paswword" id="user_paswword" placeholder="Password" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<!-- span over -->
					<span class="slidingDiv1">
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" style="background: red">
								Closed
							</button>
						</div>
					</span>

					
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
			$( document ).ready(function() {
		    console.log( "ready!" );
		     $(".slidingDiv1").show();
		      $(".slidingDiv12").hide();
		});
		
	</script>
<!--===============================================================================================-->
	<!-- <script src="assert/js/main.js"></script> -->

