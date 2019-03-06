<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
  $indent_id=$_REQUEST['indent_id'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Update Sent History List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Update</a></li>
        <li><a href="#">  Update History</a></li>
        <li class="active"><a href="#"> Update Sent History</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
    <div class="row">
    <div class="col-sm-11">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of Update Sent History</strong></div>
        <div class="demo">
          <div class="panel-body">
          <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                          <th>Serial Nos </th>
                       
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $place_id=$_SESSION['place_id'];
                    $x=0;
                      $query_list="SELECT * FROM `rhc_master_update_phc_aphc_stock` WHERE `updated_place_from`='$place_id'  ";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
                        $x++;
                        ?>              

                    <tr>
                      <td><?=$x?></td>                      
                      <td><?=date('d-m-Y',strtotime(trim($res_list['date'])));?></td>
                      <td><?=date('h:i:s a',strtotime(trim($res_list['time'])));?></td>
                      <td><a href="admin_update_stock_sent_details.php?slno=<?=$res_list['slno'];?>" class="btn btn-info" role="button">View Details</a></td>
                    </tr>
                    <?php }?>
                    </tbody>
              </table>
        </div>
        <div class="row">
            <div class="col-sm-12">
             <div class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </div>
          </div>
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
