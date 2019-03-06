<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
?>
<script>
function generate_acard()
{
	alert("Admit Card Generated Successfully");
}
</script>
<style>
#cssmenu > ul > li > a{
	padding: 0 12px;
}
</style>
<form action="generate_and_send_admit_card.php" method="post" enctype="multipart/form-data" id="admitcard" name="admitcard">
<div class="col-md-3"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

                 <legend><h3>View Enrollment List</h3></legend>               
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
<center><input type="button" class="btn-primary" id="search" name="search" value="Search" onClick="show_total_enrolled_candidate_for_acard();"></center>

</div>

 </div>
       <div class="col-lg-12" id="show_total_enrolled_candidate_for_acard"> 
                
                               </div>                        
                               </div>
                                <div class="col-md-2" id="view_enrolled_cand_list_for_acard">
                     </div>
                     <div class="col-md-2" id='generate_preview' style="display:none;">
                     <table class="table">
<tr>
<td><input type="submit" id="generate" name="generate" style="background-color:#39F; color:#000;" class="btn-block" value="Generate"/></td>
</tr>
<!--<tr>
<td><input type="button" id="preview" name="preview" style="background-color:#39F; color:#000;" class="btn-block" value="Preview" onClick="preview_acard();" /></td>
</tr>
<tr>
<td><input type="button" style="background-color:#39F; color:#000;" class="btn-block" id="viewall" name="viewall" value="View All" onClick="show_all_admitcard();"></td>
</tr>-->
</table>

                     </div>
                     <div class="col-lg-5" id="preview_acard"> 
                
                               </div>
                               </form>
 <?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>