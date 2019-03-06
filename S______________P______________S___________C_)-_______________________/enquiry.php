 <?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['cand_user'])
{
date_default_timezone_set('Asia/Calcutta');	

 $qry_response="SELECT * FROM `enquiry_response_table` WHERE `rcvr_username`='$_SESSION[cand_user]' ORDER BY 'DESC' limit 0,3";
	$sql_response=mysqli_query($conn, $qry_response);
?>
<div class="col-lg-4"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h3>Response Received</h3></legend>
<!--<table class="table">-->
<?php
while($res_response=mysqli_fetch_array($sql_response))
{ $i=1;
?>
<div class="panel"> 
              <!-- Panel heading -->
              <div class="panel-heading">
              <!--<div class="panel-title">-->
              <table style="width:100%">
              <tr>
              <td style="width:15%"><?php echo $i;?>.</td>
              <td style="width:60%"><a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt<?php echo $i;?>"><b><?php echo $res_response["response_hdng"];?></b></a></td>
              <td style="width:25%"><?php echo $res_response["date"]; ?></td>
              </tr>
              </table>
              <!--</div>-->
              </div>
              <div id="collapseOne-alt<?php echo $i;?>" class="panel-collapse collapse"> 
                <!-- Panel body -->
                <table style="width:100%">
                <tr>
                <td style="width:15%"></td>
                <td style="width:85%"><p align="justify" class="panel-body"><?php echo $res_response["response_text"]; ?></p></td>
                </tr>
                </table>
                
            </div>
                  
                  <?php
				  $i++;
				  }
				  ?>
                  <!--</table>-->
                                 <form action="save_enquiry.php" id="enquiry" enctype="multipart/form-data" method="post" role="form" novalidate>
                                 <input type="hidden" id="curr_date" name="curr_date" value="<?php echo date("Y-m-d") ?>" />
                                 <input type="hidden" id="curr_time" name="curr_time" value="<?php echo  date("h:i:s") ?>" />
              <legend><h3>Enquiry</h3></legend>
                  <table class="table">
                  <tr>
                  <td>Heading</td>
                  <td><input type="text" id="enq_hdng" name="enq_hdng" class="form-control" /></td>
                  </tr>
                  <tr>
                  <td>Text</td>
                  <td><textarea rows="5" id="enq_text" name="enq_text" cols="30" class="form-control"></textarea>
                  </td>
                  </tr>
                  
                  </table>
                  <center><input type="submit" id="send" name="send" value="SEND" class="btn-primary"></center>
                  	
                         </form>
                              
                               </div>
                               </div>
                               </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>