<?php
include '../config.php';
// print_r($_POST);
$class_names=$_POST['Class_name'];
if(!empty($class_names)){
	$quey="SELECT * FROM `master_class_section` WHERE `class`='$class_names'";
	$exe=mysqli_query($conn,$quey);
	$num=mysqli_num_rows($exe);
	if($num==0){?>
<option value="">-- No Data Is Avaliable</option>

<?php 

	}else{
		while ($res=mysqli_fetch_assoc($exe)) {?>
		 <option value="<?php echo $res['Slno'];?>"><?=$res['section'];?></option>	
	<?php	}
	}

}else{?>
<option value="">-- No Data Is Avaliable</option>

<?php } 
