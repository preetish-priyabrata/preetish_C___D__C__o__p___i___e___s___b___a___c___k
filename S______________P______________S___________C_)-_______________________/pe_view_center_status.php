<?php
		error_reporting(0);
		ob_start();
		session_start();
		include "config.php";
		if($_SESSION['preexam_user']){
?>
			<!--here exam selection will be made-->
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
	      	$qry_centres="SELECT * FROM `assign_exam_center` where `exam_name`='$exam' " ;
			$sql_centres=mysqli_query($conn, $qry_centres);
			$num_rows=mysqli_num_rows($sql_centres);
			if($num_rows==0){
?>
				<div class="col-md-12">
	        		<div class="alert alert-success text-center">
	          			<strong >NO Center Is Assign For Exam :- <?=$exam?></strong>
	        		</div>
	      		</div>
<?php       
			}else{
				//list of center
				$qry_list="SELECT * FROM center_master_data where  status='1'";
				$sql_list=mysqli_query($conn, $qry_list);
				$num_rows_list=mysqli_num_rows($sql_list);
				//list of un-assigned centers
				$qry_centre="SELECT c.examcenter,c.slno,c.sitting_capacity FROM center_master_data c left JOIN assign_exam_center a on a.center_name=c.examcenter and a.exam_name='$exam' And  c.status='1' WHERE c.status='1'and  a.center_name is NULL ";
				$sql_centre=mysqli_query($conn, $qry_centre);
				$num_rows_centre=mysqli_num_rows($sql_centre);
				// assigned centers
				$qry_assign="SELECT c.examcenter,c.slno,c.sitting_capacity FROM center_master_data c left JOIN assign_exam_center a on a.center_name=c.examcenter and a.exam_name='$exam' WHERE c.status='1' and a.center_name is NOT NULL ";
				$sql_assin=mysqli_query($conn, $qry_assign);
				$num_rows_assign=mysqli_num_rows($sql_assin);					 
									 		
?>
				<div class="container">
					<ul class="nav nav-pills nav-justified">
					    <li class="active"><a data-toggle="pill" href="#List">List Of Center<span class="badge"><?=$num_rows_list?></span></a></li>
					    <li><a data-toggle="pill" href="#Assign">Assign Center<span class="badge"><?=$num_rows_assign?></span></a></li>
					    <li><a data-toggle="pill" href="#Un-Assign">Un-Assign Center<span class="badge"><?=$num_rows_centre?></span></a></li>
					    
					</ul>
					  
					  <div class="tab-content">
					    <div id="List" class="tab-pane fade in active">
					      <h3>HOME</h3>
					      	<table class="table table-hover">
							    <thead>
							      	<tr>
								        <th>Center Name</th>
								        <th>Capcity</th>
							        </tr>
							    </thead>
							     <tfoot>
							      	<tr>
								        <th>Center Name</th>
								        <th>Capcity</th>
							        </tr>
							    </tfoot>
							    <tbody>
<?php
									while($res_list=mysqli_fetch_array($sql_list)){
?>
								    	<tr>
								       		<td><?=$res_list["examcenter"]?></td>
								       		<td><?=$res_list["sitting_capacity"]?></td>
								    	</tr>
<?php
									}
?>							      
							    </tbody>
							</table>
					    </div>
					    <div id="Assign" class="tab-pane fade">
					      <table class="table table-hover">
							    <thead>
							      	<tr>
								        <th>Center Name</th>
								        <th>Capcity</th>
							        </tr>
							    </thead>
							     <tfoot>
							      	<tr>
								        <th>Center Name</th>
								        <th>Capcity</th>
							        </tr>
							    </tfoot>
							    <tbody>
<?php
									while($res_assign=mysqli_fetch_array($sql_assin)){
?>
								    	<tr>
								       		<td><?=$res_assign["examcenter"]?></td>
								       		<td><?=$res_assign["sitting_capacity"]?></td>
								    	</tr>
<?php
									}
?>							      
							    </tbody>
							</table>
					    </div>
					    <div id="Un-Assign" class="tab-pane fade">
					      <table class="table table-hover">
							    <thead>
							      	<tr>
								        <th>Center Name</th>
								        <th>Capcity</th>
							        </tr>
							    </thead>
							     <tfoot>
							      	<tr>
								        <th>Center Name</th>
								        <th>Capcity</th>
							        </tr>
							    </tfoot>
							    <tbody>
<?php
									while($res_lists=mysqli_fetch_array($sql_centre)){
?>
								    	<tr>
								       		<td><?=$res_lists["examcenter"]?></td>
								       		<td><?=$res_lists["sitting_capacity"]?></td>
								    	</tr>
<?php
									}
?>							      
							    </tbody>
							</table>
					   
					  </div>
				</div>

<?php 		
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
  </script>