<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['postexam_user']){
?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>
     <div class="col-lg-12">
          <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <?php include'application_form_exam.php';?>
            </div>
          <div class="col-lg-4"></div>
        </div>
<?php }else{
	header("location:logout.php");
	exit;
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';


 if(!empty($_SESSION['exam_selected'])){
        $exam=$_SESSION['exam_selected'];
        // check wheather exam is prepared
        $qry_exam="SELECT * FROM `post_exam_preparation` where `exam_name`='$exam'";
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

<?php
			}else{?>
		<div class="col-md-12">
		        <div class="alert alert-success text-center">
		          <strong>Please Prepared The Exam Report For The Exam :- <?=$exam?></strong>
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
  ?>

	<div class="col-lg-9">
		<div class="panel panel-default">
		    <!--<div class="panel-heading">
		    	<h5> Enter Information Result Preparation</h5>
		    </div>-->
		    <div class="panel-body">
		    	<table width="99%" border="2" cellspacing="10" cellpadding="10">
		    		<thead>
					    <tr>
						    <th width="7%" scope="col">Sl.No.</th>
						    <th width="23%" scope="col">Category</th>
						    <th width="25%" scope="col">Total Appeared</th>
						    <th width="25%" scope="col">Cutt-Off</th>
						    <th width="20%" scope="col">Total Qualified</th>
					  	</tr>
					  </thead>
			 	</table>
			 <!--	<form action="postexam_save_result_prepare.php" method="POST">-->
			 	<div style="height:300px; overflow:scroll; ">
				  <table width="100%" border="2" cellspacing="10" cellpadding="10">
				   <?php 
				   		$i=0;
				   		$qry_category="SELECT * FROM `postexam_cut_off_mark_exam_category` where `exam_name`='$exam'";
				   		$sql_category=mysqli_query($conn, $qry_category);
				   		$total_qualfi=0;
				   		$total_appeared=0;
				   		while ($results=mysqli_fetch_assoc($sql_category)) { 
				   			$i++;
				   			

				   			?>
				   	
				  	<tr>
				      	<td width="7%" scope="row"><?=$i?>.</td>
				      	<td width="23%" scope="row">
				      		<small><?=$results['category_name']?></small>
				      		
				      	</td>
				      	<td width="25%">
				      		<div align="center">
				      			<?php echo $y=$results['total_app'];
				      			$total_appeared=$total_appeared+$y;
				      			?>
				      		</div>
				      	</td>
				      	<td width="25%">
				      		<div align="center">
				      		<?=$results['cut_off']?>
				      		
				      		</div>
				      	</td>
				      	<td width="20%">
				      		<div align="center">
				      		<?php echo $x=$results['total_qualfi'];
				      				$total_qualfi=$total_qualfi+$x;
				      		?>
				      		</div>
				      	</td>
				    </tr>
				    <?php }?>
				    
				  </table>
				  
  				</div>
  				<br>
  				<div class="row">
  				<div class="col-lg-6">
  				<label class="col-lg-5">Total Appeared :-</label><div class="col-lg-1"><?=$total_appeared?></div>
  				</div>
  				<div class="col-lg-6">
  				<label class="col-lg-5">Total Qualified :-</label><div class="col-lg-1"><?=$total_qualfi?></div>
  				</div>
  				</div>
  				
			</div>
				 <div class="col-md-12 text-center">
            
          </div>
		   </form>	
		 </div>
	</div>
  </div>
<?php 


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
 
  </script>