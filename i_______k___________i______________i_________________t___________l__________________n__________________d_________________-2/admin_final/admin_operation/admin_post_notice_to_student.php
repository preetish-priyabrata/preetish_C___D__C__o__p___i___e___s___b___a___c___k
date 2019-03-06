<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
include '../config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notice To User
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Notice To Alumni</a></li>
        <li class="active">Send A Notice</li> 
      </ol>
    </section>
<style type="text/css">
  input[type=file]{
    width:100%;
    color:transparent;
}
</style>
    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			 <?php $msg->display(); ?>
		  </div>
      <div class="row">
          <!-- end success or errot message alert  -->
          <div class="col-lg-12 ">
            <div class="box">
              <div class="panel panel-default">
                <div class="panel-heading text-center success">Notice User Post</div>
                <div class="panel-body">
                
                  <form class="form-horizontal" action="admin_post_notice_to_student_save.php" method="POST" enctype="multipart/form-data">


                    <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd"></label>
                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="pwd" name="serial" value="<?=$sl_no_one?>" placeholder="Enter password">
                    </div>
                   </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="comment">Subject Title:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="title"  id="comment" required="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="comment">Notice:</label>
                      <div class="col-sm-7">
                        <textarea class="form-control" name="Notice" rows="4" id="comment" required=""></textarea>
                      </div> 
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="stream">Stream:</label>
                        <div class="col-sm-7">
                          <select class="form-control" name="stream" id="stream" required="">
                            <option value="All">All</option>
                          <?php 
                              $query="SELECT * FROM `kiit_accademy`";
                              $sql_exe=mysqli_query($conn,$query);
                              if(mysqli_num_rows($sql_exe)){
                              while ($rec = mysqli_fetch_array($sql_exe)) {?>
                              <option value="<?php echo $rec['A_slno'];?>"><?=$rec['A_name'];?></option>
                           ?>
                
                      <?php 
                         }
                          }
                      ?> 
                 </select>
                      </div> 
                    </div>
              
                      <div class="form-group text-center">
                          <label class="radio-inline"><input type="radio" name="optradio" value="1" required>All Students</label>
                          <label class="radio-inline"><input type="radio" name="optradio" value="2" required="">Individual</label>
                     
                      </div>
                        <br>                    
                        <div class="form-group text-center">
                       
                        <button type="submit" class="btn btn-default text-center">Submit</button>
                      </div>                   
                    </form>
                  </div>
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

<!-- <script type="text/javascript">
  window.pressed = function(){
    var a = document.getElementById('aa');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose file";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};
</script> -->