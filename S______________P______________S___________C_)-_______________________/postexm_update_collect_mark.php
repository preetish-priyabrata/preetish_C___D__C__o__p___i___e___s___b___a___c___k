<?php
error_reporting(0);
ob_start();
session_start();
//$sql = "SELECT slno, mark, FIND_IN_SET( mark, (SELECT GROUP_CONCAT( DISTINCT mark ORDER BY mark DESC ) FROM postexam_publish_result WHERE category_name=\'GEN/UR[unreserved]\') ) AS rank FROM postexam_publish_result";
include "config.php";
if($_SESSION['postexam_user'])
{
?>
<script>
 function PreviewDoc() {

			var oFReader = new FileReader();

			oFReader.readAsDataURL(document.getElementById("doc").files[0]);

		

			oFReader.onload = function(oFREvent) {

			  document.getElementById("docpreview").src = oFREvent.target.result;

			};

		  };

</script>
<div class="col-lg-3"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<form action="postexm_import_mark.php" id="updt_mark" name="updt_mark" method="post" enctype="multipart/form-data" >
<legend><h4>Collect & Update Mark</h4></legend>
<?php
                if($_REQUEST['msg']=='success'){
				?>
                <div class="alert-box success"><span>Marks uploaded successfully.</span></div>
                <?php
				}
				if($_REQUEST['msg']=='error1')
				{
				?>
                <div class="alert-box success"><span>File not uploaded successfully.</span></div>
                <?php
				}
				if($_REQUEST['msg']=='error2')
				{
				?>
                <div class="alert-box success"><span>Invalid file, Please upload csv file only.</span></div>
                <?php
				}
				if($_REQUEST['msg']=='error3')
				{
				?>
                <div class="alert-box success"><span>Marks already updated for this perticular exam, You can't upload it now.</span></div>
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
                  <td>Upload Mark</td>
                  <td><input type="file" id="doc" onChange="PreviewDoc();" name="uploadmark" class="form-control"></td>
                  </tr>
                  <tr>
                  <td style="text-align:center" colspan="2"><input type="submit" id="updtdb" class="btn-primary" name="updtdb" value="Update Database"></td>
                  </tr>

</table>
</form>
 </div>
                               </div>
                               </div>
                               <div class="col-lg-8">
                               <iframe id="docpreview" frameborder="0" scrolling="no" width="100%" height="450"></iframe>
 </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>