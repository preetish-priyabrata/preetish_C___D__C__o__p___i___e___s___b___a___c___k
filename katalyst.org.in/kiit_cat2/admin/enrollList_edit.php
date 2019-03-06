<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if (($_SESSION['userId']!="")) {
	require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//include 'config.php';
$title="Edit Enrollment Details";
$enroll = str_replace(" ", "+", $_GET['enroll']);
     $enroll = decryptIt_webs($enroll);
?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Edit Enrollment Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a> Enrollment List</li>
				<li class="active">Edit Enrollment Details </li>
			</ul>
		</div>
	</div>
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php $msg->display(); ?>
			</div>
		</div>
	</div>
	<!-- /Page Header-->
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Edit Enrollment Details</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="enrollList_edit_Save.php" method="POST">

				    <?php
           	   		   $query ="SELECT * FROM `tbl_enrollment` where `enrollment_id`='$enroll'";   
             		  $query_exe = mysqli_query($conn,$query);
               			          
              			$rec = mysqli_fetch_array($query_exe);
             	   ?>
                    <?php $msg->display(); ?>
               
                  <input type="hidden" value="<?php echo $rec['enrollment_id']; ?>" name="enrollment_id">
              
        
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Student Name</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="student_name" id="demo" placeholder="Enter Course Name" type="text" value="<?php echo $rec['student_name'];?>"" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Roll No</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="student_roll" id="demo" placeholder="Enter Course Name" type="text" value="<?php echo $rec['student_roll'];?>"" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Email Id</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="student_email" id="demo" placeholder="Enter Course Name" type="text" value="<?php echo $rec['student_email'];?>"" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Phone No</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="student_phone" id="demo" placeholder="Enter Course Name" type="text" value="<?php echo $rec['student_phone'];?>"" required="">
						   	</div>
						</div>
						 <div class="form-group">
							<label class="control-label col-lg-4 text-right">Course Name</label>
						  	<div class="col-lg-8">
								<!-- <input class="form-control" name="price" id="demo" placeholder="Enter Price Name" type="text" value="<?php echo $rec['student_course'];?>" required=""> -->
								<select name="stud_course" id="stud_course" class="form-control requiredField" required="" >
                                                    <option value="">--Course Name--</option>
                                                    <?php $select_cource="SELECT * FROM `tbl_course` WHERE `status`='1'";
                                                    $res_select = mysqli_query($conn, $select_cource);
                                                    while($row=mysqli_fetch_assoc($res_select)){?>                                                    <option value="<?=$row['sl_no']?>"<?php if($rec['student_course']==$row['sl_no']){ echo "selected";}?>><?=$row['course_name']?></option>
                                                    <?php }?>
                                                </select>
						   	</div>
						</div>
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Submit" onclick="myFunction()">
				   </div>
				 </form>
			   </div>
			 </div>						
		   </div>
		 </div>
	   </div>
	   <?php }else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>