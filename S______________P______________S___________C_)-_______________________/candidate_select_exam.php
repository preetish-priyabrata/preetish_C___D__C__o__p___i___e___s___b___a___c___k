<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['cand_user'])
{
?>

<div class="row">
<div class="col-md-4">
</div> 
<div class="col-md-4">
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<form action="application_form.php" id="sel_exam" name="sel_exam" method="post" enctype="multipart/form-data">
                 <legend><h3>Select Exam</h3></legend>               
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
                  <td colspan="2" style="text-align:center"><input type="submit" id="submit_exam" name="submit_exam" value="Go" class="btn-primary"></td>
                  </tr>
                   
                    </table>
                    </form>
</div>
                               </div>
                               </div>
                               <div class="col-md-4">
                               </div>
                               
                               </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>