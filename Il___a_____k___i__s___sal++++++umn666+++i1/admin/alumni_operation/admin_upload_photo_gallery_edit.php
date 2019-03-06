<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
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

<div class="tab-content">
        <center><h3>Edit Image </h3></center>
        

      <form class="form-horizontal" id="reli" action="admin_upload_photo_gallery_edit_save.php" method="POST" enctype="multipart/form-data">
         <?php
            $query = "SELECT * FROM `upload_photo_gallery` where `sl_no`='$sl_no'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
          
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            <div class="panel panel-default">


            
         <div class="panel-body">

            -<div class="form-group">
              <label class="control-label col-sm-2" for="img"> Photo:</label>
              <div class="col-sm-10 col-md-8">
                 <input type="hidden" name="id" value="<?php echo $sl_no; ?>"  />

              <img width="350" height="350" src="../uploads/<?php echo $rec ['photo'];?> "?>
               <center> <input type="file" name="img"  value="<?php echo $rec['photo'];?>"  /></center>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

           </div>
           </div>


             <?php  
            }
          }
            ?>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                
             <center> <b><input type="submit" name="submit" value="Update" class="btn btn-default"></b></center>
             <a href="admin_upload_photo_gallery_view.php">Back</a>
              </div>
            </div>

          </form>
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

