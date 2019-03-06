<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";


?>
 <link rel="stylesheet" type="text/css" href="../asserts/dist/bootstrap-clockpicker.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="asserts_new/dist/assets/css/github.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#">Assign Exam Date And Time </a></li>
				<li class="active">Date And Time Assignment</li>
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
						<div class="panel-title">Date And Time Assignment Form</div>
					</div>
					<div class="panel-body">
						<form action="admin_manage_assign_date_to_form_save" method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-lg-4 text-right">Exam Category</label>
									<div class="col-lg-8">
										<select id="exam" name="exam" onchange="get_center_name()" class="form-control" required>
						                    <option value="">--Select Exam--</option>
					                    <?php
			      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2'";
			      				            $sql_exam=mysqli_query($conn, $qry_exam);
			      				            while($res_exam=mysqli_fetch_array($sql_exam)){
			      				            	$exam=$res_exam['slno_group'];
			      				            	$check="SELECT * FROM `ilab_assign_date_time` WHERE `exam_slno`='$exam'";
			      				            	 $sql_check=mysqli_query($conn, $check);
			      				            	 $num=mysqli_num_rows($sql_check);
			      				            	 if($num==0){
					  				          ?>
					                         <option value="<?php echo $res_exam["slno_group"]; ?>"  ><?php echo $res_exam["exam_group"]; ?></option>
				                        <?php
				                        	}
				  				              }
				  				          ?>
						                </select>
									</div>
							    </div>
							



						    <div class="form-group">
								<label class="control-label col-lg-4 text-right">Exam Date</label>
								<div class="col-lg-8">
									<input class="form-control" type="date" name="exam_date"  class="datepicker">
									<!-- <input class="form-control" id="date"  name="exam_date" placeholder="Enter Exam Date" type="text" required=""> -->
								</div>
							</div>
							  <!-- <div class="col-sm-8">    
                                                         <div class="input-group clockpicker">
                                                            <input type="text" class="form-control"  data-language='en' placeholder="Morning Calling Hour" name="Morning_FROM" required="">
                                                            <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                        </div>
                                                    </div> -->
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">1st Session Start Time</label>
									<div class="col-lg-3">
										<div class="input-group clockpicker">
										<input class="form-control" name="first_session_start" placeholder="Enter 1st Session Start Time" data-language='en' type="text" required="">
										 <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-time"></span>
                                      </span>
									</div>
									</div> 
								<div>
								<label class="control-label col-lg-2 text-right">1st Session End Time</label>
								<div class="col-lg-3">
										<div class="input-group clockpicker">
										<input class="form-control" name="first_session_end" placeholder="Enter 1st Session End Time" type="text" data-language='en' required="">
										 <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-time"></span>
                                      </span>
									</div>
									</div> 
							   </div>
							 </div>
							 <div class="form-group">
								<label class="control-label col-lg-4 text-right">2nd Session Start Time</label>

									<div class="col-lg-3">
										<div class="input-group clockpicker">
										<input class="form-control" name="second_session_start" placeholder="Enter 2nd Session Start Time" data-language='en' type="text" required="">
										 <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-time"></span>
                                      </span>
									</div>
										
									</div> 
								<div>
								<label class="control-label col-lg-2 text-right">2nd Session End Time</label>
									<div class="col-lg-3">
										<div class="input-group clockpicker">
										<input class="form-control" name="second_session_end" placeholder="Enter 2nd Session End Time" type="text" required=""  data-language='en' >
										 <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-time"></span>
                                      </span>
									</div>
								</div>
							  </div>
							</div>
							 
							<div class="text-center">
							 <small id="emailHelp" class="form-text text-muted text-danger">Once date of exam and time is assigned to any exam category, it can not be altered.*</small>
							 <br>
							<input type="submit" class="btn btn-info pull-right"  value="Assign Exam Time"  >
							</div>

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
	function get_center_name() {
		var exam=$('#exam').val();
		var location=$('#location').val();
		  if(exam!=""){
		    $.ajax({
		        type:'POST',
		        url:'get_perference',
		        data:'exam='+exam+'&location='+location,
		        success:function(html){   
		          $('#Center_name').html(html);                    
		        }
		      });

		  }else{
		    $('#Center_name').html("<option value=''>--Please Select Exam Group--</option>");
		  }
	}
</script>

<script src="../asserts/dist/jquery-clockpicker.min.js"></script>
    
<script type="text/javascript">
    $('.clockpicker').clockpicker({
        autoclose: true,
        twelvehour: true,
        placement: 'top',
        align: 'left',
        donetext: 'Done'
    });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e){
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
                .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
<script type="text/javascript">
 $('.input-group.date').datepicker({
       format: 'dd/mm/yyyy',
       startDate: 'today'
  });
</script>