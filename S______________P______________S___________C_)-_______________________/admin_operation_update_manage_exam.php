<?php 
error_reporting(0);
ob_start();
session_start();
require 'FlashMessages.php';
include "config.php";
	if($_SESSION['admin_operational_exam']){
$msg = new \Preetish\FlashMessages\FlashMessages();
 
 echo ' <div class="text-center">';
   $msg->display();  
 echo  '</div>';


	}else{
  		header('location:logout.php');
      exit;
	}

	$contents = ob_get_contents();
	ob_clean();
	include_once 'template_data_table.php';
?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">Update Exam </div>
   
  
  <?php 
  $slno=$_GET['slno']; 
 $qry_exam123="SELECT * FROM `exam_master_data` where `slno`='$slno'";
      $sql_exam123=mysqli_query($conn,$qry_exam123);
   
      while ($res_exam123=mysqli_fetch_array($sql_exam123)) {
      	$html = <<<HTML
   <div class="panel-body">
   	<form class="form-horizontal" id="add_users" action="admin_operation_save_manage_exam.php" role="form" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Exam">Examination Name : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			    <input type="text" id="exam_name" name="exam_name" class="form-control" required="" value="{$res_exam123['examname']}"/>
			    </div>
          
			  </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="Attach">Start Date For Applying Examination  : <span style="color:red;">*</span></label>
          <div class="col-sm-8">
           <input type="text" id="StartDate" name="start_date_exam" class="form-control" required="" value="{$res_exam123['starting_date']}" />
          
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="Attach">Last Date For Applying Examination  : <span style="color:red;">*</span></label>
          <div class="col-sm-8">
           <input type="text" id="EndDate" name="last_date_exam" class="form-control datepicker" required="" value="{$res_exam123['last_date']}"/>
          
          </div>
        </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Date Of Examination  : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="date_exam" name="date_exam" class="form-control" required="" value="{$res_exam123['exam_date']}"/>
			    
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">File Attachement: <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="file" id="file_attach" name="file_attach"   />
			     <input type="hidden" name="upload_file" value="{$res_exam123['file_attach']}">
			     <input type="hidden" name="slno" value="{$slno}">
			    </div>
			  </div>
			  <div class="text-center">
			  <button type="submit" class="btn btn-default" name="updated">Submit</button>
			  </div>
			  </form>
   </div>

HTML;

// sometime later
echo $html;
       
}
        ?>	


</div>

</div>
 <script>
            $(function () {
             
        $("#date_exam").datepicker({
                     changeMonth: true,
                    changeYear: true,
          
          dateFormat: "yy-mm-dd" 
                });
        $("#StartDate").datepicker({
    dateFormat: 'yy-mm-dd',
    minDate: 0,
    showOtherMonths: true,
    selectOtherMonths: true,
    onSelect: function (selectedDate) {
        if (this.id == 'StartDate') {
            //console.log(selectedDate);//2014-12-30
            var arr = selectedDate;
             //console.log(arr);
            //var date = new Date(arr[2]+"-"+arr[1]+"-"+arr[0]);
             var date = new Date(arr);
            var d = date.getDate();
            //console.log(d);
            var m = date.getMonth();
            // console.log(m);
            var y = date.getFullYear();
            //console.log(y);
            var minDate = new Date(y, m, d + 40);
            $("#EndDate").datepicker('setDate', minDate);

        }
    }
});
$("#EndDate").datepicker({dateFormat: 'yy-mm-dd',showOtherMonths: true,
    selectOtherMonths: true});
       
          });
        </script>