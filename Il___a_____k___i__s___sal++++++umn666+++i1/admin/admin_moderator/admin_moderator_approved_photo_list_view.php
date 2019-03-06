<?php
session_start();
ob_start();
if(isset($_SESSION['admin_moderator'])){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_GET['sl_no'];
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
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">View Image </a></li>
   
  </ul>

<div class="tab-content">    
 <table id="" class="table table-bordered table-striped text-center">
      
         <?php
            $query = "SELECT * FROM `user_gallery_upload` where `sl_no`='$sl_no'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
          
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            <div class="panel panel-default">


            
          <table class="table">
            <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $rec['title'];?>
              </tr>
              <input type="hidden" name="text_id" value="1">
              <tr>
              <td><h4><b>Photo</b></h4></td>
              <td>:</td>
              <td> <img width="500" height="300" src="../uploads/gallery/<?php echo $rec['thumb'];?>" ><br></td>
              </tr></iframe>
              </tr>
               </table>
          

               <div class="panel-body">

          

             <?php  
            }
          }
            ?>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                
             <a href="admin_moderator_approved_photo_list.php">Back</a>
              </div>
            </div>

           </div>

      </div>
    </div>
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

