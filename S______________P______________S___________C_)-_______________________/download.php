<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['cand_user'])
{
?>
  <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <?php include'application_form_exam.php';?>
    </div>
    <div class="col-lg-4"></div>
  </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>
  <?php if($_SESSION['exam_selected']){ 
             //organization name
            $qry_temp="SELECT * FROM `template_info` WHERE `organisation`='spsc'";
            $sql_temp=mysqli_query($conn, $qry_temp);
            $res_temp=mysqli_fetch_array($sql_temp);
            //appcation info
            $qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `exam_name`='$_SESSION[exam_selected]'";
            $sql_check_appno=mysqli_query($conn, $qry_check_appno);
            $num_rows=mysqli_num_rows($sql_check_appno);
            if($num_rows!="0"){
              $res_check_appno=mysqli_fetch_array($sql_check_appno);
              $appno= $res_check_appno["application_no"]; 
              // appliction verified  
              $qry_check_appno1="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `exam_name`='$_SESSION[exam_selected]' And `application_no`='$appno' And `application_verification_officer`='1'";

               $sql_check_appno1=mysqli_query($conn, $qry_check_appno1);
               $num_rows1=mysqli_num_rows($sql_check_appno1);
              if($num_rows1!="0"){
                $res_check_appno1=mysqli_fetch_array($sql_check_appno1);
                // check wheather the application is roll and admit card status ===1
               
                  if(($res_check_appno1['roll_gen_status']=="1") && ($res_check_appno1['admit_status']=="1")){
                    //admit card detail
                    $qry_check_appno2="SELECT * FROM `candidate_admit_card` WHERE `exam_name`='$_SESSION[exam_selected]' And `application_no`='$appno'";
                   
                    $sql_check_appno2=mysqli_query($conn, $qry_check_appno2);
                     $res_check_appno2=mysqli_fetch_array($sql_check_appno2);

    ?>
                  <div  id="printarea">
                    <div id="section-to-print">
                      <div class="container-fluid"> 
                        <div class="row">      
                          <div style="text-align:center;">
                            <h4 style="text-transform:uppercase; "> <img style="width:70px; height:70px;" src="uploads/organisation_logo/<?php echo $res_temp["header_logo"]; ?>"/>          
                              <b><?php echo $res_temp["header_name"];?></b> 
                            </h4>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">                    
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
                                  <td><small><?=$res_check_appno2['exam_name']?></small></td>
                                  <td></td>         
                                  <td rowspan="5" ><img src="uploads/candidate_photos/<?php echo $res_check_appno2["candidate_photo"] ?>"  width="120"  height="80" id="photopreview" name="photopreview">
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Enrollment No</label></td>
                                  <td>:</td>
                                  <td><small><?=$res_check_appno2['roll_no']?></small></td>       
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Application No</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['application_no']?></small></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Name</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['candidate_name']?></small></td>
                                  <td></td> 
                                </tr>
                                <tr>
                                  <td><label>Exam Date</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['exam_date']?></small></td>
                                  <td></td>  
                                </tr>
                                <tr>
                                  <td><label>Exam Time</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['exam_time']?></small></td>
                                  <td></td>   
                                </tr>
                                <tr>
                                  <td><label>Exam Center</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['exam_center']?></small></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
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
                                  <th><br></th>
                                  <th><br></th>
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
                    <div class="row">
                      <div class="col-md-5 text-center"></div>
                        <div class="col-md-2 text-center">
                          <input type="button" class="btn-block" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/>
                        </div>
                    </div>
                    <br>
                    
              <?php }else{?>
                       <div class="col-md-12">
                        <div class="alert alert-success text-center">
                          <strong > Wait For Generation Of Admit Card  :- <?=$_SESSION['exam_selected']?> </strong>
                        </div>
                      </div>
                <?php }

            }else{?>
            <div class="col-md-12">
            <div class="alert alert-success text-center">
              <strong > Please Check View Appliction Status :- <?=$_SESSION['exam_selected']?> </strong>
            </div>
          </div>
             <?php  } ?>
<?php }else{

  ?>
    <div class="col-md-12">
      <div class="alert alert-success text-center">
        <strong > Please Submit The Application Form Of The Exam :- <?=$_SESSION['exam_selected']?> </strong>
      </div>
    </div>
<?php } ?>
<?php  }else{

    ?>
  <div class="col-md-12">
    <div class="alert alert-success text-center">
      <strong > Please Select The Exam </strong>
    </div>
  </div>
  
    <?php }?>
<script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){
    // alert(xyz);
   
      $.ajax({
        type: "POST",
        url: "select_exam_application.php",
        data: {exam_type:xyz},
        success: function(result)   {
          if(result==1){
            // alert('hi');
            location.reload();
          }
        }
      });
    }   
  }
  </script>
  <style type="text/css">
    
    .center {
    text-align: center;
    /*border: 3px solid green;*/
}
.row .row, .row-fluid .row-fluid {
    margin-bottom: 6px;
}
@media print{
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
  </style>

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