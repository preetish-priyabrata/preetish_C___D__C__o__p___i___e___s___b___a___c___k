<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
$std_id=$_GET['std_id'];
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">

 <section class="content">
    <!-- success or error message alert -->
      <div class="text-center">
       
        <?php $msg->display(); ?>
    
      </div>

    
    <!-- end success or error message alert  -->
    <div class="box">
    
  
  <div class="tab-content">
  <form class="form-horizontal" id="reli" action="" method="POST" enctype="multipart/form-data">
    
   
      
      <!--<tr>
      <th>User Id</th>
      <th>Name</th>
      <th>E-mail</th>
      <th>Photo</th>
      <th>Mobile No</th>
      <th>Subject</th>
      </tr>-->
      <tr><td colspan="2"><center><h3>View Student Details</h3></center><td></tr>
      <tr>
        <td>
          <table class="table ">
          <?php
            $query = "SELECT * FROM `master_student_user` where `student_slno`='$std_id'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
          
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            <tr>
              <td><h4>Sl.No</h4></td>
              <td>:</td>
              <td><h4><?php echo $rec['student_slno'] ;?></h4></td>
            </tr>
            <tr>
              <td><h4>Student Name</h4></td>
              <td>:</td>
             <td><h4><?php echo $rec['student_name'] ;?></h4></td>
            </tr>
            <tr>
              <td><h4>Join Batch</h4></td>
              <td>:</td>
               <td><h4><?php echo $rec['student_join_batch'] ;?></h4></td>
            </tr>
            <tr>
              <td><h4>Join Section</h4></td>
              <td>:</td>
            <td><h4><?php echo $rec['student_join_section'] ;?></h4></td>
            </tr>
            <tr>
              <td><h4>Current Class</h4></td>
              <td>:</td>
             <td><h4><?php echo $rec['student_current_class'] ;?></h4></td>
            </tr>
            <tr>
              <td><h4>Current Section</h4></td>
              <td>:</td>
              <td><h4><?php echo $rec['student_current_section'] ;?></h4></td>
            </tr>
            <tr>
              <td><h4>Gender</h4></td>
              <td>:</td>
             <td><h4><?php echo $rec['student_gender'] ;?></h4></td>
            </tr>
            <!--<tr>
              <td><h4>DOB</h4></td>
              <td>:</td>
              <td><h4><?php //echo $rec['student_dob'] ;?></h4></td>
            </tr>-->
             <tr>
              <td><h4>Student Photo</h4></td>
              <td>:</td>
               <td><img width="100" 
                   height="100" src="../assert/upload/student_pic/<?php echo $rec ['student_photo'];?> "?>
            </tr>
             <tr>
              <td><h4>Parent Name</h4></td>
              <td>:</td>
              <td><h4><?php echo $rec['parent_name'];?></td>
            </tr>
             <tr>
              <td><h4>Parent Phone No</h4></td>
              <td>:</td>
              <td><?php echo $rec['parent_ph_no'];?></td>
            </tr>
            
          
                
     <tr>
     <td>
     <center>
     <a href="admin_student_edit.php?std_id=<?php echo $std_id ;?>" class="label label-primary" starget="_blank">Edit</a>
     </center>
     </td>

      </tr>
      <?php 
      }
      }?>
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

