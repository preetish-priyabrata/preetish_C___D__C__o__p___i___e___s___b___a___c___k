<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['postexam_user']){
	$exam="";
	if(isset($_POST['search'])){
		$exam=$_POST['exam'];
	}
	
?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>
   <br>
 	<div class="container-fluid">
    	<div class="row">
		  	 
		  	<div class="col-lg-6 col-lg-offset-4">
		  		<form class="form-inline" method="POST" action"postexam_generate_publish.php">
		  			<div class="form-group">
				  		<label >Select Exam</label>
		            		<select id="exam" name="exam" class="form-control" required >
			                	<option value="">--Select Exam--</option>
				              <?php
								  	$qry_exam="SELECT * FROM `post_exam_preparation`";
								 	$sql_exam=mysqli_query($conn, $qry_exam);
									while($res_exam=mysqli_fetch_array($sql_exam)){
							  ?>
				                <option value="<?php echo $res_exam["exam_name"]; ?>" <?php if($exam==$res_exam['exam_name']){echo "selected";}?>><?php echo $res_exam["exam_name"]; ?></option>
				              <?php
								  	}
							  ?>
							</select>
					</div>
					<button type="submit" name="search" class="btn btn-primary">View Qualified List</button>
				</form>
			</div>
		  
		</div>
    </div>

<?php }else{
	header("location:logout.php");
	exit;
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';

if(isset($_POST['search'])){

       
        //check wheather exam is prepared
        $qry_exam="SELECT * FROM `post_exam_publish` where `exam_name`='$exam'";
        $sql_qry_exam=mysqli_query($conn, $qry_exam);
        $num_row_qry_exam=mysqli_num_rows($sql_qry_exam);
        if($num_row_qry_exam==0){
        //no of applied application
        $qry_new="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes'";
        $sql_new=mysqli_query($conn, $qry_new);
        $num_row_new=mysqli_num_rows($sql_new);
        //no of approved appliction
        $qry_verified="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='1' ";
        $sql_verified=mysqli_query($conn, $qry_verified);
        $num_row_verified=mysqli_num_rows($sql_verified);		
        //no of rejected application
        $qry_rejected="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer!='1' or candidate_application_info.application_verification_officer='3' ";
        $sql_rejected=mysqli_query($conn, $qry_rejected);
        $num_row_rejected=mysqli_num_rows($sql_rejected);
        //no of Not Appeared
        $qry_absent="SELECT * FROM `post_exam_attendance_candidate` where `attendance_status`='0' And `exam_name`='$exam' ";
        $sql_absent=mysqli_query($conn, $qry_absent);
        $num_row_absent=mysqli_num_rows($sql_absent);
           //no of appeared
        $qry_present="SELECT * FROM `post_exam_attendance_candidate` where `attendance_status`='1' And `exam_name`='$exam' ";
        $sql_present=mysqli_query($conn, $qry_present);
        $num_row_present=mysqli_num_rows($sql_present);
        ?>
<div class="container">
	<div class="row">
		<div class="col-lg-3">
		  	
		  	<div class="panel panel-default">
			    <div class="panel-heading">Information About Exam :- <?=$exam?> </div>
			   	<table class="table">
					<tbody><tr>
					<th>Total Applied:</th>
					<td><?=$num_row_new?></td>
					</tr>
					<tr>
					<th>Total Approved:</th>
					<td><?=$num_row_verified?></td>
					</tr>
					<tr>
					<th>Total Appeared:</th>
					<td><?=$num_row_present?></td>
					</tr>
					<tr>
					<th>Total Not Appeared:</th>
					<td><?=$num_row_absent?></td>
					</tr>
					<tr>
					<th>Total Rejected:</th>
					<td><?=$num_row_rejected?></td>
					</tr>
					<tr>
					<td colspan="2" style="text-align:center">
					
					</tr>
					</tbody>
				</table>
			</div>
		</div>
<div class="col-lg-9">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<h5>Qualified Candidate List <?=$exam?> Exam Qualified</h5>
		    </div>
		    <form action="postexam_save_result_publish.php" method="POST">
		    <div class="panel-body">
		    <?php $query_cut="SELECT * From `postexam_cut_off_mark_exam_category` Where `exam_name`='$exam'";
		    		$sql_cut=mysqli_query($conn,$query_cut);
		    		while ($res_cut=mysqli_fetch_array($sql_cut)) {?>
		     <br>	
		    <div class="col-lg-4">
		    <label>Category :-</label> <u><?=$res_cut['category_name']?>   <input type="hidden" name="category_names[]" value="<?=$res_cut['category_name']?> "></u>
		    </div>
		    <br>
		    	<table width="99%" border="2" cellspacing="10" cellpadding="10">
		    		<thead>
					    <tr>
						    
						    <th width="23%" scope="col">Roll No</th>
						    <th width="25%" scope="col">Application No</th>
						    <th width="25%" scope="col">Name</th>
						    <!--<th width="20%" scope="col">Mark</th>-->
					  	</tr>
					  </thead>
			 	</table>
			 	
			 	<div style="height:300px; overflow:scroll; ">
				  <table width="100%" border="2" cellspacing="10" cellpadding="10"class="table table-hover">
				  <?php
				  $qry_no_app="SELECT * FROM `pre_exam_candidate` INNER JOIN `post_exam_center_mark_roll` on post_exam_center_mark_roll.application_no = pre_exam_candidate.application_no AND post_exam_center_mark_roll.roll_no=pre_exam_candidate.roll_no and post_exam_center_mark_roll.marks>='$res_cut[cut_off]' WHERE pre_exam_candidate.exam_name='$exam' AND pre_exam_candidate.category='$res_cut[category_name]' ORDER BY post_exam_center_mark_roll.marks desc";
        					$sql_no_app=mysqli_query($conn, $qry_no_app);
        					$num_no_app=mysqli_num_rows($sql_no_app);
        					if($num_no_app==0){
        						echo "No Candidate is Applicable For This Category ".$res_cut['category_name'];
        					}
        					while ($res_mark=mysqli_fetch_array($sql_no_app)) {
        							$qry_name_user="SELECT * From `candidate_personal_details` where `application_no`='$res_mark[application_no]'";
        							$sql_name_user=mysqli_query($conn,$qry_name_user);
        							$res_name_user=mysqli_fetch_array($sql_name_user);
        						?>

        					<tr>
							    
							    <th width="23%" scope="col">
							    <input type="hidden" name="category_name[]" value="<?=$res_cut['category_name']?> ">
							    	<input type="hidden" name="roll_no[]" value="<?=$res_mark['roll_no']?>">
							    	<?=$res_mark['roll_no']?>
							    	
							    </th>
							    <th width="25%" scope="col">
							    	<input type="hidden" name="application_no[]" value="<?=$res_mark['application_no']?>">
							    	<?=$res_mark['application_no']?>
							    </th>
							    <th width="25%" scope="col">
							    	<input type="hidden" name="candidate_name[]" value="<?=$res_name_user['candidate_name']?>">
							    	<?=$res_name_user['candidate_name']?>
							    </th>
							    <input type="hidden" name="marks[]" value="<?=$res_mark['marks']?>">
							    
					  		</tr>
<?php }
        			?>
				    
				  </table>
				  
  				</div>
  				<?php }?>
  				<input type="hidden" id="exam" name="exam" value="<?=$exam?>">
  				<div class="row">
  				<!--<div class="col-lg-6">
  				<label >Total Qualified</label>
  				</div>
  				<div class="col-lg-6">
  				<span id="total"></span>
  				</div>
  				</div>-->
  				<span style="color:red;">Note : One Time Publish Report  For The Exam  <?$exam?> </span>
			</div>
				 <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary" onclick="return confirm('<?php echo "Are you sure you want to Publish Result Prepared For The Exam " .$exam. "? ";?>');">Publish</button>
          </div>
		   </form>	
		 </div>
	</div>
  </div>








<?php 
}else{?>
	<div class="col-md-12">
        <div class="alert alert-success text-center">
          <strong > Result Is Already Published For The Exam :- <?=$exam?> </strong>
        </div>
      </div>
<?php }
}

?>
			    