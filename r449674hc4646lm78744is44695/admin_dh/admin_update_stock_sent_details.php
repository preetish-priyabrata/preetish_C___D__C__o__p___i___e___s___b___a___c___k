<?php

session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $slno=$_REQUEST['slno'];
  $place_id_district=$_SESSION['place_id'];

 $query_item="SELECT * FROM `rhc_master_update_dh_block_stock` WHERE `updated_place_from`='$place_id_district' and `slno`='$slno'";
 $sql_exe_list=mysqli_query($conn,$query_item);
  $num=mysqli_num_rows($sql_exe_list);
 if($num==0){

    
    header('Location:admin_dashboard.php');
    exit;
  	
 }
 $list_details=mysqli_fetch_assoc($sql_exe_list);

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Update Sent History Detail
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li><a href="#">Update History</a></li>
         <li><a href="#"> Update Sent History</a></li>
        <li class="active"><a href="#"> Update Sent History Detail</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
     <div class="row">
    <div class="col-sm-12">
    <div class="box box-info">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong> Update Sent History Detail</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="issue_forms" >
            <div  id="printarea">
                  <div id="section-to-print">
              <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Date :</label>
                <?=date('d-m-Y',strtotime(trim($list_details['date'])));?>
               
              </div>
              </div>
               <div class="col-sm-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <?=date('h:i:s a',strtotime(trim($list_details['time'])));?>
              </div>
              </div>  
               <div class="col-sm-6 pull-right">       
              <div class="form-group pull-right">
                <label for="email">Location :</label>
                <input type="hidden" name="place_id" id="place_id" value="<?=$_SESSION['place_id']?>">
                <input type="hidden" name="place_status" id="place_status" value="<?=$_SESSION['designation']?>">
                                <?php 
                $get_district="SELECT * FROM `rhc_master_place_dh`  WHERE `place_hostpital_id`='$place_id_district'";
                $sql_exec_district=mysqli_query($conn,$get_district);
                $district_fetch_detail=mysqli_fetch_assoc($sql_exec_district);
                echo strtoupper($district_fetch_detail['hosptial_name']).'['.$district_fetch_detail['place_hostpital_id'].']'?>
              
              </div>
              </div>
              
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Quantity</th>
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php
              	$updated_info=json_decode($list_details['updated_info'] , True);
              	
              	for ($i=0; $i < count($updated_info) ; $i++) {?>
              	<tr>
                  <td><?=$i+1?></td>
                  <td><?=$updated_info[$i]['item_codes']?></td>
                  <td><?=$updated_info[$i]['item_types']?></td>
                  <td><?=$updated_info[$i]['item_quantity']?></td>
                 </tr>
              	<?php 
              		# code...
              	}

              ?>
              </tbody>
            </table>
           </div>
              </div>
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_update_stock_sent_list.php"  class="btn btn-default">Back</a>             
            </spam>
             <div class="text-right">
                <input type="button" class="btn-primary pull-right" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/> 
              </div>  
           </div>
        </div>
          </form>
        </div>
      </div>
      </div>
      </div>
      </div>
     

    </div>
    </section>
    <!-- /.content -->
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