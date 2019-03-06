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
<h1>List Of Branches
</section>

 <section class="content">
    <!-- success or error message alert -->
    	<div class="text-center">
			 
        <?php $msg->display(); ?>
    
		  </div>

		
    <!-- end success or error message alert  -->

    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">List Of Branches </a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
         
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped text-center">
              <thead>
              <tr>
                  <th>Sl.No</th>
                  <th>Academy Name</th>
                  <th>Branch</th>
                  <th>Status</th>
                  <th>Action</th> 
             </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM `kiit_branch` where `B_status`='1'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              $count =1;
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            
                <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $rec['B_academy_id'] ;?></td> 
                 <td><?php echo $rec['B_branch'] ;?></td> 
                 <td><?php echo $rec['B_status'] ;?></td>      
                  <td>

                  <a href="admin_branch_edit.php?sl_no=<?php echo $rec['B_slno'];?>" class="label label-primary" target="_blank">Edit</a>
                 
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
