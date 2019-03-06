<?php
session_start();
ob_start();
//session start
if($_SESSION['user_teacher']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Examination
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam Master</a></li>
        <li class="active"><b>View Exam & Add Category</b></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
    	<div class="text-center">
			  <?php 
          $msg->display(); 
          
        ?>
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"><h4><b>View Examinations</b></h4></a></li>
    <!-- <li><a data-toggle="pill" href="#menu1"><h4><b>Add Exam Name</b></h4></a></li>
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
     
        <div class="table-responsive">
          <table  class="table table-bordered table-striped">
            <thead>
              <tr>
              <th><h4><b>Sl.no</b></h4></th>
                <th><h4><b>Exam Type</b></h4></th>
                <th><h4><b>Exam Name</b></h4></th> 
                
                <th><h4><b>Status</b></h4></th>                                        
              </tr>
            </thead>
            <tbody>
           

              <?php
                  $query ="SELECT * FROM `master_exam_name`";
                  $exe =mysqli_query($conn,$query);
                  if(mysqli_num_rows($exe)){
                    while($rec1 = mysqli_fetch_array($exe)){
                ?>
              <tr>
              
                  <td><?php echo $rec1['slno'];?></th>
                  <td> <?php 
                          $cat_id=$rec1['exam_cat_id'];
                          $query_category ="SELECT * FROM `master_exam_category` where `slno_exam`='$cat_id'";
                          $exe_category=mysqli_query($conn,$query_category);
                          $RESULTS_CATEGORY=mysqli_fetch_assoc($exe_category);
                          echo strtoupper($RESULTS_CATEGORY['exam_name_cat']);
                          ?></th>
                <th><?php echo strtoupper($rec1['exam_name']);?></th> 
              
                 <th><?php echo $rec1['status'];?></th>
                                
              </tr>
            <?php 
                }
              }
                ?> 

            </tbody>                 
          </table>
        </div>
      </div>
      </div>        
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="container">
        <div class="row">
        <h3>Exam Name</h3>
          <form class="form-horizontal" id="reli" action="admin_exam_name_save.php" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Exam Type:</label>
              <div class="col-sm-10 col-md-10 col-lg-9">
                <select name="cate_name" class="form-control" required="">
                  <option value="">--Select Exam Type--</option>
                 <?php
                  $query_view = "SELECT  * FROM `master_exam_category`";
                  $exe_vieew = mysqli_query($conn,$query_view);
                  if($exe_vieew){                
                    while($rec = mysqli_fetch_array($exe_vieew)){?>
                      <option value="<?php echo $rec['slno_exam'];?>"><?=$rec['exam_name_cat'];?></option>
              <?php }
                  }else{?>
                     <option value="">No Data is Present</option>
                  <?php }
              ?> 
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="exam_name">Exam Name:</label>
              <div class="col-sm-10">
                <input type="text" name="exam_name" required="">                 
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" value="submit">
              </div>
            </div>
          </form>
      </div>
    </div>
   
  </div>
  
          
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