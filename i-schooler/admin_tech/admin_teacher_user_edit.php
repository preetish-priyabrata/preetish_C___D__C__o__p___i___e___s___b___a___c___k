<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
$t_userid=$_GET['t_userid'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
    	<div class="text-center ">
			 
        <?php $msg->display(); ?>
    
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
    
  
  <div class="tab-content">
  <form method="POST" enctype="multipart/form-data" action="admin_teacher_edit_save.php">
    
    <table  class="table  table-striped">
    
      
      <!--<tr>
      <th>User Id</th>
      <th>Name</th>
      <th>E-mail</th>
      <th>Photo</th>
      <th>Mobile No</th>
      <th>Subject</th>
      </tr>-->
      <tr><td colspan="2"><h1>View all the data</h1><td></tr>
      <?php 
        $query ="SELECT * FROM `master_teacher_user` where `slno`='$t_userid'";   
        $query_exe = mysqli_query($conn,$query);
        if(mysqli_num_rows($query_exe)){          
        while($rec = mysqli_fetch_array($query_exe)){
      ?>
      <tr>
      <?php $msg->display(); ?>
        <td>
          <table class="table">
          
            <tr>
              <td>ID</td>
              <td>:</td>
              <td><?php echo $rec['slno']; ?><input type="hidden" value="<?php echo $rec['slno']; ?>" name="teacher_slno"></td>
            </tr>
            <tr>
              <td>Name</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="u_name" value="<?php echo $rec['teacher_name']?>" ></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="u_email" value="<?php echo $rec['teacher_email'];?>" >
                <br></td>
            </tr>
            <tr>
              <td>Mobile No</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="u_phone" value="<?php echo $rec['teacher_mobile'];?>" ></td>
            </tr>
            <tr>
              <td>Major In</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="u_major" value="<?php echo $rec['teacher_subject'];?>" ></td>
            </tr>
            <tr>
              <td>Photo</td>
              <td>:</td>
              <td> 
              <img height="150" width="200" src="../assert/upload/teacher/<?php echo $rec ['teacher_photo'];?> "?> 
              <input type="file"  name="u_file" value="<?php  ?>" ></td>
            </tr>
          </table>
        </td>
             
      </tr>
      <?php } }?>  
      <tr><td colspan="2"><input  type="submit" name="Edit" value="Save" class="btn btn-primary"><td>

      </tr>
      
    </table>
   </form>
  </div>
  <br>
          
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
<script type="text/javascript">
  function check_exam() {
  var exam_category_name=$('#exam_category').val();
  var check_exam_category="exams_category_name";
  if(exam_category_name!=""){ 
              // alert(class_name);             
    $.ajax({
      type:'POST',
      url:'admin_class_check.php',
      data:{exam_category_names:exam_category_name,check_exams_category:check_exam_category},
      success:function(html){                 
        if(html==1){
          document.getElementById("myerror").innerHTML = "";
          return true;
          // $("#reli").submit(); 
        }else{
          document.getElementById("myerror").innerHTML = "Exam Category Is Present In Our Records ,"+exam_category_name;
          return false;
        }
      }
    });
  }
}

function sub_check(){
  if(check_exam()){
    alert('hi');
  }else{
    alert('bye');
  }
}
</script>
