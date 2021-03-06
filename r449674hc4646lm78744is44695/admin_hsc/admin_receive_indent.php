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
        Received Indent List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Receive</a></li>
        <li class="active"><a href="#">Indent Received</a></li>
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
      <div class="box box-info">
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of Indent Received</strong></div>
        <div class="demo">
          <div class="panel-body">
          <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>
                        <th>Location Name</th>
                        <th>Indent Id</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                      $x=1;
                      $place_id=$_SESSION['place_id'];
                      $query_list="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_place_raised_to`='$place_id' AND `status`='1'";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      while($result_list=mysqli_fetch_assoc($sql_exe_list)){
                    ?>
                    <tr>
                      <td><?=$x?></td>
                      <td>
                        <?php 
                          
                            echo "ASHA[".$result_list['indent_place_raised_by']."]";
                          

                        ?>
                      </td>
                      <td><?=$result_list['indent_id'];?></td>
                      <td><?=date('d-m-Y',strtotime(trim($result_list['date_creation'])));?></td>
                      <td><?=date('h:i:s a',strtotime(trim($result_list['time_creation'])));?></td>
                      <td><a href="admin_issue_indent.php?indent_id=<?=$result_list['indent_id'];?>" class="btn btn-info" role="button">Issue</a></td>
                    </tr>
                    <?php 
                      $x++;
                    }?>
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
