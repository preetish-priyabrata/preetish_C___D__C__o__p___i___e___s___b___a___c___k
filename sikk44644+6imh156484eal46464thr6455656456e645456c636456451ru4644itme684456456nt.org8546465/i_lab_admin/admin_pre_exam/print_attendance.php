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

 $get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `group_exam_slno`='$list'  and `center_id`='$exam' order by `roll_no` asc";
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
<body>
  <div id="printarea">
    <div id="section-to-print">
      <!-- <div class="header_print"> -->
      <div class="container">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body" style="border: 2px solid lightgreen">
              <div class="row text-center">
                <div class="col-md-12 text-center">
                    <!-- <div class="col-md-5"></div> -->
                  <img style="width:70px; height:70px;" src="img1.jpg"/>
                </div>
                    <!-- <div class="col-md-4"></div>
                    <div class="col-md-3"></div> -->
              </div> 
              <div class="row">
                 <!-- <div class="col-md-1"></div> -->
                <div class="col-md-12 text-center">
                <!-- <div style="text-align:center;"> -->
                  <h4 style="text-transform:uppercase; ">
                    <strong>GOVERNMENT OF SIKKIM</strong><br>
                    <strong>HEALTH CARE, HUMAN SERVICES AND FAMILY WELFARE DEPARTMENT </strong><br>
                    <small><u>TASHILING SECRETARIAT, GANGTOK</u></small>
                  </h4>

                </div>
                <div class="col-md-12 text-center">
                    <h5 style="text-align:center">Exam: <?php echo $res_exam['exam_group']; ?></h5>
                    <h5 style="text-align:center">Exam Center:  <?php echo $result_id['exam_name']; ?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
      <hr style="border: 2px solid">
      <div class="container">
        <div class="row">
          <?php
                  $i=0;
                  $num=mysqli_num_rows($sql_get_candidate);
                  // print_r($res);
                  while($res_id=mysqli_fetch_assoc($sql_get_candidate)){
                    
                    $res[$i]=$res_id;
                    // print_r($res);
                    $i++;
                  }?>
          <div class="col-md-6">
            <table class="table table-bordered" border="1"  cellspacing="0" cellpadding="0"  width="100%" align="center">
              <thead>
                <tr>
                  <th><small>Roll No</small></th>
                  <th><small>Photo</small></th>
                  <th width="20%"><small>Candidate Name</small></th>
                  <th width="20%"><small>Candidate Sign</small></th>                 
                </tr>
              </thead>
              <tbody>
                <?php 
                  // print_r($res);
                  for ($j=0; $j <count($res) ; $j++){
                    // print_r($res[$j]);
                    
                   $candidate_moblie=$res[$j][candidate_moblie];
                    // $i++;
                    $qry_cand_info="SELECT * FROM `application_form` WHERE `candidate_mobile`='$candidate_moblie'";
                    $sql_cand_info=mysqli_query($conn, $qry_cand_info);
                    $res_cand_info=mysqli_fetch_array($sql_cand_info);
                     if($j%2==0){
                  ?>
                <tr>
                  
                  <!-- <td><?php echo $i; ?>.</td> -->
                  <td><small><?php echo $res[$j]['roll_no']; ?>.</small></td>                
                  <td ><img style=" height:80px; width:120px" src="../../images/photo/<?=$res_cand_info['candidate_photo']?>" alt="" width="180px">
                  </td>
                  <td ><small><?=$res_cand_info['candidate_name']?></small></td>
                
                  <td ></td>
                </tr>
                <?php
              }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-bordered" border="1"  cellspacing="0" cellpadding="0"  width="100%" align="center">
              <thead>
                <tr>
                  <th><small>Roll No</small></th>
                  <th><small>Photo</small></th>
                  <th width="20%"><small>Candidate Name</small></th>
                  <th width="20%"><small>Candidate Sign</small></th>                 
                </tr>
              </thead>
              <tbody>
                <?php 
                  // print_r($res);
                  for ($k=0; $k <count($res) ; $k++){
                    // print_r($res[$j]);
                    
                    $candidate_moblie_k=$res[$k][candidate_moblie];
                    // $i++;
                    $qry_cand_info_k="SELECT * FROM `application_form` WHERE `candidate_mobile`='$candidate_moblie_k'";
                    $sql_cand_info_k=mysqli_query($conn, $qry_cand_info_k);
                    $res_cand_info_k=mysqli_fetch_array($sql_cand_info_k);
                     if($k%2!=0){
                  ?>
                <tr>
                  
                  <!-- <td><?php echo $i; ?>.</td> -->
                  <td><small><?php echo $res[$k]['roll_no']; ?>.</small></td>                
                  <td ><img style=" height:80px; width:120px" src="../../images/photo/<?=$res_cand_info_k['candidate_photo']?>" alt="" width="180px">
                  </td>
                  <td ><small><?=$res_cand_info_k['candidate_name']?></small></td>
                
                  <td ></td>
                </tr>
                <?php
              }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="footer_print">
          <div style="position: absolute;bottom: 10px; left: 10px; "><label>Invigilator's signature:</label>____________________________________________</div>
        </div>
        <div class="row" style="page-break-before: always;">
          <div class="col-md-12">     
            <label>Total Nos Candidate: </label><label> <?=$num?> </label><br>
            <br><label>Total Candidates Absent: </label>__________________________________________<br>         
            <br><label>Total Candidates Present: </label>_________________________________________<br>
            <!-- <br><label>Invigilator's signature:</label>____________________________________________<br> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-2">
      <input type="button" class="btn-block" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/>
      <!-- <button onclick="myFunction()">Print this page</button> -->
    </div>
    <div class="col-md-2">
      <a class="btn-block" onclick="close_window()" style="background-color:#39F; text-align:center;color:#000;"" href="#">Back</a>
    </div>
    <div class="col-md-4"></div>
  </div>
<style type="text/css" media="print">
    
    .center {
    text-align: center;
    /*border: 3px solid green;*/
}
.row .row, .row-fluid .row-fluid {
    margin-bottom: 6px;
}
@media print{
  .panel-heading{
    padding:0;
  }
   @page { size: landscape; 
      /* display: block;
       page-break-before: always;*/
       /*page-break-before: always;*/
   }
    table td.shrink {
      white-space:nowrap
  }
  table td.expand {
      width: 99%
  }
  .clearfix:after {
    clear: both;
}
}
.newclass { display: none }
  </style>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>
function myFunction() {
    window.print();
}
</script>
<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
/*--This JavaScript method for Print command--*/

    function PrintDoc() {
        // var toPrint = $('#printarea');
        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank');

        popupWin.document.open();

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y')."Roll No".$roll_no_id?>::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')

        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();
         window.close;
        

    }

/*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">></head><body">')

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