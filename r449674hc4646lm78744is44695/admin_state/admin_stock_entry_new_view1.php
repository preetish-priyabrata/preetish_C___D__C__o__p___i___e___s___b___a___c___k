<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Challan Entry List
        <!-- <small>Indent Received</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Stock</a></li>
        <li class="active"><a href="#">Challan Entry List</a></li>
        <!-- <li class="active"><a href="#">Indent Received</a></li> -->
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
    <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <!-- end message displayed -->
      <div class="box box-info">
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of Challan Entered</strong></div>
        <div class="demo">
          <div class="panel-body">
          <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th>Sl. Nos </th>
                        <th>Challan No</th>                        
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $x=0;
                        $query_challan="SELECT * FROM `rhc_master_chall_state` order by `slno`";
                        $sql_challan=mysqli_query($conn,$query_challan);
                        while ($result=mysqli_fetch_assoc($sql_challan)) {
                          $x++;
                          ?>
                        <tr>
                          <td><?=$x?></td>
                          <td><?=$result['challan_no']?></td>
                          <td><?=$result['date']?></td>
                          <td><?=$result['time']?></td>
                          <td><?php $status=$result['status'];
                                  if($status==2){?>
                                  <b style="color:green">Confirm</b>
                                  <?php }else if($status==0 || $status==1){ ?>
                                  <b style="color:red">Not Confirm</b>
                                  <?php }
                          ?></td>
                          <td><?php
                            if($status==2){?>
                              <a href="admin_view_conform_information.php?challan_no=<?=$result['challan_no']?>"><b style="color:green">More</b>
                            <?php }else  if($status==0 || $status==1) { ?>
                              <a href="admin_view_not_conform_information.php?challan_no=<?=$result['challan_no']?>"><b style="color:red">More</b>
                            <?php }
                          ?>
                         </td>
                        </tr> 
                         <?php

                        }

                      ?> 
                    
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
