<?php
print_r($_POST);
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [machine_cat_id] => mc6 ) 
 	// here information is received 
 	// $machine_cat_id=mysqli_real_escape_string($conn,$_POST['machine_cat_id']);
 	$model_id_no=strtolower($_POST['model_no']);
 	$model_no=mysqli_real_escape_string($conn,$model_id_no);
    $date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server
 	$machine_cat_id="1234";

 	//check before inserting to record
 	
 	$query_check="SELECT * FROM `lt_master_machine_model_no` WHERE `model_no`='$model_no'" ;
 	$sql_check=mysqli_query($conn,$query_check);
 	 $num=mysqli_num_rows($sql_check);
 	// exit;
 	if($num=="0"){
	 	// insert query 
	 	$query_insert="INSERT INTO `lt_master_machine_model_no`(`slno`, `machine_category`,`model_no`,`status`, `date`, `time`) VALUES (Null,'$machine_cat_id','$model_no','1','$date','$time')";
	 	 $sql_insert=mysqli_query($conn,$query_insert);
	 	// execute query
	 	
	 	 $last_id=mysqli_insert_id($conn);
	 	// finding last inserted query
	 	 $model_id="md".$last_id;
	 	
	 	//here combination of our short code designed 

	 	// updated query insert in Model Id 
	 	$query_update="UPDATE `lt_master_machine_model_no` SET `model_id`='$model_id' WHERE`slno`='$last_id'";
	 	$sql_update=mysqli_query($conn,$query_update);

	 	// here success message is send 
	 	$msg->success('Successfull Model No Is stored In our record');
	 	header('Location:admin_dashboard.php');
		exit;
	}else{
		$msg->error('Sorry this model no is in our present system');
	 	header('Location:admin_dashboard.php');
		exit;
	}

}else{
	header('Location:logout.php');
	exit;
}

?>
<!-- <script>
function myFunction() {
    var str = "$model_no";
    var res = str.toLowerCase();
    document.getElementById("demo").innerHTML = res;
}
</script> -->