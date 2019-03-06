<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Class Details
        <small> Here School Class Information Is Created and Viewed </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Class & Section</a></li>
        <li class="active"><b>Manage Class</b></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
    	<div class="text-center">
			  <?php 
          $msg->display(); 
          $sql_class_detail="SELECT * FROM `master_class` ORDER BY `slno_class` ASC";
          $sql_query_detail=mysqli_query($conn,$sql_class_detail);
          $num_rows=mysqli_num_rows($sql_query_detail);
        ?>
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     
          
            <div class="box-header">
              <a href="admin_add_class.php" class="btn btn-info" role="button">Add Class</a>
            </div>
      

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Class Name</th>
                    <th>Class Section Name</th>
                                       
                  </tr>
                </thead>
                <tbody>
                <?php 
                    while ($res_fetch=mysqli_fetch_assoc($sql_query_detail)) {

                      $sql_class_section_detail="SELECT * FROM `master_class_section` WHERE `class`='$res_fetch[slno_class]' AND `status`='1'";
                      $sql_query_section_detail=mysqli_query($conn,$sql_class_section_detail);
                      $section_no=mysqli_num_rows($sql_query_section_detail);
                ?>
                  <tr>
                     <td><?=$res_fetch['slno_class']?></td>
                    <td><?=$res_fetch['class_name']?></td>
                    <td>
                      <?php
                      $x=1;
                      if($section_no)  {
                        while ($res_fetch_section=mysqli_fetch_assoc($sql_query_section_detail)) {
                          if($x!=$section_no){
                            echo $res_fetch_section['section'].",";
                          }else{
                            echo $res_fetch_section['section'].".";
                          }

                          $x++;
                        }
                      }else{
                        echo "<h6 style='color:red;'>Not Assigned Yet</h6>";
                      }

                        ?>
                      
                    </td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
               
              </table>
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
