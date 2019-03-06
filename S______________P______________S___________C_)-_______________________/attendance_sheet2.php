<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php"; 
require 'FlashMessages.php';
print_r($_POST);
$msg = new \Preetish\FlashMessages\FlashMessages();
//print_r($_POST);
if($_SESSION['preexam_user']){
	$exam=$_REQUEST["exam"];
	$center=$_REQUEST["center"];
	$qry_temp="SELECT * FROM `template_info` WHERE `organisation`='spsc'";
	$sql_temp=mysqli_query($conn, $qry_temp);
	$res_temp=mysqli_fetch_array($sql_temp);
	// Include the main TCPDF library (search for installation path).
	require_once('tcpdf/examples/tcpdf_include.php');
	// create new PDF document
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Preetish Developer');
// title of pdf
	$pdf->SetTitle('');
	//subject
	$pdf->SetSubject('TCPDF Tutorial');
	//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	$PDF_HEADER_LOGO =__DIR__."/uploads/organisation_logo/".$res_temp['header_logo'];//any image file. check correct path.
	$PDF_HEADER_LOGO_WIDTH = "20";
	$PDF_HEADER_TITLE =strtoupper($res_temp['header_name']);
	$PDF_HEADER_STRING = "";
	$pdf->SetHeaderData($PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);
	// set default header data
	// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	  require_once(dirname(__FILE__).'/lang/eng.php');
	  $pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('helvetica', 'B', 20);

	// add a page
	$pdf->AddPage();
	 $xm="Attendance Sheet For ".$_POST['exam']." (".$_POST['center'] .") ";
	$pdf->Write(0,$xm, '', 0, 'L', true, 0, false, false, 0);

	$pdf->SetFont('helvetica', '', 8);
$params = $pdf->serializeTCPDFtagParameters(array('40144399300102444888207482244309', 'C128C', '', '', 0, 0, 0.2, array('position'=>'S', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>false, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>2), 'N'));
$tbl='<table cellspacing="0" cellpadding="1" border="1" frame="box" align="center">';
$tbl.='<thead>
			<tr>
                <th width="35">Sl. No.</th>                
                <th width="80">Photo</th>
                <th width="40%">Candidate details</th>
                <th>Candidate Signature</th>
                <th>Candidate Signature</th>        
            </tr>

        </thead>';
$qry="SELECT * FROM `pre_exam_roll_center` WHERE `exam_name`='$exam'  AND `center_name`='$center'";
$sql=mysqli_query($conn, $qry);
$i=1;
while($res=mysqli_fetch_array($sql)){
	$qry_cand_info="SELECT * FROM `candidate_personal_details` a, `candidate_declaration` b WHERE a.application_no='$res[application_no]' AND a.application_no=b.application_no";
				$sql_cand_info=mysqli_query($conn, $qry_cand_info);
				while($res_cand_info=mysqli_fetch_array($sql_cand_info))
				{
			
$tbl .= <<<EOD
    <tbody>
    	<tr>
                <td width="35">{$i}</td>
                
                <td width="80"><img src="uploads/candidate_photos/{$res_cand_info["candidate_photo"]}" style="height:80px; width:120px"/></td>
                <td width="40%"><table>
                    	<tr>
                        	<td>Enrollment No.:</td>
                            <td>{$res["roll_no"]}</td>
                        </tr>
                        <tr>
                        	<td>Application No.:</td>
                            <td>{$res["application_no"]}</td>
                        </tr>
                    	<tr>
                        	<td>Name:</td>
                            <td>{$res_cand_info["candidate_name"]}</td>
                        </tr>
                    	<tr>
                        	<td>DOB:</td>
                            <td >{$res_cand_info["dob"]}</td>
                        </tr>
                    	<tr>
                        	<td>Exam:</td>
                            <td>$exam</td>
                        </tr>
                    </table>
                    </td>
                <td><img style="height:60px; width:100px" src="uploads/candidate_signature/{$res_cand_info["signature"]}"></td>
                <td></td>        
            </tr>
    </tbody>


EOD;
}
				$i++;
			}
  $tbl.='</table>';
  


$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl=<<<EOD
<table cellspacing="0" cellpadding="1" border="1">
  			
    		<tr>
    	<th>Candidates present</th>
	    <th><input type='text' ></th>
        <th>Candidates Absent</th>
        <th><input type='text' ></th>
        <th>Invigilator's signature:</th>
        <th><input type='text' /></th>
    </tr> 
    
    </table>

EOD;


$pdf->writeHTML($tbl, true, false, false, false, '');
$i=$i-1;
$tbl=<<<EOD
<table cellspacing="0" cellpadding="1" border="1">
  			
    		<tr>
    	<th>Total Nos Candidate: </th>
	    <th>{$i}</th>
        <th> Total Candidates Absent</th>
        <th><input type='text' ></th>
        <th> Total Candidates Present</th>
        <th><input type='text' ></th>
        <th>Invigilator's signature:</th>
        <th><input type='text' /></th>
    </tr> 
    
    </table>

EOD;


$pdf->writeHTML($tbl, true, false, false, false, '');

		$code=date('d-m-Y').'-'.$exam.'-'.$center.'.pdf';
      $x=$pdf->Output(__DIR__ . '/uploads/attend/'.$code, 'F');
       //f
     // echo "hi";
   
if($x){
	$qry_status="UPDATE `assign_exam_center` SET `generated_sheet _status`='1',`attendance_data_sheet_file_name`='$code' WHERE `exam_name`='$exam' And `center_name`='$center'";
			$sql_status=mysqli_query($conn, $qry_status);
			if($sql_status){
				$msg->success('Success-Fully Generated Attendance Sheet For '.$center);
				header("location:pe_generate_attendance.php");
				exit;
			}else{
				$msg->warning('Unable To Generated Generated Attendance Sheet Try Again !!! For '.$center);	
				header("location:pe_generate_attendance.php");
				exit;
			}
	
}else{
$qry_status="UPDATE `assign_exam_center` SET `generated_sheet _status`='1',`attendance_data_sheet_file_name`='$code' WHERE `exam_name`='$exam' And `center_name`='$center'";

			$sql_status=mysqli_query($conn, $qry_status);
			if($sql_status){
				$msg->success('Success-Fully Generated Attendance Sheet For '.$center);
				header("location:pe_generate_attendance.php");
				exit;
			}else{
				$msg->warning('Unable To Generated Generated Attendance Sheet Try Again !!! For '.$center);	
				header("location:pe_generate_attendance.php");
				exit;
			}
}


}

?>