<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
// $sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
       List Of Rejected Documents
        <small> </small>
      </h3>
      <!---<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam Master</a></li>
        <li class="active"><b>View Exam & Add Category</b></li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
      <div class="text-center ">
       
        <?php $msg->display(); ?>
    
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"> List Of Rejected Documents </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11 ">
      
        <div class="table-responsive col-lg-11">
          <table id="" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Title</th>
                <th>Action</th> 
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            $query = "SELECT * FROM `user_sharing_Info` where `admin_status`='6'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){      
                $x++;
            ?>
            
              <tr>
                <td><?php echo $x ;?></td>
                <td><?php echo $rec['title'] ;?></td>
                <td><a href="admin_rejected_text_pdf_url_list_view.php?sl_no=<?php echo $rec['sl_no'] ;?>" class="label label-success">view</a></td>
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
