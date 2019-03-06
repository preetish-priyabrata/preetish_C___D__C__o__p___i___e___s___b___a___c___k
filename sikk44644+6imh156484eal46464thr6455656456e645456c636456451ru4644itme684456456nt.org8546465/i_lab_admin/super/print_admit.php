<?php
// print_r($_GET);
// exit;
session_start();
// ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
// Array ( [exam_id] => [exam] => 1 ) 
// print_r($_GET);
// Array ( [exam] => 1 [list] => 1 [session] => 2 ) 
$slno_roll_id=$_GET['exam_id'];//slno_roll
$list=$_GET['exam'];//exam

$qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `assign_date_status`='1' and `generate_all_status`='1' and `admit_status`='1' and `slno_group`='$list'";
$sql_exam=mysqli_query($conn, $qry_exam);
$res_exam=mysqli_fetch_array($sql_exam);


$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no_exam_center` WHERE `group_exam_slno`='$list' and `generate_attendance`='1' and `slno_roll_id`='$slno_roll_id'";
	$sql_get_candidate=mysqli_query($conn,$get_candidate);
	$res=mysqli_fetch_assoc($sql_get_candidate);
	// print_r($res);
	$qry_cand_info="SELECT * FROM `application_form` WHERE `candidate_mobile`='$res[candidate_moblie]'";
	$sql_cand_info=mysqli_query($conn, $qry_cand_info);
	$res_cand_info=mysqli_fetch_array($sql_cand_info);

	$center_id=$res['center_id'];
    $qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.no_session,c.Center_Address FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$list' WHERE c.status_exam='1' and a.exam_center_slno='$center_id' ";
    $sql_assin=mysqli_query($conn, $qry_assign);
    $result_ids=mysqli_fetch_assoc($sql_assin);

    $get_pay_details="SELECT * FROM `ilab_payment_info` WHERE `mobile_no`='$res[candidate_moblie]' and `slno_group_pay`='$res[paid_slno]'";
	$sql_get_pay_details=mysqli_query($conn,$get_pay_details);
	$result_sql_get_pay_details=mysqli_fetch_assoc($sql_get_pay_details);


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
				<div class="panel panel-default">
		  			<div class="panel-body" style="border: 2px solid lightgreen">
						<div >
							<div class="col-md-1">
								<img style="width:70px; height:70px;" src="img1.jpg"/>
							</div>
							<div class="col-md-11">
							<div style="text-align:center;">
								<h4 style="text-transform:uppercase; "><b>   Health Care, Human Services and Family Welfare Department, Govt of Sikkim,<br>
			                                    Tashiling, Gangtok<br></b> </h4>
			                      <h5 style="text-transform:uppercase; "><b> Admit Card <?=date('Y')?></b> </h5>              
							</div>
						</div>
						
						</div>
						<hr style="border: 2px solid">
							<br>
							

							<br>
							<div class="col-md-8 col-md-offset-2">                    
                            <table class="table table-bordered" align="center"  cellspacing="0" cellpadding="1" >
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><label>Exam Name</label></td>
                                  <td>:</td>
                                  <td><small><?php echo $res_exam['exam_group']; ?></small></td>
                                  <td></td>         
                                  <td rowspan="10" ><img src="../../images/photo/<?=$res_cand_info['candidate_photo']?>"  width="220"  height="180" id="photopreview" name="photopreview">
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Roll No</label></td>
                                  <td>:</td>
                                  <td><small><?=$res['roll_no']?></small></td>       
                                  <td></td>
                                </tr>
                                <!-- `candidate_name`, `candidate_father_name``candidate_gender` -->
                                <tr>
                                  <td><label>Name</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_cand_info['candidate_name']?></small></td>
                                  <td></td> 
                                </tr>

                                <tr>
                                  <td><label>Father Name</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_cand_info['candidate_father_name']?></small></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Gender </label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_cand_info['candidate_gender']?></small></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Application No </label></td>
                                  <td>:</td>         
                                  <td><small><?=$res['candidate_application']?></small></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Exam Date</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res['date_exam']?></small></td>
                                  <td></td>  
                                </tr>
                                <tr>
                                  <td><label>Exam Time</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res['time_exam']?></small></td>
                                  <td></td>   
                                </tr>
                                <tr>
                                  <td><label>Exam Center</label></td>
                                  <td>:</td>         
                                  <td><small><?php echo $result_ids['exam_name']; ?></small>
                                  		<br>
                                  		<p><small><b>Address :</b><?php echo $result_ids['Center_Address']; ?></small></p>

                                  </td>
                                  <td></td>
                                </tr>
                                 <tr>
                                  <td><label>Applied Post</label></td>
                                  <td>:</td>         
                                  <td><small>
                                  		<?php
							      $post_name=json_decode($result_sql_get_pay_details['post_name']);
							      	for ($i=0; $i <count($post_name) ; $i++) { 
							      		echo $post_name[$i]."<br>";
							      	}
							      ?>
                                  </small></td>
                                  <td> </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <br>
                        <br>
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">  
                            <table cellspacing="0" cellpadding="1"   align="Center" width="60%">
                              <thead>
                                <tr>
                                  <th>__________________________</th>
                                  <th><br>&nbsp;&#160;</th>
                                  <th><br>&nbsp;&#160;</th>
                                  <th>__________________________</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th>
                                   <label>Candidate Sign</label>
                                  </th>
                                  <th><br></th>
                                  <th><br></th>
                                  <th>
                                   <label>Authorised Sign</label>
                                  </th>
                                </tr>
                              </tbody>
                            </table>  
                          </div>
                        </div>

                        </div>

					
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






</body>
</html>


<?php 



}else{

}