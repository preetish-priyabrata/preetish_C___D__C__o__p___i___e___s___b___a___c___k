<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Enquiry List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View User Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>User Information</li>
				<li class="active">User List</li>
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
				    <div class="panel-title">User Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>
									<th>Slno</th>	
				                    <th>Student Name</th>
				                    <th>Roll Number</th>
				                    <th>Email Id</th>
				                    <th>Phone No.</th>
				                    <th>Query</th>
				                    <th>Enquiry Date</th>
				                    <th>Action</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Slno</th>	
				                    <th>Student Name</th>
				                    <th>Roll Number</th>
				                    <th>Email Id</th>
				                    <th>Phone No.</th>
				                    <th>Query</th>
				                    <th>Enquiry Date</th>
				                    <th>Action</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										$query = "SELECT * FROM `tbl_enquiry` WHERE `enquiry_status` = 'Requested'  order by `enquiry_id` desc";
										$res = mysqli_query($conn, $query);
										  $i = 0;
               							  while ($rowEnquiry = mysqli_fetch_assoc($res)) {
               							  	$i++;
										?>
										<tr>
											<td><?=$i?></td>
											<td><?php echo $rowEnquiry['student_name']; ?></td>
					                        <td><?php echo $rowEnquiry['student_roll']; ?></td>
					                        <td><?php echo $rowEnquiry['student_email']; ?></td>
					                        <td><?php echo $rowEnquiry['student_phone']; ?></td>
					                        <td><textarea rows="3" cols="35" readonly="readonly" style="border: none;"><?php echo $rowEnquiry['student_query']; ?></textarea></td>
					                        <td><?php echo substr($rowEnquiry['date_time'], 0, 10); ?></td>
					                        <td><a href="enquiryList_delete.php?enquiry=<?php echo encryptIt_webs($rowEnquiry[0]); ?>" onclick="return confirm('Are you sure to delete.');">Delete</a></td>
										</tr>
										<?php }?>
									</tbody>
							</table>
						  </div>
			            </div>
				      </div>						
			        </div>
	           	  </div>
	            </div>

<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
