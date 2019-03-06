<?php
error_reporting(0);
session_start();
include "config.php";
if(isset($_REQUEST['login']))
{

$user=$_REQUEST['uname'];
$pass=$_REQUEST['pass'];
if($user!="" && $pass!="")
{
	$qry_login="SELECT * FROM `candidate_login_info` WHERE `phoneno`='$user'  ";
	$sql_login=mysqli_query($conn, $qry_login);
	$res_login=mysqli_fetch_array($sql_login);
	
	$qry_offc_user="SELECT * FROM `user_master_data` WHERE `userid`='$user' And `status`='1' ";
	$sql_offc_user=mysqli_query($conn, $qry_offc_user);
	$res_offc_user=mysqli_fetch_array($sql_offc_user);
	 $num_admin=mysqli_num_rows($sql_offc_user);
	// if($num_admin!="0"){
	// $pass=sha1($_REQUEST['pass']);
	// }else{
	// 	$pass=$_REQUEST['pass'];
	// }
	
	
	
	if(($user==$res_login["phoneno"]) && ($pass==$res_login["password"]))
	{
		$_SESSION['cand_user']=$user;
		$_SESSION['exam_selected']="";
		header("location:application_form.php");
	}
	else if(($user==$res_offc_user["userid"]) && ($pass==$res_offc_user["password"])){
		switch ($res_offc_user["usertype"]) {
			case 'pre exam':
					$_SESSION['preexam_user']=$user;
					header("location:pe_view_app_status.php");
				break;
			case 'post exam':
					$_SESSION['postexam_user']=$user;
					header("location:postexam_update_attendance.php");
				break;
			case 'admin exam':
					$_SESSION['adminexam_user']=$user;
					header("location:adminexam_view_app_status.php");
				break;
			case 'verification exam':
					$_SESSION['verification_exam']=$user;
					header("location:vrf_verify_application.php");
				break;
			case 'admintech exam':
					$_SESSION['admintech_exam']=$user;
					header("location:admin_tech_user.php");
					//header("location:manage_user.php");				
				break;
			case 'admin normal':
					$_SESSION['admin_normal']=$user;
					header("location:change_logo.php");
				break;	
			case 'final verification':
					$_SESSION['final_verification_exam']=$user;
					header("location:final_vrf_verify_application.php");
				break;
			case 'admin operational':
					$_SESSION['admin_operational_exam']=$user;
					header("location:operational_dashboard.php");
				break;		
			default:
				?>
	 			<script>
					$(document).ready(function () {
              			$("#vpb_login_pop_up_box").show();
       				 });
   				</script>
				<?php
					$login_msg2="<span style='color:red'>*Incorrect User Name or Password.</span>";
				break;
		}
		// if($res_offc_user["usertype"]=="pre exam")
		// {
		// $_SESSION['preexam_user']=$user;
		// header("location:pe_view_app_status.php");
		// }
		// if($res_offc_user["usertype"]=="post exam")
		// {
		// $_SESSION['postexam_user']=$user;
		// header("location:postexm_collect_attendance.php");
		// }
		// if($res_offc_user["usertype"]=="admin exam")
		// {
		// $_SESSION['adminexam_user']=$user;
		// header("location:adminexam_view_app_status.php");
		// }
	}
	// else if(($user=="verification@gmail.com" && $pass=="verification") || ($user=="admintech@gmail.com" && $pass=="admintech") || ($user=="admin@gmail.com" && $pass=="admin")) 
	// {
	// 	$_SESSION['user']=$user;
		
	// 	if($pass=="verification")
	// 	{
	// 		header("location:vrf_verify_application.php");
	// 	}
	// 	if($pass=="admintech")
	// 	{
	// 		header("location:manage_user.php");
	// 	}
	// 	if($pass=="admin")
	// 	{
	// 		header("location:change_logo.php");
	// 	}
	// }

	else
	{
	?>
	 <script>
	$(document).ready(function () {
              $("#vpb_login_pop_up_box").show();
        });
    </script>
	<?php
	$login_msg2="<span style='color:red'>*Incorrect User Name or Password.</span>";
	}
}
else
{
	?>
	 <script>
	$(document).ready(function () {
              $("#vpb_login_pop_up_box").show();
        });
    </script>
	<?php
	$login_msg3="<span style='color:red'>*please enter valid User Name and Password.</span>";
}

}
?>