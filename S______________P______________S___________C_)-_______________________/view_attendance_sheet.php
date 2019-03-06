<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php"; 
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//print_r($_POST);
if($_SESSION['preexam_user']){
	$exam=$_REQUEST["exam"];
	$center=$_REQUEST["center"];
	$qry_temp="SELECT * FROM `template_info` WHERE `organisation`='spsc'";
	$sql_temp=mysqli_query($conn, $qry_temp);
	$res_temp=mysqli_fetch_array($sql_temp);
	$qry="SELECT * FROM `pre_exam_roll_center` WHERE `exam_name`='$exam'  AND `center_name`='$center'";
	$sql=mysqli_query($conn, $qry);
?>
<div  id="printarea">
<div id="section-to-print">
	<div class="container-fluid">
		<div class="row">
			
				<div style="text-align:center;">
					<img style="width:70px; height:70px;" src="uploads/organisation_logo/<?php echo $res_temp["header_logo"]; ?>"/>
				</div>
				<div style="text-align:center;">
					<h4 style="text-transform:uppercase; "><b><?php echo $res_temp["header_name"];?></b> </h4>
				</div>       
			
		<h5 style="text-align:center">Exam: <?php echo $exam; ?></h5>
		<h5 style="text-align:center">Exam Center:  <?php echo $center; ?></h5>
		</div>
		<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" border="1"  cellspacing="0" cellpadding="1"  align="center">
			<thead>
            <tr>
              <th ><small>Sl. No.</small></th>                
                <th ><small>Photo</small></th>
                <th width="40%"><small>Candidate details</small></th>
                <th ><small>Candidate Sign</small></th>
                <th  ><small>Candidate Sign</small></th> 
                 <th  ><small>Invigilator Sign</small></th>        
            </tr>
            </thead>
            <tbody>
            <?php
			$i=0;
			while($res=mysqli_fetch_array($sql))
			{
				$i++;
				$qry_cand_info="SELECT * FROM `candidate_personal_details` a, `candidate_declaration` b WHERE a.application_no='$res[application_no]' AND a.application_no=b.application_no";
				$sql_cand_info=mysqli_query($conn, $qry_cand_info);
				while($res_cand_info=mysqli_fetch_array($sql_cand_info))
				{
			?>
            <tr>
            	<td><?php echo $i; ?>.</td>                
                <td ><img style=" height:80px; width:120px" src="uploads/candidate_photos/<?php echo $res_cand_info["candidate_photo"]; ?>" /></td>
                <td width="40%">
                	<table>
                    	<tr>
                        	<td>Enrollment No.:</td>
                            <td><?php echo $res["roll_no"]; ?></td>
                        </tr>
                        <tr>
                        	<td>Application No.:</td>
                            <td><?=$res["application_no"]?></td>
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
                <td  ><img style=" height:50px; width:100px" src="uploads/candidate_signature/<?php echo $res_cand_info["signature"]; ?>" /></td>
                <td ></td>
                <td ></td>
            </tr>
            <?php
				}
			
			}
			?>
           </tbody>
        </table>
        </div>
        <div class="col-md-12">
     
	<label>Total Nos Candidate: </label><label> <?=$i?> </label><br>
   	<br><label>Total Candidates Absent: </label>__________________________________________<br>	       
	<br><label>Total Candidates Present: </label>_________________________________________<br>
	<br><label>Invigilator's signature:</label>____________________________________________<br>
		     
    		
    
   
    </div>
    </div>
    
	<div class="col-md-2"></div>

		</div>
	</div>
</div>
	</div>
	</div>
</div>
	<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-2">
<input type="button" class="btn-block" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/>

</div>
<div class="col-md-2">
<a class="btn-block" style="background-color:#39F; text-align:center;color:#000;"" href="pe_view_attendance.php" >Back</a>
</div>
<div class="col-md-4">
 
</div>
</div>

	<?php
	$code="x";

}
$contents = ob_get_contents();
ob_clean();
// <input type="button" value="Print" class="btn" onclick="PrintDoc()"/>
//  <input type="button" value="Print Preview" class="btn" onclick="PrintPreview()"/>
//<button id="print" style="background-color:#39F; color:#000;" onclick="javascript:window.print();" class="btn-block">Print</button>
//<img style="width:70px; height:70px;" src="uploads/organisation_logo/<?php echo $res_temp["header_logo"]; "/>
// <h4 style="text-transform:uppercase; "><?php echo $res_temp["header_name"]; </h4>
include_once 'template_data_table.php';
?>



	

    
    

<script>
function printpage()
  {
  window.print()
  }
</script>



<script type="text/javascript">

/*--This JavaScript method for Print command--*/

    function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=550,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::<?=date('d-m-y').'-'.$exam.'-'.$center?>::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

/*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>
