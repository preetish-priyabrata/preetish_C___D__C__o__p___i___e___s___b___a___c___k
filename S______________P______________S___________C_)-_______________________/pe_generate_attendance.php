<?php
		error_reporting(0);
		ob_start();
		session_start();
		include "config.php";
		require 'FlashMessages.php';
		if($_SESSION['preexam_user']){
			$msg = new \Preetish\FlashMessages\FlashMessages();
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
<?php 
		}
		$contents = ob_get_contents();
		ob_clean();
		include_once 'template_data_table.php';
		if(!empty($_SESSION['exam_selected'])){
      		$exam=$_SESSION['exam_selected'];
      		$qry_centres="SELECT * FROM `assign_exam_center` where `exam_name`='$exam' " ;
			$sql_centres=mysqli_query($conn, $qry_centres);
			$num_rows=mysqli_num_rows($sql_centres);
			if($num_rows==0){
?>
				
	    		<div class="col-md-12">
	        		<div class="alert alert-success text-center">
	          			<strong > Please Assign Roll Number To Center  :-  <?=$exam?></strong>
	        		</div>
	      		</div>


<?php 		
			}else{
				$qry_centres_gen="SELECT * FROM `assign_exam_center` where `exam_name`='$exam' AND `generated_sheet_status`='0'" ;
				$sql_centres_gen=mysqli_query($conn, $qry_centres_gen);
				$num_rows_gen=mysqli_num_rows($sql_centres_gen);
				if($num_rows_gen==0){
?>
					<div class="col-md-12">
		        		<div class="alert alert-success text-center">
		          			<strong >Attendance Sheet For Exam   :-  <?=$exam?> Is Already Generated </strong>
		        		</div>
		      		</div>
<?php  			}else{
?>


					<form class="form-horizontal" action="attendance_sheet.php" method="POST" role="form">
					 	<div class="col-lg-3"></div>
					 	<input type="hidden" name="exam" value="<?=$exam?>">
					    <div class="form-group">
					    	<label class="control-label col-sm-2" for="Center">Center Name:</label>
				       		<div class="col-lg-3">
					       		<select id="center" name="center" class="form-control" onchange="get_capacity()" required>
						            <option value="">--Select Center--</option>
<?php
									  
									//$qry_centre="SELECT * FROM `center_master_data`  ";
										$qry_centre="SELECT * FROM assign_exam_center where  `exam_name`='$exam' And `generated_sheet_status`='0' ";
										
										$sql_centre=mysqli_query($conn, $qry_centre);
										while($res_centre=mysqli_fetch_array($sql_centre)){
	?>
						                  <option value="<?php echo $res_centre["center_name"]; ?>"><?php echo $res_centre["center_name"]; ?></option>
						                  <?php
										  }
										 
										  
										  ?>
				                  </select>
					  		</div>
					  	</div>
					  	<div class="col-lg-3"></div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="pwd">Capcity :</label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" id="capacity" required readonly>
						    </div>
						</div>
					  	
					  	<div class="form-group">
					    	<div class="col-sm-offset-6 col-sm-6">
					      		<button type="submit" class="btn btn-default">Generate</button>
					    	</div>
					  	</div>
					 
					</form>	
<?php 		
				}
			}
?>


<?php 
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
            // alert('hi');
            location.reload();
          }
        }
      });
    }   
  }
  function get_capacity() {
  	 var center=$('#center').val();
  	 if(center!=""){
	  	 $.ajax({
	        type: "POST",
	        url: "get_center.php",
	        data: {center:center},
	        success: function(result)   {
	          $('#capacity').val(result);
	        }
	      });
  	}
  }
  </script>