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
     <div class="container-fluid">
    	<div class="row">
		  	 
		  	<div class="col-lg-6 col-lg-offset-4">
		  		<form class="form-inline" method="POST" action"generate_intimation.php">
		  			<div class="form-group">
				  		<label >Select Exam</label>
		            		<select id="exam" name="exam" class="form-control" required >
			                	<option value="">--Select Exam--</option>
				              <?php
								  	$qry_exam="SELECT * FROM `generate_intiamation_exam`";
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
       
        // check wheather exam is prepared
        $qry_exam="SELECT * FROM `generate_intiamation_exam` where `exam_name`='$exam'";
        $sql_qry_exam=mysqli_query($conn, $qry_exam);
        $num_row_qry_exam=mysqli_num_rows($sql_qry_exam);
        if($num_row_qry_exam==1){
        // no of applied application
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
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2">
		  	
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

<?php
			}else{?>
		<div class="col-md-12">
		        <div class="alert alert-success text-center">
		          <strong>Already Intimation Is Generated  For The Exam :- <?=$exam?></strong>
		        </div>
		      </div>
<?php			}  
    }else{
?>
       <div class="col-md-12">
        <div class="alert alert-success text-center">
          <strong > Please Select The Exam </strong>
        </div>
      </div>
<?php 
  }

  if(isset($_POST['search'])){
  	 // check wheather exam is prepared
        $qry_exam="SELECT * FROM `generate_intiamation_exam` where `exam_name`='$exam'";
        $sql_qry_exam=mysqli_query($conn, $qry_exam);
        $num_row_qry_exam=mysqli_num_rows($sql_qry_exam);
        if($num_row_qry_exam==1){
  ?>
  
	<div class="col-lg-10">
		<div class="panel panel-default">
		<h3> Report For Intimation For Exam :- <?=$exam?></h3>
		   <div class="table-responsive">          
			  <table class="table">
			    <thead>
			      <tr>
			       <th  scope="col">Sl.No.</th>
				    <th  scope="col">Category</th>
				    <th  scope="col">Total Appeared</th>
				    <th  scope="col">Cutt-Off</th>
				    <th  scope="col">Total Qualified</th>
				    <th  scope="col">Top Rank </th>
				    <th  scope="col">Candidate to be called</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php 
				   		$i=0;
				   		$qry_category="SELECT * FROM `post_generate_report_exam_category` where `exam_name`='$exam'";
				   		$sql_category=mysqli_query($conn, $qry_category);
				   		$total_qualfi=0;
				   		$total_appeared=0;
				   		$no_call=0;
				   		while ($results=mysqli_fetch_assoc($sql_category)) { 
				   			$i++;
				   			

				   			?>
				   	
				  	<tr>
				      	<td scope="row"><?=$i?>.</td>
				      	<td  scope="row">
				      		<small><?=$results['category_name']?></small>
				      		<input type="hidden"  name="category_name[]" id="category_name<?=$i?>" value="<?=$results['category_name']?>">
				      		
				      	</td>
				      	<td>
				      		<div align="center">
				      			<?php echo $y=$results['total_app'];
				      			$total_appeared=$total_appeared+$y;
				      			?>
				      			<input type="hidden"  name="total_app[]"  value="<?=$results['total_app']?>">
				      		</div>
				      	</td>
				      	<td >
				      		<div align="center">
				      		<?=$results['cut_off']?>
				      		<input type="hidden"  name="cut_off[]"  value="<?=$results['cut_off']?>">
				      		</div>
				      	</td>
				      	<td >
				      		<div align="center">
				      		<?php echo $x=$results['total_qualfi'];
				      				$total_qualfi=$total_qualfi+$x;
				      		?>
				      		
				      		</div>
				      	</td>
				      	
				      		<td  scope="row">0-<?=$results['rank']?></td>
				      		<td scope="row"><?php echo $results['no_call'];
				      			$no_call=$no_call+$results['no_call'];
				      		?></td>
				      		
				    </tr>
				    <?php }?>
				    
			    </tbody>
			  </table>


			  <br>
  				<div class="row">
  				<div class="col-lg-4">
  				<label class="col-lg-5">Total Appeared :-</label><div class="col-lg-1"><?=$total_appeared?></div>
  				</div>
  				<div class="col-lg-4">
  				<label class="col-lg-5">Total Qualified :-</label><div class="col-lg-1"><?=$total_qualfi?></div>
  				</div>
  				<div class="col-lg-4">
  				<label class="col-lg-5">Total  Candidate to be called:-</label><div class="col-lg-1"><?=$no_call?></div>
  				</div>
  				</div>
			  <input type="hidden" id="exam" name="exam" value="<?=$exam?>">
  			</div>
  			<div class="text-center">
		   
		    </div>
		  
		 </div>
	</div>
  
<?php 
}
}

?>
</div>

<script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){ 
      $.ajax({
        type: "POST",
        url: "select_exam_application.php",
        data: {exam_type:xyz},
        success: function(result)   {
          if(result==1){
           
            location.reload();
          }
        }
      });
    }   
  }
  </script>
 <script type="text/javascript">
  function call_total(id) {
  	var category_name=$('#category_name'+id).val();
	var rank=$('#rank'+id).val();
	var exam=$('#exam').val();
	
      $.ajax({
        type: "POST",
        url: "postexam_no_intimation.php",
        data: {category_name:category_name,rank:rank,exam:exam},
        success: function(result)   {
        	$('#no_call'+id).val(result);
          ///calcu();
        }
      });
    
  }
  </script>