<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';

$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
<section class="content-header">
<h1>View Photos
<small></small>
</h1>	
</section>

 <section class="content">
    <!-- success or error message alert -->
    	<div class="text-center">
			 
        <?php $msg->display(); ?>
    
		  </div>

		
    <!-- end success or error message alert  -->
    <div class="box">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
         
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
                 <th>Sl.No</th>
                 <th>Photo</th>
                 <th>Date</th>
                 <th>Time</th>
                  <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM `upload_photo_gallery`";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              $count =1;
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            
                <tr>
                <td><?php echo $count;?></td>
               
               
                <td><img src="../uploads/<?php echo $rec['photo'];?>" width="370" heigth="100"></td>
                <td><?php echo $rec['date'] ;?></td> 

                <td><?php echo $rec['time'] ;?></td>
                <td>
                <table class="table-bordered table-striped text-center">
                  <tr>
                  <td>
                  <a href="admin_upload_photo_gallery_edit.php?sl_no=<?php echo $rec['sl_no'];?>" class="label label-primary" target="_blank">Edit</a></td>
                   
                   <td><a href="admin_delete_photo_gallery.php" class="label label-danger" name="click" >Delete</a></td>
                 </tr> 
                </table>
                </td>                      
              </tr>
          <?php
          $count++;
            }
            }
            ?>
            </tbody>                 
          </table>
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
