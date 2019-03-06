<?php
include '../config.php';
// $msg = new \Preetish\FlashMessages\FlashMessages();
print_r($_POST);
$exam_name=$_POST['exam_cat_id'];

if($exam_name!="")
{
	$query_get_exe="SELECT * FROM `master_exam_name` WHERE `exam_cat_id`='$exam_name'";
	$sql_exe=mysqli_query($conn,$query_get_exe);
	$num_rows=mysqli_num_rows($sql_exe);
         if($num_rows==0){?>
              <option value="">No Exam Available</option>
<?php }else{ ?>           
          	<option value="">Please Select Exam</option>
          	
<?php          	while($result_exam_name=mysqli_fetch_assoc($sql_exe)){
         
          ?>
             <option value="<?=$result_exam_name['slno']?>"><?=$result_exam_name['exam_name']?> </option>

       <?php
     }
     ?>
     <!-- </select> -->
     <?php
   }
 }else{?>
<option value="">Please Select Exam</option>
 <?php }
 
   


