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
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">View Image </a></li>
    </ul>
    <div class="panel-body">
         <div class="panel panel-default">
       <?php
            $query = "SELECT * FROM `user_gallery_upload` where `sl_no`='$sl_no'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
          
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
      
           <div class="form-group">
              <label class="control-label col-sm-3" for="img"> Title:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="id" value="<?php echo $sl_no; ?>"  />
                 <div><h4><?php echo $rec['title'] ;?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

          <div class="form-group">
           <label class="control-label col-sm-2" for="img"> Photo:</label>
              <div class="col-sm-10 col-md-8">
                 <input type="hidden" name="id" value="<?php echo $sl_no; ?>"  />
                  <img width="500" height="300" src="../uploads/gallery/<?php echo $rec['thumb'];?>" ><br>
                  <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

               <div class="panel-body">
             <?php  
            }
          }
            ?>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                
             <a href="admin_published_photo_gallery_list.php">Back</a>
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

