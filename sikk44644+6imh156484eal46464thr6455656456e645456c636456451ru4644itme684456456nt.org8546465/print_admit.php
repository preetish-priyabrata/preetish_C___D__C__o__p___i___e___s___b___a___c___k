<?php
// print_r($_GET);

session_start();
// ob_start();
if($_SESSION['user_no']){
  include  'config.php';
// /Array ( [exam_id] => 7CASTGj113OtxUyjesWs/Fr7WpwvM/2tDlD4G6QClBE= [exam] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= ) 
$slno_roll_id=web_decryptIt(str_replace(" ", "+",($_GET['exam_id'])));//slno_roll
$list=web_decryptIt(str_replace(" ", "+",($_GET['exam'])));//exam
// exit;
 $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `assign_date_status`='1' and `generate_all_status`='1' and `admit_status`='1' and `slno_group`='$list'";
$sql_exam=mysqli_query($conn, $qry_exam);
$res_exam=mysqli_fetch_array($sql_exam);
// print_r($res_exam);
// Array ( [0] => 1 [slno_group] => 1 [1] => Driver [exam_group] => Driver [2] => 1 [assigned_class] => 1 [3] => 2 [status] => 2 [4] => 0 [assigned_group] => 0 [5] => 1 [roll_prefix_status] => 1 [6] => 1 [assign_date_status] => 1 [7] => 1 [generate_all_status] => 1 [8] => 1 [admit_status] => 1 ) 
// SELECT * FROM `ilab_pre_exam_roll_no` WHERE `group_exam_slno`='$exam' and `assign_roll_center`='1'
 $get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `group_exam_slno`='$list' and `assign_roll_center`='1' and `slno_roll_id`='$slno_roll_id'";
// $get_candidate="SELECT * FROM `ilab_pre_exam_roll_no_exam_center` WHERE `group_exam_slno`='$list' and `generate_attendance`='1' and `slno_roll_id`='$slno_roll_id'";
  $sql_get_candidate=mysqli_query($conn,$get_candidate);
  $res=mysqli_fetch_assoc($sql_get_candidate);
  // print_r($res);
  // candidate_moblie
  $qry_cand_info="SELECT * FROM `application_form` WHERE `candidate_mobile`='$res[candidate_moblie]'";
  $sql_cand_info=mysqli_query($conn, $qry_cand_info);
  $res_cand_info=mysqli_fetch_array($sql_cand_info);

  $center_id=$res['center_id'];
     $qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.no_session FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$list' WHERE c.status_exam='1' and a.exam_center_slno='$center_id' ";
    $sql_assin=mysqli_query($conn, $qry_assign);
    $result_ids=mysqli_fetch_assoc($sql_assin);
    //print_r($result_ids);

   $get_pay_details="SELECT * FROM `ilab_payment_info_PAID` WHERE `mobile_no`='$res[candidate_moblie]' and `paid_info_slno`='$res[paid_slno]'";
  $sql_get_pay_details=mysqli_query($conn,$get_pay_details);
  $result_sql_get_pay_details=mysqli_fetch_assoc($sql_get_pay_details);
  // print_r($result_sql_get_pay_details);
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

<div  id="printarea">
  <div id="section-to-print">
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
                  <h5 ><b>e-admit card <?=date('Y')?></b> </h5>              
              <!-- </div> -->
            </div>
            
            </div>
            <hr style="border: 2px solid">
                      

             <div class="col-md-12"> 
              <!-- <div class="col-md-8 col-md-offset-2">  -->                   
                            <table class="table table-bordered" align="center"  cellspacing="0" cellpadding="0" >
                              <!-- <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead> -->
                              <tbody>
                                <tr>
                                  <td><label>Exam Name</label></td>
                                  <td>:</td>
                                  <td><small><?php echo $res_exam['exam_group']; ?></small></td>
                                          
                                  <td rowspan="2" colspan="4">
                                     <div class="row">
                                       <div class="col-md-1"></div>
                                      
                                            <img class="img-rounded" src="images/photo/<?=$res_cand_info['candidate_photo']?>" alt=""  id="photopreview" name="photopreview" style="width: 200px; height: 200px ">
                                            
                                    </div>
                                    <!-- <div class="col-md-8">
                                    
                                  </div> -->
                                    <!-- <img src="../../images/photo/<?=$res_cand_info['candidate_photo']?>"  width="220"  height="180" id="photopreview" name="photopreview"> -->
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Roll No</label></td>
                                  <td>:</td>
                                  <td><small><?=$roll_no_id=$res['roll_no']?></small></td>       
                                  
                                </tr>
                                <!-- `candidate_name`, `candidate_father_name``candidate_gender` -->
                                <tr>
                                  <td><label>Name</label></td>
                                  <td>:</td>         
                                  <td colspan="2"><small><?=$res_cand_info['candidate_name']?></small></td>
                                  <td><label>Father Name</label></td>
                                  <td>:</td>         
                                  <td colspan="2"><small><?=$res_cand_info['candidate_father_name']?></small></td>
                                  
                                </tr>

                                <tr>
                                  <td><label>Exam Date</label></td>
                                  <td>:</td>         
                                  <td colspan="2"><small>06-May-2018</small></td>
                                  <td><label>Exam Time</label></td>
                                  <td>:</td>         
                                  <td colspan="2"><small><?php if($res_exam['slno_group']==1){
                                    echo "<b> 01:00 PM - 02:30 PM</b>";
                                  }else{
                                     echo "<b> 10:00 AM - 11:30 AM</b>";
                                  }
                                  ?>
                                    </small></td>  
                                </tr>
                               <!--  <tr>
                                  
                                  
                                   
                                </tr> -->
                                <tr >
                                  <td><label>Exam Center</label></td>
                                  <td>:</td>         
                                  <td colspan="6"><small><?php echo $result_ids['exam_name']; ?></small>
                                      <br>
                                      <!-- <p><small><b>Address :</b><?php echo $result_ids['Center_Address']; ?></small></p> -->

                                  </td>
                                  
                                </tr>
                                 <tr>
                                  <td><label>Applied Post</label></td>
                                  <td>:</td>         
                                  <td colspan="6"><small>
                                      <?php
                                          $post_name=json_decode($result_sql_get_pay_details['post_name']);
                                            for ($i=0; $i <count($post_name) ; $i++) { 
                                              echo $post_name[$i]." , ";
                                            }
                                      ?>
                                  </small></td>
                                  
                                </tr>
                              </tbody>
                            </table>
                          </div>
                       <div class="row">                          
                          <div class="col-md-10 col-md-offset-2">  
                            <table cellspacing="0" cellpadding="1" align="Center" width="100%">
                              <thead>
                                <tr>
                                  <th>__________________________</th>
                                  <th><br>&nbsp;&#160;</th>
                                  <th><br>&nbsp;&#160;</th>
                                  <th><img style="width:130px; height:80px;" src="sing_logo.png"/>
                                    <!-- __________________________ -->
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th>
                                   <label>Signature of candidate</label>
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
                        <hr>
                        <div class="row">
                          <div class="col-md-11">
                           <p class="western" style="margin-bottom: 0cm; line-height: 115%; text-align: center;" align="center"><span style="font-family: Sylfaen, serif;"><u>INSTRUCTIONS FOR CANDIDATES</u></span></p>
                           <small>
<p class="western" style="margin-bottom: 0cm; line-height: 115%;" align="center">&nbsp;</p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; text-align: left; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">01. Admission to examination is provisional</span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">02. Candidates are allowed to use Black and Blue Ball pens only</span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">03. Mobile phones and Calculators are not permitted inside Examination Hall</span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">04. Candidates shall report at the Examination Hall by </span><span style="font-family: Sylfaen, serif;"><strong>
  <?php if($res_exam['slno_group']==1){ 
       echo "12:30 PM. ";
     }else{
        echo "09:30 AM. ";
     }
     ?>
     </strong></span><span style="font-family: Sylfaen, serif;"> for admission/ identification process . Written examination shall commence at </span><span style="font-family: Sylfaen, serif;"><strong>
     
      <?php if($res_exam['slno_group']==1){ 
       echo "01:00 PM. ";
     }else{
        echo "10:00 AM. ";
     }
     ?>
   sharp</strong></span><span style="font-family: Sylfaen, serif;">. Candidate will not be allowed to leave the Hall before expiry of 01 (one) hour after the commencement of examination</span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">05. No candidates are allowed to enter the Examination Hall after 30 (thirty) minutes from the start of examination </span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">06. Candidates are required to submit their answer scripts within the stipulated time. Extension of time will not be allowed under any circumstances after the final bell for closing the examination</span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">07.Candidates may approach the Departmental Authority for clarification in case of any doubt in matters relating to the examination, in which case, the decisions of the Department shall be final and binding</span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">08. If any misrepresentation or anomalies is detected in the course of interviews, his/ her candidatures shall be summarily cancelled. </span></p>
<p class="western" style="margin-bottom: 0cm; line-height: 115%; padding-left: 30px;" align="justify"><span style="font-family: Sylfaen, serif;">09. If the candidates are found indulging in any unfair means in the course of interviews, his/ her results shall not be declared and shall be further barred from appearing in any departmental interviews in future also. </span></p>
</small>
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
<!-- <button onclick="myFunction()">Print this page</button> -->
</div>
<div class="col-md-2">
<a class="btn-block" onclick="close_window()" style="background-color:#39F; text-align:center;color:#000;"" href="#">Back</a>
</div>
<div class="col-md-4">
 
</div>
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