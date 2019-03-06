<?php 
// include(dirname(__FILE__) . '/admin_final/config.php');
include '../admin_final/config.php';
 $program = str_replace(" ", "+", $_POST['pen']);
 echo $rogram = web_decryptIt($program);
if($rogram=="Preetih_kitu"){
	
	
// hq_id	hq1
	$academic_ids=$_POST['academic_ids'];
	$query="SELECT * FROM `kiit_branch` WHERE `B_academy_id`='$academic_ids' and `B_status`='1'";
	$sql_exe=mysqli_query($conn,$query);
	$num=mysqli_num_rows($sql_exe);

	if($num=="0"){
		?>
		<option value="">--No Branch Enter To This Degree--</option>
		<?php
	}else{
		?>
		<option value="">--Select Branch--</option>

		<?php
		while ($res=mysqli_fetch_assoc($sql_exe)) {
		?>
			<option value="<?=$res['B_slno']?>"><?=$res['B_branch']?></option>
			<?php
		}
	}
exit;


}else{
	$data[]=array('id'=>"",'name'=>"Please Fill Value And Triger It");
	 // json_encode($data);
	 return $data;
	exit;
}