<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
?>

<form action="publish_result.php" method="post" id="result_publish" name="result_publish" enctype="multipart/form-data">
<div class="col-lg-3"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h4>Result Publication</h4></legend>
<p>Envelope icon: <span class="glyphicon glyphicon-envelope"></span></p>

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
                  <!--<tr>
                  <td>Cutoff Mark</td>
                  <td><input type="text" id="cutoffmark" name="cutoffmark" class="form-control"></td>
                  </tr>-->
                  <tr>
                  <td style="text-align:center" colspan="2"><input type="button" id="tot_qualified" class="btn-primary" name="tot_qualified" value="Search" onClick="show_qualified_table();"></td>
                  </tr>

</table>
 </div>
                               </div>
                               </div>
                               <div class="col-lg-6" id="show_qualified_table">
                               </div>
                               <div class="col-lg-3">
                               </div>
                               </form>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>