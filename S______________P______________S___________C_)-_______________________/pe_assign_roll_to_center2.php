<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
?>
<style>
#cssmenu > ul > li > a{
	padding: 0 12px;
}
</style>
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
?>
<?php   
      if(!empty($_SESSION['exam_selected'])){
      	$exam=$_SESSION['exam_selected'];
      	
 		$qry="SELECT * FROM `pre_exam_candidate` where `exam_name`='$exam' AND center_name IS NULL";
        $sql=mysqli_query($conn, $qry);
        $num_rows=mysqli_num_rows($sql);
        $qry1="SELECT * FROM `pre_exam_candidate` where `exam_name`='$exam' AND center_name IS NULL";
          $sql1=mysqli_query($conn, $qry1);       
      	?>
      	<div class="container">
	      	<div class="col-lg-4">
		      	<div class="table-responsive">
			      	 <table class="table">             
					    <thead>
					        <tr> 
					            <th>Roll No</th> 
					            <th>Application No</th> 
					            <!--<th>age</th> 
					            <th>total</th> 
					            <th>discount</th> 
					            <th>diff</th> -->
					        </tr> 
					    </thead> 
					    <tbody> 
					     <?php
			                while($res=mysqli_fetch_array($sql))
			            {?>
			        		<tr onclick="javascript:showRow(this);"> 
					            <td><?=$res['roll_no']?></td> 
					            <td><?=$res['application_no']?></td> 
					            <!--<td>28</td> 
					            <td>9.99</td> 
					            <td>20.3%</td> 
					            <td>+3</td>-->
			       			 </tr> 
			       			 <?php }?>
			       		</tbody>
			       	</table>
		       	</div>
		       	<div class="col-lg-2">Total:</div>
		       	<div class="col-lg-2"><?=$num_rows?></div>
	       	</div>
	       	<div class="col-lg-8">
	       		<div class="col-md-12">
	       		<form class="form-horizontal" method="POST" action="save_roll_center.php" role="form">
	       			<div class="form-group">
	       				<label class="control-label col-sm-2" for="email">Center Name:</label>
	       				 <div class="col-sm-10">
		       			<select id="center" name="center" class="form-control" required>
			                  <option value="">--Select Center--</option>
			                  <?php
							  
							  $qry_centre="SELECT * FROM `center_master_data`  ";
							  
							  $sql_centre=mysqli_query($conn, $qry_centre);
							 
							  while($res_centre=mysqli_fetch_array($sql_centre))
							  {
							  ?>
			                  <option value="<?php echo $res_centre["slno"]; ?>"><?php echo $res_centre["examcenter"]."(".$res_centre["sitting_capacity"].")"; ?></option>
			                  <?php
							  }
							  $red=mysqli_fetch_array($sql1);
							  
							  ?>
	                  </select>
	                  </div>
	       			</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Roll NO From:</label>
						 <div class="col-sm-10">
						<input type="text" class="form-control" name="from_roll" id="from_roll" value="<?=$red['roll_no']?>">
						</div>
					</div>
					<!--<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Roll No To:</label>
						 <div class="col-sm-10">
						<input type="text" class="form-control" id="to_roll">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Total Selected:</label>
						 <div class="col-sm-10">
						<input type="text" class="form-control" id="nos_ids">
						</div>
					</div>-->
					<div class="form-group">
						<div class="text-center">
							<input type="submit" class="btn btn-primary" value="Assign">
						</div>
					</div>
					<span id="error"></span>
					<div id="show"></div>
				</form>

	       		</div>

	       	</div>
       	</div>


<?php }else{
?>
       <div class="col-md-12">
        <div class="alert alert-success text-center">
          <strong > Please Select The Exam </strong>
        </div>
      </div>
<?php }

?>
 <script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){
    // alert(xyz);
   
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
  </script>
<script language="javascript" type="text/javascript">
function showRow(row){
var x=row.cells;
document.getElementById("to_roll").value = x[0].innerHTML;
// document.getElementById("lastname").value = x[1].innerHTML;
// document.getElementById("age").value = x[2].innerHTML;
// document.getElementById("total").value = x[3].innerHTML;
// document.getElementById("discount").value = x[4].innerHTML;
// document.getElementById("diff").value = x[5].innerHTML;
get_ids();
}
function get_ids() {
	var from=$('#from_roll').val();
	var to=$('#to_roll').val();
	if(to!=""){
		if(from==to){
			document.getElementById("error").style.color = "red";
           	document.getElementById("error").innerHTML = "Same Roll Nos Can't be Submitted";
           	//$('#nos_ids').val()="";
		}else{
			 $.ajax({
        		type: "POST",
        		url: "count_nos.php",
        		data: {toid:to,fromid:from},
        		success: function(result)   {
        			document.getElementById("error").style.color = "";
        			document.getElementById("error").innerHTML = "";
	          	//document.getElementById("nos_ids").value = result[0].innerHTML;
	          	$('#nos_ids').val(result);
        		}
      		});
		}
	}else{
		document.getElementById("error").style.color = "red";
        document.getElementById("error").innerHTML = "Please Select The Table Roll No";

	}
		
}
</script>