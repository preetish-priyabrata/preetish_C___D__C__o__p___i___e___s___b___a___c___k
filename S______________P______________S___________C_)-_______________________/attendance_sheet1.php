<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
	$exam=$_REQUEST["exam"];
	$year=$_REQUEST["year"];
	$mnth=$_REQUEST["mnth"];
	$center=$_REQUEST["center"];
	
	$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `application_submitted`='yes' AND `exam_centre`='$center'";
$sql=mysqli_query($conn, $qry);

?>

<script>
function printout() {
printDivCSS = new String ('<link href="css/bootstrap.min.css" rel="stylesheet" /> <link href="css/style_avi.css" rel="stylesheet" />')
var newWindow = window.open();
    newWindow.document.write(printDivCSS + document.getElementById("printable").innerHTML);
    newWindow.print();
	newWindow.close();
}

</script>

<style>
#cssmenu > ul > li > a{
	padding: 0 12px;
}
</style>
<div class="col-md-12" id="printable" style="width: 21 cm; height: 29.7 cm; margin: 0;">

<div class="col-md-12">
	<div class="col-md-2"></div>
    <div class="col-md-8">
    <h3 style="text-align:center"><img style="width:70px; height:75px;" src="img/002.jpg" />&nbsp;SIKKIM PUBLIC SERVICE COMMISSION</h3>
<h5 style="text-align:center">Exam: <?php echo $exam; ?></h5>
<h5 style="text-align:center">Exam Center:  <?php echo $center; ?></h5>
        <table class="table">
            <tr>
                <th>Sl. No.</th>
                <th style="text-align:center;">Barcode</th>
                <th>Photo</th>
                <th>Candidate details</th>
                <th>Candidate Signature</th>        
            </tr>
            <?php
			$i=1;
			while($res=mysqli_fetch_array($sql))
			{
				$qry_cand_info="SELECT * FROM `candidate_personal_details` a, `candidate_declaration` b WHERE a.application_no='$res[application_no]' AND a.application_no=b.application_no";
				$sql_cand_info=mysqli_query($conn, $qry_cand_info);
				while($res_cand_info=mysqli_fetch_array($sql_cand_info))
				{
			?>
            <tr>
            	<td><?php echo $i; ?>.</td>
                <td style="text-align:center;">|||||||||||</td>
                <td><img src="uploads/candidate_photos/<?php echo $res_cand_info["candidate_photo"]; ?>" style="border:solid 1px; height:150px; width:150px"/></td>
                <td>
                	<table>
                    	<tr>
                        	<td>Enrollment No.:</td>
                            <td><?php echo $res["roll_no"]; ?></td>
                        </tr>
                    	<tr>
                        	<td>Name:</td>
                            <td><?php echo $res_cand_info["candidate_name"]; ?></td>
                        </tr>
                    	<tr>
                        	<td>DOB:</td>
                            <td><?php echo $res_cand_info["dob"]; ?></td>
                        </tr>
                    	<tr>
                        	<td>Exam:</td>
                            <td><?php echo $exam; ?></td>
                        </tr>
                    </table>
                </td>
                <td><img src="uploads/candidate_signature/<?php echo $res_cand_info["signature"]; ?>" style="border:solid 1px; height:50px; width:150px"/></td>
            </tr>
            <?php
				}
				$i++;
			}
			?>
           
        </table>
        <div class="col-md-12">
    <table class="table">
    <th>No.of candidates present:<input type="text"/></th>
    <th>No.of candidates absent:<input type="text"/></th>
    <th>Invigilator's signature:<input type="text" placeholder="Invigilator's Signature"/></th>
    </table>
    </div>
    </div>
    
	<div class="col-md-2"></div>
    </div>
    


</div>
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-2">
<button id="print" style="background-color:#39F; color:#000;" onclick="printout();" class="btn-block">Print</button>
</div>
<div class="col-md-2">
<button class="btn-block" style="background-color:#39F;"><a href="pe_generate_attendance.php" style="color:#000;">Back</a></button>
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