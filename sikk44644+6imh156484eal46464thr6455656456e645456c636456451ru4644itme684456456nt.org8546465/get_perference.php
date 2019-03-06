<?php 
session_start();
require_once("config.php");
$Preference_one=$_POST['Preference_one'];
if($Preference_one==""){
	echo "<option value=''>--Please Select 1st Preference</option>";
}else{
	?>
	<option value="">--plesae select---</option>
	<?php
	$get_detail="SELECT * FROM `ilab_location_exam_praference` WHERE `location`!='$Preference_one' ";
	$sql=mysqli_query($conn,$get_detail);
	while ($res=mysqli_fetch_assoc($sql)) {?>
		
		<option value="<?=$res['location']?>"><?=$res['location']?></option>

	<?php
		# code...
	}

}
exit;