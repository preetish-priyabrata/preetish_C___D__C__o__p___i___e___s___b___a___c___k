<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['adminexam_user'])
{
?>
<script>
function show_download()
{
	document.getElementById("photopreview").style.display="block";
	
}
</script>

<div class="col-md-4"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

                 <legend><h3>View Sitting Arrangement</h3></legend>  
                 <?php
                if($_REQUEST['msg']=='error'){
				?>
                <div class="alert-box success"><span>sitting arrangement not generated for this room & center.</span></div>
                <?php
				}
				
				?>  
                 <form action="show_sitting_arrangement.php" name="show_stng_arrngmnt" method="post" enctype="multipart/form-data" >             
                  <table class="table">
                  
                  <tr>
                  <td>Exam</td>
                  <td><select id="exam" name="exam" class="form-control">
                  <option value="">--Select Exam--</option>
                  <?php
				  $qry_exam="SELECT * FROM `exam_master_data`";
				 $sql_exam=mysqli_query($conn, $qry_exam);
				 while($res_exam=mysqli_fetch_array($sql_exam))
                  {
				  ?>
                  <option value="<?php echo $res_exam["examname"]; ?>"><?php echo $res_exam["examname"]; ?></option>
                  <?php
				  }
				  ?></select>
                  </td>
                  </tr>
                  <tr>
                  <td>Year</td>
                  <td><select id="year" name="year" class="form-control">
                  <option value="">--Select Year--</option>
                  <?php
                  for($i=2020; $i>2015;  $i--)
                  {
					  ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  
                  <?php
				  }
				  ?>
                  </select></td>
                  </tr>
                  <tr>
                  <td>Month</td>
                  <td><select id="mnth" name="mnth" class="form-control">
                  <option value="">--Select Month--</option>
                  <option value="01">Jan</option>
                  <option value="02">Feb</option>
                  <option value="03">Mar</option>
                  <option value="04">Apr</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">Aug</option>
                  <option value="09">Sep</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option></select></td>
                  </tr>
                  <tr>
                  <td>Center Name</td>
                  <td><select id="center" name="center" class="form-control" onchange="show_room_no(this.value);">
                  <option value="">--Select Center--</option>
                  <?php
				  
				  $qry_centre="SELECT * FROM `center_master_data`";
				  $sql_centre=mysqli_query($conn, $qry_centre);
				  while($res_centre=mysqli_fetch_array($sql_centre))
				  {
				  ?>
                  <option value="<?php echo $res_centre["examcenter"]; ?>"><?php echo $res_centre["examcenter"]; ?></option>
                  <?php
				  }
				  ?>
                  </select></td>
                  </tr>
                  <tr>
                  <td>Room No</td>
                  <td><select id="roomno" name="roomno" class="form-control">
                  <option value="">--Select room--</option>
                  </td>
                  </tr>
                  <tr>
                  <td colspan="2" align="center"><input type="submit" id="show" name="show" value="Show" /></td>
                  </tr>
                    </table>
                    
</div>
                               </div>
                               </div>
                                <div id="photopreview" class="col-lg-8" style="display:none">
                               
 </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>