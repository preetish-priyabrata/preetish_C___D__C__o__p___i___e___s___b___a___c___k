<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_GET['sl_no'];
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
  
    
    <table  class="table  table-striped">
    
 <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"><h4>View Sharing Details Information</h4> </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>

        
          

          <?php
        $query ="SELECT * FROM `user_sharing_info_details` where `sl_no`='$sl_no' and `status`='0'";   
        $query_exe = mysqli_query($conn,$query);
        $num=mysqli_num_rows($query_exe);
        if($num==1){ 
          $fetch=mysqli_fetch_assoc($query_exe);
          $post_type=$fetch['post_type'];
          switch ($post_type) {
            case '1':
              ?>
              <table class="table">
              <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
            </tr>
            <tr>
             <td><img height="200" width="200" src="../uploads/photo/<?php echo $fetch['photo'];?> "?></td>
            </tr>
            </table>

              <?php
              break;
            case '2':?>
            <table class="table">
              <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
            </tr>
            <tr>
              <td><h4><b>Text</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['text'];?></td>
            </tr>
            </table>
            <?php
              break;
            case '3':
              ?>
              <table class="table">
              <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
            </tr>
            <tr>
              <td><h4><b>URL</b></h4></td>
              <td>:</td>
              <td><iframe src="<?php echo $fetch['url'];?>" width="1000" height="1000"></iframe>

              <p><a href="<?php echo $fetch['url'];?>" target="iframe_a">Click Here To view </a></p>
              </td>
            </tr>
            </table>
              <?php
              break;
            case '4':
             ?>
               <table class="table">
                 <tr>
                  <td><h4><b>Title</b></h4></td>
                  <td>:</td>
                  <td><?php echo $fetch['title'];?></td>
                </tr>
                <tr>
                  <td><h4><b>Text</b></h4></td>
                  <td>:</td>
                  <td><?php echo $fetch['text'];?></td>
                </tr>
                <tr>
                 <td><img height="200" width="200" src="../uploads/photo/<?php echo $fetch['photo'];?> "?></td>
                </tr>
               </table>
             <?php
              break;
            default:
              # code...
              break;
          }
        }else{
          $msg->success('This post already view by You');
          header('Location:alumni_dashboard.php');
          exit;
        }?>
    <form method="POST" enctype="multipart/form-data" action="admin_Approved_sharing_details_updated.php">
    <input type="hidden" name="slno" value="<?=$sl_no?>"> 
    <div class="row">
    <div class="text-center">
     <label class="radio-inline"><input type="radio" name="click" value="Rejected" required="">Rejected</label>
     <label class="radio-inline"><input type="radio" name="click" value="Approved" required="">Approved</label>
     </div>
     </div>
     <br>
     <div class="row">
     <div class="text-center">


     <a class="btn" href="admin_UnApproved_sharing_details.php">Back</a>
       <input type="submit" class="btn" name="submit" value="Ok">
       </div>
       </div>
       <br>
   </form>
  </div>
  </div>
 
  <br>
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
