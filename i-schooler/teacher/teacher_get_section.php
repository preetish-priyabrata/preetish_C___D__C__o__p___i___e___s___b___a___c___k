<?php
include '../config.php';
session_start();
$class_names=$_POST['Class_name'];
if(!empty($class_names)){
	$teacher_id=$_SESSION['teacher_id'];
	$date_year=date('Y');
		$date1=$date_year+1;
		$batch=$date_year.'-'.$date1;
	 $quey="SELECT * FROM `master_asign_teacher_subject` WHERE `teacher_id`='$teacher_id' and `class_id`='$class_names' and `batch_year`='$batch'";
	$exe=mysqli_query($conn,$quey);
	 $num=mysqli_num_rows($exe);
	if($num==0){?>
<option value="">-- No Data Is Avaliable</option>

<?php 

	}else{
		?>
		<option value="">_select section--</option>

		<?php 

		while ($res=mysqli_fetch_assoc($exe)) {?>
		 <option value="<?php echo $res['section_id'];?>"><?=$res['section_name'];?></option>	
	<?php	}
	}

}else{?>
<option value="">-- No Data Is Avaliable</option>

<?php } 
