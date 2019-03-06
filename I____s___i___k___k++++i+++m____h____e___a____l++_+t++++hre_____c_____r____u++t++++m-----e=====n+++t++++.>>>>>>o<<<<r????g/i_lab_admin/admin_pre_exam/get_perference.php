<?php 
session_start();
include  '../config.php';
$exam=$_POST['exam'];
$location=$_POST['location'];
if($exam==""){
	echo "<option value=''>--Please Select Exam Group</option>";
}else{
	?>
	<option value="">--plesae select---</option>
	<?php
	 $get_detail="SELECT * FROM `ilab_exam_center` ";
	$sql=mysqli_query($conn,$get_detail);
	while ($res=mysqli_fetch_assoc($sql)) {
		$slno_exam=$res['slno_exam'];
		$check_exam="SELECT * FROM `ilab_assign_center_table` WHERE `group_slno_id`='$exam' and `exam_center_slno`='$slno_exam'";
		$sql_check_exam=mysqli_query($conn,$check_exam);
		$num_rows=mysqli_num_rows($sql_check_exam);
		if($num_rows==0){
			// `exam_name``total_seat`
		?>
		
			<option value="<?=$res['slno_exam']?>"><?=$res['exam_name']?>[<?=$res['total_seat']?>]</option>

		<?php
		}
		# code...
	}

}
exit;