

<?php
session_start();
ob_start();
if(isset($_SESSION['admin_moderator'])){
require 'FlashMessages.php';
include '../config.php';
$slno=$_GET['slno'];
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
    <li class="active"><a data-toggle="pill" href="#home"><h4>View Post Details</h4> </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>

        
   <form method="POST" enctype="multipart/form-data" action="admin_moderator_unapproved_user_dashboard_post_update.php">
      <?php
        $query = "SELECT * FROM `admin_user_post` where `slno`='$slno'";  
        $query_exe = mysqli_query($conn,$query);
        $num=mysqli_num_rows($query_exe);
        if($num==1){ 
         $fetch=mysqli_fetch_assoc($query_exe);
              ?>
              <table class="table">
              <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['text_message'];?></td>
            </tr>
         <tr>
           
          <td><h4><b>Photo</b></h4></td>
           <td>:</td>
            <input type="hidden" name="text_id" value="<?=$slno?>">
             <td><img height="300" width="600" src="../uploads/public_post/<?php echo $fetch['attach_file'];?> "?></td>
            </tr>
            
            </table>

             
          <?php
        }else{
          $msg->success('This post already view by You');
          header('Location:admin_dashboard.php');
          exit;
        }?>
    
    <input type="hidden" name="slno" value="<?=$slno?>"> 
   
     <br>
     <div class="row">
     <div class="text-center">


     <a class="btn btn-default" href="admin_moderator_rejected_user_dashboard_post_list.php">Back</a>
     
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
