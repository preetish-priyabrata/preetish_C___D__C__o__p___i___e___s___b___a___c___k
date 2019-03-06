<?php
session_start();
ob_start();
if($_SESSION['user_principal']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Subject
          <small>Here School Subject Name Information Is Viewed </small>
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
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">Tab-1</a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Tab-2</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
        <h3>Subject</h3>
        <div class="table-responsive">
          <table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Subject</th>
                <th>Catagory</th>                                         
              </tr>
            </thead>
            <tbody>
           

              <?php
                  $query ="SELECT * FROM `master_subject_name`";
                  $exe =mysqli_query($conn,$query);
                  if(mysqli_num_rows($exe)){
                    while($rec = mysqli_fetch_array($exe)){
                ?>
              <tr>
                <td><?php echo $rec['subject_name'];?></td>
                <td><?php $sub_id=$rec['subject_cat_id'];
                $Query_sub_cat="SELECT * FROM `master_subject_catagory` WHERE `sl_no`='$sub_id'";
                $exeQuery_sub_cat =mysqli_query($conn,$Query_sub_cat);
                $recsub_id = mysqli_fetch_array($exeQuery_sub_cat);
                 echo $recsub_id['subject_cat'];
                ?></td>
                                     
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
        <h3>Subject Name</h3>
          <form class="form-horizontal" id="reli" action="admin_subject_name_save.php" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Subject Category:</label>
              <div class="col-sm-10 col-md-10 col-lg-9">
                <select name="cate_name" class="form-control" required="">
                  <option value="">--Select Category--</option>
                 <?php
                  $query = "SELECT  * FROM `master_subject_catagory`";
                  $exe = mysqli_query($conn,$query);
                  if(mysqli_num_rows($exe)){                
                    while($rec = mysqli_fetch_array($exe)){?>
                      <option value="<?php echo $rec['sl_no'];?>"><?=$rec['subject_cat'];?></option>
              <?php }
                  }
              ?> 
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="sub_name">Subject:</label>
              <div class="col-sm-10">
                <input type="text" name="sub_name" required="">                 
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

