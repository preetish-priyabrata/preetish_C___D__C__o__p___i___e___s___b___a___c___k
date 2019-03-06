<?php
error_reporting(0);
session_start();
include "config.php";
if(isset($_POST['submit'])){

	function test_input($data)	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	// checking if there is blank in while users when sign up
	if(($_REQUEST['phone']!="") && ($_REQUEST['email']!="")){
		$phone= test_input($_REQUEST['phone']);
		$email= test_input($_REQUEST['email']);

		$qry_chkmail="SELECT * FROM `candidate_login_info` WHERE `emailid`='$email' OR `phoneno`='$phone'";
		$sql=mysqli_query($conn, $qry_chkmail);
		$res2=mysqli_fetch_array($sql);
		$x=count($res2);
		if($x!=0){
			?>
				<script>
					$(document).ready(function () {
				  		$("#vpb_signup_pop_up_box").show();
					});
				</script>
		 	<?php
				$signup_msg3="<span style='color:red'>*You Have Already Registered In Our Portal.</span>";
		}else{
			// Generating Password
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
			$pass = substr(str_shuffle( $chars ), 0, 8 );
			$password= sha1($password); //Encrypting Password
			
			 $new_message1='Your password Is '.$pass;
			$api_params = 'user=SACHIN&key=96f84f2a28XX&mobile=91'.$phone.'&message='.$new_message1.'&senderid=INFOSM&accusage=1';
			    	$smsGatewayUrl = "http://103.233.79.246//submitsms.jsp?";  
			    	$smsgatewaydata = $smsGatewayUrl.$api_params;
			    	$url = $smsgatewaydata;
			    	$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
			  			curl_setopt($ch, CURLOPT_POST, 1);
			  			curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);  
						  // receive server response ...
						  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			    		$server_output = curl_exec ($ch);

			  			curl_close ($ch);
			//insert into "candidate_login_info" table
			$qry="INSERT INTO `candidate_login_info`(`candidate_id`, `phoneno`, `emailid`, `password`, `cp_date_time`) VALUES (NULL, '$phone', '$email', '$pass', NOW())";			
			$res= mysqli_query($conn, $qry);
			if($res){

				$to = $email;
				$subject = 'SPSC login info..';
				$message = "Your new password : ".$pass."\r\n E-mail: ".$email."\r\n Now you can login with this email and password.";
				//mail($to, $subject, $message);
				if(mail($to, $subject, $message)){			
		 			?>
			 			<script>
							$(document).ready(function () {
					  			//alert("you have successfully signed up, your login details sent to your emailid");
					  			$("#vpb_signup_pop_up_box").show();
							});
						</script>
		 			<?php
		 				$signup_msg2="<span style='color:green'>You have Successfully Registered , Your Login Details Sent to your Email Id.</span>";	
				}else{
		 			?>
						<script>
							$(document).ready(function () {
								$("#vpb_signup_pop_up_box").show();
							});
						</script>
					<?php
					$signup_msg2="<span style='color:red'>*your sign up was not successful , please sign up again.</span>";	
				}
			}else{
	 			?>
					 <script>
						$(document).ready(function () {
							$("#vpb_signup_pop_up_box").show();
						});
					</script>
		 		<?php
				$signup_msg3="<span style='color:red'>*your sign up was not successful , please sign up again.</span>";		
			}
		}
		
	}else{
		?>
			<script>
				$(document).ready(function () {
					$("#vpb_signup_pop_up_box").show();
				});
			</script>
		<?php
			$signup_msg4="<span style='color:red'>*Please Enter Email Id And Mobile No. Should Left Empty</span>";		
	}
	
}
?>
