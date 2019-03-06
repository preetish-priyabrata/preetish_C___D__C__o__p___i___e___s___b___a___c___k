
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
      <h1>
      List of Documents Published
        <small> </small>
      </h1>
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
   <li class="active"><a data-toggle="pill" href="#home"> List of Documents Published </a></li>
  
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
            $query = "SELECT * FROM `user_sharing_Info` where `admin_status`='1'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){      
                $x++;
            ?>
            
              <tr>
                <td><?php echo $x ;?></td>
                <td><?php echo $rec['title'] ;?></td>
                <td><a href="admin_published_text_pdf_url_list_view.php?sl_no=<?php echo $rec['sl_no'];?>" class="label label-primary" target="_blank">view</a></td> 
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
