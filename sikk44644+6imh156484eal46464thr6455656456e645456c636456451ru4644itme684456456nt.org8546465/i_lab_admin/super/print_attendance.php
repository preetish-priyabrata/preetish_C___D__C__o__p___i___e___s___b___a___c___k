<?php
// print_r($_GET);
// exit;
session_start();
// ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
// Array ( [exam] => 1 [list] => 1 ) 
// print_r($_GET);
// Array ( [exam] => 1 [list] => 1 [session] => 2 ) 
$exam=$_GET['exam'];//slno_exam
$list=$_GET['list'];//exam
$session=$_GET['session'];//session

$qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.no_session FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$list' WHERE c.status_exam='1' and a.exam_center_slno='$exam' ";
$sql_assin=mysqli_query($conn, $qry_assign);

$qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `assign_date_status`='1' and `generate_all_status`='1' and `slno_group`='$list'";
$sql_exam=mysqli_query($conn, $qry_exam);
$res_exam=mysqli_fetch_array($sql_exam);
$result_id=mysqli_fetch_assoc($sql_assin);

$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no_exam_center` WHERE `group_exam_slno`='$list' and `generate_attendance`='1' and `session_no`='$session' and `center_id`='$exam'";
	$sql_get_candidate=mysqli_query($conn,$get_candidate);

?>
<!DOCTYPE html>
<html>
<head>
	<link href="print.css" rel="stylesheet" />
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<title></title>
</head>
<body onload="PrintDoc()">

<div  id="printarea">
<div id="section-to-print">
	<div class="container-fluid">
		<div class="row">
			
				<!-- <div style="text-align:center;">
					<img style="width:70px; height:70px;" src="uploads/organisation_logo/<?php echo $res_temp["header_logo"]; ?>"/>
				</div>
				<div style="text-align:center;">
					<h4 style="text-transform:uppercase; "><b><?php echo $res_temp["header_name"];?></b> </h4>
				</div>   -->     
			
		<h5 style="text-align:center">Exam: <?php echo $res_exam['exam_group']; ?></h5>
		<h5 style="text-align:center">Exam Center:  <?php echo $result_id['exam_name']; ?></h5>
		<h5 style="text-align:center">Session :  <?php echo $session; ?></h5>
		</div>
		<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" border="1"  cellspacing="0" cellpadding="1"  align="center">
			<thead>
            <tr>
              <th ><small>Sl. No.</small></th>
              <th ><small>Roll No</small></th>                
                <th ><small>Photo</small></th>
                <th width="40%"><small>Candidate Name</small></th>               
                <th  ><small>Candidate Sign</small></th> 
                 <th  ><small>Invigilator Sign</small></th>        
            </tr>
            </thead>
            <tbody>
            <?php
			$i=0;
			while($res=mysqli_fetch_array($sql_get_candidate))
			{
				$i++;
				$qry_cand_info="SELECT * FROM `application_form` WHERE `candidate_mobile`='$res[candidate_moblie]'";
				$sql_cand_info=mysqli_query($conn, $qry_cand_info);
				$res_cand_info=mysqli_fetch_array($sql_cand_info);
				
			?>
            <tr>
            	<td><?php echo $i; ?>.</td>
            	<td><?php echo $res['roll_no']; ?>.</td>                
                <td ><img style=" height:80px; width:120px" src="../../images/photo/<?=$res_cand_info['candidate_photo']?>" alt="" width="180px">
                </td>
                 <td ><?=$res_cand_info['candidate_name']?></td>
                
                <td ></td>
                <td ></td>
            </tr>
            <?php
				

			
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
<a class="btn-block" onclick="close_window()" style="background-color:#39F; text-align:center;color:#000;"" href="#">Back</a>
</div>
<div class="col-md-4">
 
</div>
</div>











 <script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
/*--This JavaScript method for Print command--*/

    function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=auto,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="../asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')

        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();
         window.close;
        

    }

/*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=auto,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="../asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">></head><body">')

        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();

        window.close;

    }

function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}

</script>

<?php
}else{
	header('Location:logout.php');
	exit;
}

?>

<!--  -->

</body>
</html>