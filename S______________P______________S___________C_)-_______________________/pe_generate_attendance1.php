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
<form action="attendance_sheet.php" enctype="multipart/form-data" id="attnd_sht" name="attnd_sht" method="post">
<div class="col-md-12"> 
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
                     <div class="col-md-2" id='generate_preview' style="display:none;">
                     <table class="table">
<tr>
<td><input type="submit" id="generate" name="generate" style="background-color:#39F; color:#000;" class="btn-block" value="Generate" /></td>
</tr>

</table>
</div>
                     </div>
                     </form>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>