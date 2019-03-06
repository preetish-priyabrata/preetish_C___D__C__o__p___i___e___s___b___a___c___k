<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#">Manage Roll No</a></li>
				<li class="active">Generate Roll No</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>
		<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Generate Roll No</div>
					</div>
					<div class="panel-body">
						<form action="admin_generate_roll_save" method="POST">
							<div class="form-group">
								<label class="control-label col-lg-3 text-right">Exam Category</label>
								<div class="col-lg-7">
									<select id="exam" name="exam" class="form-control" required>
					                    <option value="">--Select Exam--</option>
					                    <?php
					      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2'";
					      				            $sql_exam=mysqli_query($conn, $qry_exam);
					      				            while($res_exam=mysqli_fetch_array($sql_exam)){
					  				          ?>
					                            <option value="<?php echo $res_exam["slno_group"]; ?>"><?php echo $res_exam["exam_group"]; ?></option>
					                    <?php
					  				                }
					  				          ?>
					                </select>
								</div>
								
							</div>
							<div class="form-group">
								<table class="table">
								    <thead>
								      	<tr>
									        <th>Exam Center</th>
									        <th>Capacity</th>
									        <th>Action</th>
									        <th>Session</th>
									        <th>Total Capacity</th>
								      	</tr>
								    </thead>
								    <tbody>
								    	<?php 
								    	$x=0;
								    	$query_sql="SELECT * FROM `ilab_exam_center` where `status_exam`='1'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++
	        								?>
									    <tr>
									        <td> <input type="hidden" name="slno_exam[]" value="<?=$result['slno_exam']?>">
									        	<?=$result['exam_name']?></td>
									        <td><input type="hidden" name="total_seat[]" id="total_seat<?=$x?>" value="<?=$result['total_seat']?>"><?=$result['total_seat']?></td>
									        <td>
									        	<select name="ation[]" onchange="get_total(<?=$x?>)" id="action<?=$x?>">
									        		<option value="">--Please Select  --</option>
									        		<option value="1">Yes</option>
									        		<option value="2">No</option>
									        	</select>
											</td>
									        <td><select name="session[]" onchange="get_total(<?=$x?>)" id="session<?=$x?>">
									        		<!-- <option value="">--Please Select  --</option> -->
									        		<option value="1">1 Session</option>
									        		<option value="2">2 Session</option>
									        	</select></td>
									        <td><input type="text" name="total_capacity[]" id="total_capacity<?=$x?>" value="0" readonly></td>
									    </tr>
									   <?php }?>
									   <input type="hidden" name="total_no" id="total_no" value="<?=$x?>">
								    </tbody>
								    <tfoot>
								    	<tr>
								    		<td>Total</td>
								    		<td colspan="4"><input type="text" name="total_capacity_no_detail" id="total_capacity_no_detail" value="0" readonly></td>
								    	</tr>
								    </tfoot>
								</table>

							</div>

							<input type="submit" class="btn btn-info pull-right"  value="Assign Roll"  >
						</form>
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

<script type="text/javascript">
	function get_total(id) {

		var num1 =$("#total_seat"+id).val();
        var num2 = $("#session"+id).val();
        var total_capacity_no=0;
        var total =0;
        total= num1 * num2;
        console.log(total);
        $("#total_capacity"+id).val(total);

        var count_total =$("#total_no").val();
         console.log(count_total);
        for(var i = 1; i < count_total; i++)
			 {
			 	console.log(i);
			   id_t= $("#total_capacity"+i).val();
			    console.log(id_t);
			   total_capacity_no = total_capacity_no +  parseInt(id_t);
			   console.log(total_capacity_no);
			 }
			 $('#total_capacity_no_detail').val(total_capacity_no);

	}
</script>
