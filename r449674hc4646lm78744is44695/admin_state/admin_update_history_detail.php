<?php

// Array ( [challen] => chal_791238 [indent] => ind001 ) 
session_start();
ob_start();
if($_SESSION['admin_emails']){
$indent_id=$_GET['indent_id'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $place_id=$_SESSION['place_id'];
  $serial_no=$_REQUEST['serial_no'];

 

  $query_list="SELECT * FROM `rhc_master_update_district_stock` WHERE `updated_place_to`='$place_id' AND `slno`='$serial_no'";
  $sql_exe_list=mysqli_query($conn,$query_list);
  $num_rows=mysqli_num_rows($get_place_fetch_detail);
  if($num_rows!=0){
    
    header('Location:admin_dashboard.php');
    exit;
  }
  $date=date('d-m-Y');
  $time=date('h:i:s a');
  $date1=date('Y-m-d');
  $time1=date('H:i:s');
  $result_list=mysqli_fetch_assoc($sql_exe_list);
  
// $challen=$_REQUEST['challen'];

     
$district_id=$result_list['updated_place_from'];
  $get_district="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$district_id'";
  $sql_exec_district=mysqli_query($conn,$get_district);
  $district_fetch_detail=mysqli_fetch_assoc($sql_exec_district);  

      

?>
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
  <style>
.panel-body {
    background-color: white;
}
#wrapper_menu {
  margin-bottom: -66px;
}
.btn-primary {
    color: #fff;
    background-color: #7eacd4;
    border-color: #357ebd;
    border-radius: 5px;
    padding: 5px;
}
.panel-primary > .panel-heading {
    color: #fff;
    background-color: #15c011;
    border-color: #428bca;
}
#candidate_list {
    margin-left: 21px;
    margin-right: 16px;
}
.btn-primarys {
    color: #fff;
    background-color: #16e08e;
    border-color: #1c7510;
    border-radius: 5px;
    padding: 5px;
}
fieldset {
    display: block;
    -webkit-margin-start: 2px;
    -webkit-margin-end: 2px;
    -webkit-padding-before: 0.35em;
    -webkit-padding-start: 0.75em;
    -webkit-padding-end: 0.75em;
    -webkit-padding-after: 0.625em;
    min-width: -webkit-min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}
legend {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: inherit;
    color: #333;
    border: 0;
    }
   
</style>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        View Update History Of  <?php  echo strtoupper($district_fetch_detail['district_name']).'['.$district_fetch_detail['place_district_id'].']';?>
        <mdall></mdall>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li><a href="admin_update_history.php">Update History</a></li>
        <li class="active"><a href="#">View Update Info</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- end message displayed -->
          <div class="panel panel-default">
            <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Update Details</strong></div>
            <div class="demo">
              <div class="panel-body">
                <div  id="printarea">
                  <div id="section-to-print">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Date :</label>                 
                          <?=$date1=date('d-m-Y',strtotime(trim($result_list['date'])));?>          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label for="pwd">Time :</label>                    
                          <?=$time1=date('h:i:s a',strtotime(trim($result_list['time'])));?>
                        </div> 
                      </div> 
                    </div>
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Slno</th>
                          <th>Item Code</th>
                          <th>Item Name</th>
                          <th>Item Type</th>
                          <th>Quanity </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $update_info=json_decode($result_list['updated_info'],True);
               
                          for ($i=0; $i <count($update_info); $i++) { ?>                      
                            <tr>
                              <td><?=$i+1?></td>
                              <td><?=$item_codes=$update_info[$i]['item_codes']?></td>
                              <td>
                                <?php 
                                  $query_code_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_codes'";
                                  $sql_exe_code=mysqli_query($conn,$query_code_name);
                                  $code_name_fetch=mysqli_fetch_assoc($sql_exe_code);
                                  echo $code_name_fetch['item_name'];
                                ?>
                              </td>
                              <td><?=$update_info[$i]['item_types']?></td>
                              <td><?=$update_info[$i]['item_quantity']?></td>
                            </tr>
              
                      <?php 
                        }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>  
              <div class="text-left">
                     <a href="admin_update_history.php"  class="btn btn-default">Back</a>             
              </div>
              <div class="text-right">
                <input type="button" class="btn-primary pull-right" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/> 
              </div>  
            </div>              
          </div>
        </div>
      </div>
    </div>    
  </section>
</div>
  <!-- /.content-wrapper -->

<?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
 <script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
/*--This JavaScript method for Print command--*/

    function PrintDoc() {
     
        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=550,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::<?=date('d-m-y')?>::</title><link rel="stylesheet" type="text/css" href="assert_FRONT/print.css" /><link href="assert_FRONT/dist/css/bootstrap.min.css" rel="stylesheet" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

/*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="assert_FRONT/print.css" /><link href="assert_FRONT/dist/css/bootstrap.min.css" rel="stylesheet" /></head><body">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }


</script>