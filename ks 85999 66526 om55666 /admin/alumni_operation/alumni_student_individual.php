<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$serial=$_GET['serial'];
$check_assign="SELECT * FROM `admin_admin_post_temp` WHERE `slno`='$serial' and `assign_completed`='0'";
 $sql_exe_check=mysqli_query($conn,$check_assign);
 $num=mysqli_num_rows($sql_exe_check);
 if($num!="1"){
 	$msg->warning('Message to Individual Alumni has send Already');
	header('Location:alumni_dashboard.php');
	exit();
 }
    $query="SELECT * FROM `master_user_registration` where `status`='1' " ;
    $sql_exe=mysqli_query($conn,$query);
    $x=mysqli_num_rows($sql_exe);
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Select Alumni Message Send
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
                  		<h4><b>Alumni List</b></h4>
                    </div>
                    <div class="panel-body">
	                    <form action="alumni_student_individual_save.php" method="POST">
	                    	<input type="hidden" name="serial" value="<?=$serial?>">
	                     	<table id="example1" class="table table-bordered table-striped text-center">
		                     	<thead>
		                     		<tr>
				                        <th>Sl.No</th>
				                        <th>Name</th>
				                        <th>Image</th>
				                        <th>Year Passing</th>
				                        <th>Stream</th>
				                        <th>Action</th>                                     
			                      	</tr>
		                    	</thead>
		                    	<tbody>
		                    		<?php
				                        $y=0;                    
				                        while($rec=mysqli_fetch_array($sql_exe)){    
				                          $y++  ;

				                          ?>
				                    	<tr>
				                    		<td><?php echo $y ;?></td>
					                        <td><?php echo $rec['name'] ;?></td>
					                        <td><img width="130" height="100" src="../upload/cadidate_reg_photo/<?php echo $rec['photo'];?>" ></td>
					                        <td><?php echo $rec['pass_year'];?></td>
					                        <td><?php echo $rec['stream'];?></td>
					                        <td><label class="checkbox-inline"><input name="alumni_student[]" type="checkbox" value="<?php echo $rec['sl_no'] ;?>"></label></td>
					                    </tr>
					                    <?php }?>
		                    	</tbody>
	                    	</table>
	                    	<div class="text-center">
			                    <input type="submit" class="btn btn-info" role="button" value="Save">
			                </div>
	                    </form>
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
