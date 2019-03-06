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
    <li class="active"><a data-toggle="pill" href="#home"><h4>View Photo Details</h4> </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>

        
          
        <form method="POST" enctype="multipart/form-data" action="admin_Approved_photo_details_updated.php">
          <?php
        $query ="SELECT * FROM `user_gallery_upload` where `operation_status`='1' and `moderator_status`='1' and `approval_status`='1' and  `publish_status`='0' and `sl_no`='$sl_no' ";   
        $query_exe = mysqli_query($conn,$query);
        $num=mysqli_num_rows($query_exe);
        if($num==1){ 
         $fetch=mysqli_fetch_assoc($query_exe);
              ?>
              <table class="table">
              <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
            </tr>
            
            
            <tr>
            <td></td>
          <td></td>
            <input type="hidden" name="text_id" value="<?=$sl_no?>">
           
             <td><img height="200" width="200" src="../uploads/gallery_big/<?php echo $fetch['photo'];?> "?></td>
            </tr>
            
            </table>

             
          <?php
        }else{
          $msg->success('This post already view by You');
          header('Location:admin_dashboard.php');
          exit;
        }?>
    
    <input type="hidden" name="slno" value="<?=$sl_no?>"> 
    <div class="row">
    <div class="text-center">
     <!-- <label class="radio-inline"><input type="radio" name="click" value="Rejected" required="">Rejected</label> -->
     <label class="radio-inline"><input type="radio" name="click" value="Approved" required="">Publish</label>
     </div>
     </div>
     <br>
     <div class="row">
     <div class="text-center">


     <a class="btn" href="admin_moderator_unapproved_photo.php">Back</a>
       <input type="submit" class="btn" name="submit" value="Verified">
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
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>