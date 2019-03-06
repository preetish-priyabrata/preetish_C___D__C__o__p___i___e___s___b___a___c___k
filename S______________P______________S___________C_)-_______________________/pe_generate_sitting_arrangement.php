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
<form action="view_sitting_arrangement.php" enctype="multipart/form-data" id="sitting_arngmnt" name="sitting_arngmnt" method="post">
<div class="col-md-3"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

                 <legend><h3>View Enrollment List</h3></legend> 
                 <?php
                if($_REQUEST['msg']=='error'){
				?>
                <div class="alert-box success"><span>sitting arrangement already generated for this room & center.</span></div>
                <?php
				}
				
				?>              
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
                  <td><select id="center" name="center" class="form-control">
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
                    </table>
<center><input type="button" class="btn-primary" id="search" name="search" value="Search" onClick="show_no_of_enrolled_candidate();"></center>

</div>

 </div>
       <div class="col-lg-12" id="show_no_of_enrolled_candidate"> 
                
                               </div>                        
                               </div>
                                <div class="col-md-2" id="view_enrolled_cand_list">
                     </div>
                     <div class="col-md-3" id='generate_preview' style="display:none;">
                     
                     <table class="table">
                    <tr>
                    	<td>Room No.</td>
                    	<td><input type="text" name="room_no" class="form-control" placeholder="Room No."/></td>
                    </tr> 
                    <tr>
                    	<td>No.of rows</td>
                    	<td><input type="text" name="row_no" class="form-control" placeholder="No. of Rows"/></td>
                    </tr> 
                    <tr>
                    	<td>No.of columns</td>
                    	<td><input type="text" name="col_no" class="form-control" placeholder="No. of Columns"/></td>
                    </tr> 
                    <tr>
                    	<td>Starting roll no.</td>
                    	<td><input type="text" name="starting_roll_no"  class="form-control" placeholder="Starting Roll No."/></td>
                    </tr> 
                    <tr>
                    	<td>Starting set</td>
                    	<td>
                            <select id="set" name="starting_set" class="form-control">
                              <option value="">--Select Starting Set--</option>
                              <option value="0">Set A</option>
                              <option value="1">Set B</option>
                              <option value="2">Set C</option>
                              <option value="3">Set D</option>
                            </select>
                        </td>
                    </tr> 
                    <tr>
                        <td><input type="submit" id="generate" style="background-color:#39F; color:#000;" class="btn-block" value="Generate" /></td>
                    </tr>
                    </table>
                    

                     </div>
                    </form>
 <?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>