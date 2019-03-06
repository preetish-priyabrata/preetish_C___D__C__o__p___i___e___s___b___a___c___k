

<?php
session_start();
ob_start();
if($_SESSION['user_teacher']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Subskills
        
      </h1>
     <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam Master</a></li>
        <li class="active"><b>View Exam & Add Category</b></li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
    <div class="text-center">
        <?php 
          $msg->display(); 
          
        ?>
    </div>

      <div class="container-fluid">
       <div class="panel panel-default">
        <div class="panel-heading"><center><strong><h4>Add Subskills</h4></strong></center></div>
          <div class="panel-body">
            <form class="form-horizontal" id="reli" action="teacher_add_subkill_name_save.php" method="POST">
              <div class="form-group">


              <div class="form-group row">
              <label class="control-label col-sm-2" for="sub_skill">Sub Skills:</label>
              <div class="col-sm-10 col-md-6">
            
              <span id="myerror" style="color: red;"></span>
              

              <?php
              $serial_get=$_REQUEST['serial'];
              $teacher_id=$_SESSION['teacher_id'];
              $query="SELECT * FROM `master_exam_result_list` where `sl_no`='$serial_get'";
              $exe=mysqli_query($conn,$query);
               
               $result=mysqli_fetch_assoc($exe);    

              $sub_skill=$result['subskill'];
              for ($x = 0; $x < $sub_skill; $x++){

                ?>

                <input type="text" class="form-control" name="sub_skill[]" value="<?=$x+1?>" placeholder="Enter Sub Skills" requried>

              <?php }?>

                <input type="hidden" name="serial_exam_list" value="<?=$serial_get?>">
                  <span id="myerror" style="color: red;"></span>
                 <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
               <center><input type="submit" name="OK" value="OK"></center>
              </div>
             </div>
            </form>
           </div>
         </span>
       </div>
</div>
</section>
</div>
	
<?php
}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
