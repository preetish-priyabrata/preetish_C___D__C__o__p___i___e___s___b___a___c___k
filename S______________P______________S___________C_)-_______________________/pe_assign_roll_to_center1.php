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

<div class="col-md-3"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

                 <legend><h3>View Enrollment List</h3></legend>  
                 <?php
                if($_REQUEST['msg']=='success'){
				?>
                <div class="alert-box success"><span>Roll nos assigned to the center successfully.</span></div>
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
                  
                    </table>
<center><input type="button" class="btn-primary" id="search" name="search" value="Search" onClick="show_total_candidate();"></center>

</div>

 </div>
       <div class="col-lg-12" id="show_total_candidate"> 
                
                               </div>                        
                               </div>
            <form action="save_rollno_centre.php" id="assign_roll" name="assign_roll" method="post" enctype="multipart/form-data">

                                <div class="col-md-2" id="enrollment_no">
                     </div>
                     <div class="col-md-3" id='generate_preview' style="display:none;">
                     <table class="table">
                    <tr>
                    	<td>From</td>
                    	<td><input type="text" name="fromrollno" class="form-control" placeholder="Roll No."/></td>
                    </tr> 
                    <tr>
                    	<td>To</td>
                    	<td><input type="text" name="torollno" class="form-control" placeholder="Roll No."/></td>
                    </tr> 
                    <tr>
                  <td>Center Name</td>
                  <td><select id="center" name="center" class="form-control">
                  <option value="">--Select Center--</option>
                  <?php
				  
				  $qry_centre="SELECT * FROM `center_master_data` WHERE `examname`='$_SESSION[exam]'";
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
                    
                        <td><button type="submit" id="assign" name="assign" style="background-color:#39F; color:#000;" class="btn-block" >Assign</button></td>
                        <td></td>
                    </tr>
                    
                    </table>
                    </form>

                     </div>
                     
 <?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>