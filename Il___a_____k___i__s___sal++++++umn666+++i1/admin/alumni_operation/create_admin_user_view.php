<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
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
    <li class="active"><a data-toggle="pill" href="#home"><h4><b>View Expert User List</b> </h4></a></li>
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Designation</th>
                <th>Status</th>
               <!--  <th>Action</th> -->
                

                                                       
              </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM `admin_user_table`";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
           
              <tr>
                <td><?php echo $rec['sl_no'] ;?></td>
                <td><?php echo $rec['name'] ;?></td>
                <td><?php echo $rec['email'] ;?></td>
                <td><?php echo $rec['phone'] ;?></td>
                 <td><?php echo $rec['designation'] ;?></td>
                <td><?php echo $rec['status'] ;?></td>
              <td>
                <table class="table-bordered table-striped text-center">
                
                  <?php if($status==0){?>
                    <!-- <a class="btn btn-primary btn-xs" href="admin_user_replied_details.php?serial=<?=$rec['slno']?>">Reply</a> -->
                    <?php 
                  }
                ?>
               
                 
                 </tr> 
                </table>
                </td>                      
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
