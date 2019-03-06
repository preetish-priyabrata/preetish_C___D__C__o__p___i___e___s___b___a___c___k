<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['cand_user'])
{
?>
<script>
function close_this()
{
window.location.href="application_form.php";
}
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
<section>    
  <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <?php include'application_form_exam.php';?>
    </div>
    <div class="col-lg-4"></div>
  </div>
</section>
<?php 
    if($_SESSION['exam_selected']){?>
               <div class="col-lg-6"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<?php //}  
    $qry_verified="SELECT * FROM `candidate_application_info` WHERE `candidate_email` ='$_SESSION[cand_user]' And `application_submitted`='yes' AND `exam_name`='$_SESSION[exam_selected]' ";
 
    $sql_verified=mysqli_query($conn, $qry_verified);
    $application_status=mysqli_fetch_array($sql_verified);
    $num_row_verified=mysqli_num_rows($sql_verified);
   
    ?>
    
                   <legend><h3>Application Status</h3></legend>
                  <?php if($num_row_verified!=0){?>
                    <?php 
                      $view_appliaction_status=$application_status['application_verification_officer'];
                    switch ($view_appliaction_status) {
                      case '0':
                       echo "<p style='color:blue'><b>Application Is Not Been Verified Please Wait !!!</b></p>" ;
                        break;
                          case '1':
                        echo "<p style='color:green'><b>Application Is Been Verified SuccessFully</b></p>";
                        break;
                          case '2':
                           echo "<p style='color:orange'><b>Application Is Incomplete or Inadequate !!!! </b></p><br>";
                       $section=unserialize($application_status['section']);
                            $days=unserialize($application_status['days']);
                            $reason=unserialize($application_status['reason_inadequte']);
                            $last_date=unserialize($application_status['dead_line_date']);
                            $counts=count($section);
                            for ($i=0; $i <$counts ; $i++) {                            
                           
                            switch ($section[$i]) {
                              case '0':
                                $exam_info_str="Personal Info";
                                break;
                               case '1':
                                 $exam_info_str="Eduction Info";
                                break;
                               case '2':
                                $exam_info_str="Employment Info";
                                break;
                               case '3':
                                 $exam_info_str="Upload Certificate Info";
                                break;
                               case '4':
                                 $exam_info_str="Payment Info";
                                break;    
                              default:
                                 $exam_info_str="Declaration";
                                break;
                            }       
                            
                      
                        echo 'Section :<span style="color:orange">'.$exam_info_str.'</span><br>';
                        echo 'Reason :<span style="color:orange">'.$reason[$i].'</span><br>';
                        echo 'Day :<span style="color:orange">'.$days[$i].'</span><br>';
                        echo 'Last Day :<span style="color:orange">'.$last_date[$i].'</span><br>';
                    }
                        break;
                      
                      default:
                        echo "<p style='color:red'><b>Application Is Been Rejected </b></p>";
                        break;
                    }?>
                 
                  
                 
                  <?php }else{
                  
                        echo "<p style='color:blue'><b> Please Fill Application Form Then Check Status Of Application Status  </b></p>";
                       
                    }
                  ?>








                <center><input type="button" id="close" name="close" value="close" class="btn-primary" onclick="close_this();" /></center>
                              </div>
                               </div>
                               </div>
  <?php }else{?>
<div class="col-md-12">
    <div class="alert alert-success text-center">
      <strong > Please Select The Exam For Application Status</strong>
    </div>
  </div>
 <?php }?>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>