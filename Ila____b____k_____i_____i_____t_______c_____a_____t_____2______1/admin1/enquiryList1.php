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
	
<!-- BEGIN RIGHTSIDE -->
        <div class="rightside bg-grey-50">
			<!-- BEGIN PAGE HEADING -->
            <div class="page-head">
				<h1 class="page-title">Enquiry List<small>All Start From Here</small></h1>
			</div>
			<div class="container-fluid page-content">
				<div class="row">
				<?php $msg->display(); ?>
					
				</div>
			</div>

			<!-- END PAGE HEADING -->
			<div class="container-fluid">
				<div class="row">
				<div class="col-lg-12">
					<div class="panel no-border ">
                    	<div class="panel-title bg-white no-border">
							<div class="panel-head">Data Table</div>
								<div class="table-responsive">
									<table id="example" class="display nowrap" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Slno</th>	
						                    <th>Student Name</th>
						                    <th>Roll Number</th>
						                    <th>Email Id</th>
						                    <th>Phone No.</th>
						                    <th>Query</th>
						                    <th>Enquiry Date</th>
						                    <th>&nbsp;</th>
						                </tr>
									</thead>
									<tbody>
										<?php 
										$query = "SELECT * FROM `tbl_enquiry` WHERE `enquiry_status` = 'Requested'  order by `enquiry_id` desc";
										$res = mysqli_query($conn, $query);
										  $i = 0;
               							  while ($rowEnquiry = mysqli_fetch_array($res)) {
               							  	$i++;
										?>
										<tr>
											<td><?=$i?>
											<td><?php echo $rowEnquiry['student_name']; ?></td>
					                        <td><?php echo $rowEnquiry['student_roll']; ?></td>
					                        <td><?php echo $rowEnquiry['student_email']; ?></td>
					                        <td><?php echo $rowEnquiry['student_phone']; ?></td>
					                        <td><textarea rows="3" cols="35" readonly="readonly" style="border: none;"><?php echo $rowEnquiry['student_query']; ?></textarea></td>
					                        <td><?php echo substr($rowEnquiry['date_time'], 0, 10); ?></td>
					                        <td><a href="enquiryList.php?enquiry=<?php echo encryptIt($rowEnquiry[0]); ?>" onclick="return confirm('Are you sure to delete.');">Delete</a></td>
										</tr>
										<?php }?>
									</tbody>
									</table>
								</div>
						</div>
					</div>
				</div>
				</div>
            </div><!-- /.container-fluid -->
        </div><!-- /.rightside -->
<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
