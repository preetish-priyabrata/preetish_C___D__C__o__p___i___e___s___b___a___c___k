<?php
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [machine_cat_name] => heavy ) 
 	// here information is received 
 	$machine_cat_name=strtolower($conn,$_POST['machine_cat_name']);
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s'); // default time in online server

 	// insert query 
 	 $query_insert="INSERT INTO `lt_master_machine_category`(`slno`, `machine_cat_name`, `status`, `date`, `time`) VALUES (Null,'$machine_cat_name','1','$date','$time')";
 	 $sql_insert=mysqli_query($conn,$query_insert);
 	// execute query
 	
 	 $last_id=mysqli_insert_id($conn);
 	// finding last inserted query
 	 $machine_cat_id="mc".$last_id;
 	
 	//here combination of our short code designed 

 	// updated query insert in machine category 
 	$query_update="UPDATE `lt_master_machine_category` SET `machine_cat_id`='$machine_cat_id' WHERE`slno`='$last_id'";
 	$sql_update=mysqli_query($conn,$query_update);

 	// here success message is send 
 	$msg->success('Successfull Machine Category Is stored In our record');
 	header('Location:admin_dashboard.php');
	exit;

}else{
	header('Location:logout.php');
	exit;
}

?>
<script>
function myFunction() {
    var str = "$machine_cat_name";
    var res = str.toLowerCase();
    document.getElementById("demo").innerHTML = res;
}
</script>
