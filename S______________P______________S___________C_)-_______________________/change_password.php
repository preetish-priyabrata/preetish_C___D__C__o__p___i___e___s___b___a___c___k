 <?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';

if($_SESSION['cand_user'])
{
date_default_timezone_set('Asia/Calcutta');

$qry="SELECT * FROM `candidate_login_info` WHERE `emailid`='$_SESSION[cand_user]'";	
$sql=mysqli_query($conn, $qry);
$res=mysqli_fetch_array($sql);
 $msg = new \Preetish\FlashMessages\FlashMessages();
  ?>
  <div class="text-center">
    <?php $msg->display(); ?>   
  </div>
<script>

		function validatePassword() {

		var oldpass,newpass,confnewpass,output = true;

		

		oldpass = document.chng_password.oldpass;

		newpass = document.chng_password.newpass;

		confnewpass = document.chng_password.confnewpass;

		

		if(!oldpass.value) {
		alert("please enter old passwod");
		oldpass.focus();
		return false;

		}
		else if(oldpass.value != "<?php echo $res["password"]; ?>")
		{
		alert("please enter valid passwod");
		oldpass.focus();
		return false;
		}

		else if(!newpass.value) 
		{
alert("please enter new passwod");
		newpass.focus();
		return false;

		}

		else if(!confnewpass.value) {
alert("please confirm new passwod");
		confnewpass.focus();

		return false;

		}

		else if(newpass.value != confnewpass.value) {
alert("Password Not Matched");
		newpass.value="";

		confnewpass.value="";

		newpass.focus();

return false;

		} 	
}

		</script>
<div class="col-lg-4"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<form action="save_candidate_password.php" id="chng_password" name="chng_password" enctype="multipart/form-data" method="post" role="form"  onSubmit="return validatePassword();">
<legend><h3>Change Password</h3></legend>
                               	<table class="table">
                                <tr>
                                <td>Old Password</td>
                                <td><input type="password" id="oldpass" name="oldpass" class="form-control" /></td>
                                </tr>
                                <tr>
                                <td>New Password</td>
                                <td><input type="password" id="newpass" name="newpass" class="form-control" /></td>
                                </tr>
                                <tr>
                                <td>Confirm New Password</td>
                                <td><input type="password" id="confnewpass" name="confnewpass" class="form-control" /></td>
                                </tr>
                                </table>
                                <center><input type="submit" name="submit" id="submit" value="Submit" class="btn-primary" /></center>
                                </form>
                               </div>
                               </div>
                               </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>