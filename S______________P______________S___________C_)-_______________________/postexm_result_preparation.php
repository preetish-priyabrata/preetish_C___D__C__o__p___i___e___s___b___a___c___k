<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
?>

<script>
function sum() {

        var ctbc1 = document.getElementById('ctbc1').value;
        var ctbc2 = document.getElementById('ctbc2').value;
        var ctbc3 = document.getElementById('ctbc3').value;
        var ctbc4 = document.getElementById('ctbc4').value;
        var ctbc5 = document.getElementById('ctbc5').value;
        var ctbc6 = document.getElementById('ctbc6').value;
        var ctbc7 = document.getElementById('ctbc7').value;
        var ctbc8 = document.getElementById('ctbc8').value;
        var ctbc9 = document.getElementById('ctbc9').value;
        var ctbc10 = document.getElementById('ctbc10').value;
        var ctbc11 = document.getElementById('ctbc11').value;
        var ctbc12 = document.getElementById('ctbc12').value;
        var ctbc13 = document.getElementById('ctbc13').value;
        var ctbc14 = document.getElementById('ctbc14').value;
        var ctbc15 = document.getElementById('ctbc15').value;
        var ctbc16 = document.getElementById('ctbc16').value;
		var ctbc17 = document.getElementById('ctbc17').value;
        var ctbc18 = document.getElementById('ctbc18').value;

if(ctbc1=="")
{
	ctbc1=0;
}
if(ctbc2=="")
{
	ctbc2=0;
}
if(ctbc3=="")
{
	ctbc3=0;
}
if(ctbc4=="")
{
	ctbc4=0;
}
if(ctbc5=="")
{
	ctbc5=0;
}
if(ctbc6=="")
{
	ctbc6=0;
}
if(ctbc7=="")
{
	ctbc7=0;
}
if(ctbc8=="")
{
	ctbc8=0;
}
if(ctbc9=="")
{
	ctbc9=0;
}
if(ctbc10=="")
{
	ctbc10=0;
}
if(ctbc11=="")
{
	ctbc11=0;
}
if(ctbc12=="")
{
	ctbc12=0;
}
if(ctbc13=="")
{
	ctbc13=0;
}
if(ctbc14=="")
{
	ctbc14=0;
}
if(ctbc15=="")
{
	ctbc15=0;
}
if(ctbc16=="")
{
	ctbc16=0;
}
if(ctbc17=="")
{
	ctbc17=0;
}
if(ctbc18=="")
{
	ctbc18=0;
}

		var result = parseInt(ctbc1) + parseInt(ctbc2) + parseInt(ctbc3) + parseInt(ctbc4) + parseInt(ctbc5) + parseInt(ctbc6) + parseInt(ctbc7) + parseInt(ctbc8) + parseInt(ctbc9) +	parseInt(ctbc10) +	parseInt(ctbc11) +	parseInt(ctbc12) + parseInt(ctbc13) + parseInt(ctbc14) + parseInt(ctbc15) + parseInt(ctbc16) +	parseInt(ctbc17) +	parseInt(ctbc18);

        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
        }
</script>
<form action="fridge_cutoff_and_totalqualified.php" method="post" id="result_preprtn" name="result_preprtn" enctype="multipart/form-data">
<div class="col-lg-3"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h4>Result Preparation</h4></legend>
<?php
                if($_REQUEST['msg']=='success'){
				?>
                <div class="alert-box success"><span>Result prepared successfully.</span></div>
                <?php
				}
				if($_REQUEST['msg']=='error1')
				{
				?>
                <div class="alert-box success"><span>Result not prepared successfully.</span></div>
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
                  <!--<tr>
                  <td>Cutoff Mark</td>
                  <td><input type="text" id="cutoffmark" name="cutoffmark" class="form-control"></td>
                  </tr>-->
                  <tr>
                  <td style="text-align:center" colspan="2"><input type="button" id="tot_appeared" class="btn-primary" name="tot_appeared" value="Search" onClick="show_total_appeared();"></td>
                  </tr>

</table>

 </div>
                               </div>
                               </div>
                               <div class="col-lg-3" id="show_total_appeared">
                               </div>
                               <div class="col-lg-6" id="cat_result">
                               </div>
                               </form>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>