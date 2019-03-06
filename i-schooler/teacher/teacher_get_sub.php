<?php
error_reporting(4);
include '../config.php';
session_start();
$class_names=$_POST['Class_name'];
$section_id=$_POST['section_id'];
if(!empty($class_names)){
	$teacher_id=$_SESSION['teacher_id'];
	$date_year=date('Y');
		$date1=$date_year+1;
		$batch=$date_year.'-'.$date1;
	$query="SELECT * FROM `master_asign_teacher_subject` WHERE `teacher_id`='$teacher_id' and `class_id`='$class_names' and `section_id`='$section_id' and `batch_year`='$batch'";
	$exe=mysqli_query($conn,$query);
	
	 $num=mysqli_num_rows($exe);
	if($num==0){?>
<option value="">-- No Data Is Avaliable</option>

<?php 

	}else{
		?>
		<option value="">--Select Subject--</option>

		<?php 

		while ($res=mysqli_fetch_assoc($exe)) {?>
		 <option value="<?php echo $res['subject_id'];?>"><?=$res['subject_name'];?></option>	
	<?php	}
	}

}else{?>
<option value="">-- No Data Is Avaliable</option>

<?php } 
