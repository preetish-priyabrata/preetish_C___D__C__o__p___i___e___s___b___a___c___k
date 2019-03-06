<?php
// print_r($_REQUEST);
// exit();
// Array ( [challen] => chal_791238 [indent] => ind001 ) 
session_start();
ob_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

  $challen=$_REQUEST['challen_no'];

  $query_challan="SELECT * FROM `rhc_master_district_challan_no` WHERE `challen_no`='$challen' and  `status`='1'";
  $sql_exe_challan=mysqli_query($conn,$query_challan);
  $result_fetch_challen =mysqli_fetch_assoc($sql_exe_challan);
// print_r($result_fetch_challen);
  $num_rows=mysqli_num_rows($sql_exe_challan);
 
  $result_fetch_challen =mysqli_fetch_assoc($sql_exe_challan); 
  $indent_id=$result_fetch_challen['indent_id'];
  $place_id=$_SESSION['place_id'];
  $query_get_place="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_id'";
  $sql_exe_get_place=mysqli_query($conn,$query_get_place);
  $get_place_fetch_detail=mysqli_fetch_assoc($sql_exe_get_place);

  $query_list="SELECT * FROM `rhc_master_indent` WHERE `indent_place_raised_to`='$place_id' and `indent_id`='$indent_id' AND `status`='1'";
  $sql_exe_list=mysqli_query($conn,$query_list);

  if($num_rows==0){
    $msg->success('Receipt is Already Confirmation Submited  Success-fully');      
    header('Location:admin_dashboard.php');
    exit;
  }
  $date=date('d-m-Y');
  $time=date('h:i:s a');
  $date1=date('Y-m-d');
  $time1=date('H:i:s');
  $result_list=mysqli_fetch_assoc($sql_exe_list);
  $block_id=$result_fetch_challen['receiver_place_id'];
  $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
  $sql_exec_block=mysqli_query($conn,$get_block);
  $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);  

                
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receipt Details Of Commodities
        <mdall></mdall>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Receive </a></li>
        <li class="active"><a href="#">Receipt Details Of Commodities</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    <div class="row">
    <div class="col-md-12">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Receipt Confirmation  </strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" action="admin_received_issue_challan_save.php" method="POST" >
        <div  id="printarea">
      <div id="section-to-print">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Date :</label>                 
                    <?=$date;?>  
                  <input type="hidden" class="form-control" name="date" value="<?=$date?>" > 
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                
                <?=$time?>
                <input type="hidden" class="form-control" name="time" value="<?=$time?>"> 
              </div> 
              </div> 
              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Challan No :</label>
                 <?=$challen?>
                 <input type="hidden" name="challen_no" value="<?=$challen?>">
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div>  
              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Indent No :</label>
                  <?=$indent_id;?>
                <input type="hidden" class="form-control" name="indent_id" value="<?=$indent_id;?>">
              </div>
              </div> 
              
              
              <div class="col-md-6">
               <div class="form-group">
                <label for="email">Issue Location :</label>
                <input type="hidden" name="issuer_id" id="issuer_id" value="BR">
                BIHAR[BR]
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
          
              <div class="col-md-6">      
              <div class="form-group">
                <label for="email">Received Location  :</label>
                <input type="hidden" name="receiver_id" value="<?=$place_id?>">
                <?=$get_place_fetch_detail['district_name']?>[<?=$place_id?>]
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
           </div>
    
              <table id="myTable" class="table table-striped text-center" align="center" border="1" width="100%">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Qty Indented</th>
                 <th>Qty Issued</th>
                <th>Batch Details</th>
              </tr>
              </thead>
              <tbody align="center">
                  <?php 
                  $x=1;
                 $query_list_item="SELECT * FROM `rhc_master_district_item_details_challan_no` WHERE `challan_no`='$challen' and `status`='0' or `status`='2' ";
                $sql_exe_list_item=mysqli_query($conn,$query_list_item);

                while ($res_item=mysqli_fetch_assoc($sql_exe_list_item)) {?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$res_item['item_code']?>
                      <input type="hidden" name="item_code[]" id="item_code<?=$x?>" value="<?=$res_item['item_code']?>">
                    </td>
                    <td><?=$res_item['item_type']?>
                      <input type="hidden" name="Item_type[]" id="Item_type<?=$x?>" value="<?=$res_item['item_type']?>">
                    </td>
                    <td><?=$res_item['quantity_indent']?>
                      <input type="hidden" name="item_quantity[]" id="item_quantity<?=$x?>" value="<?=$res_item['quantity_indent']?>">
                    </td>
                    <td>
                      <?=$res_item['quantity_issued']?>
                    <input type="hidden" name="item_quantity_issue[]" id="item_quantity<?=$x?>" value="<?=$res_item['quantity_issued']?>">
                    <input type="hidden" name="quantity_received[]" id="quantity_received<?=$x?>" value="<?=$res_item['quantity_issued']?>">
                    </td>
                    <td>
                      <table class="table table-striped" border="1" width="100%">
                        <thead>
                          <tr>
                            <th>Batch No</th>
                            <th>Qty</th>
                            <th>Date Exp</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $item_batch_id=$res_item['item_batch_id'];
                          $query_batch_details="SELECT * FROM `rhc_master_district_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_id'";

                          $sql_exe_batch_deatils=mysqli_query($conn,$query_batch_details);
                          $num_rows_batch=mysqli_num_rows($sql_exe_batch_deatils);
                          if($num_rows_batch!=0){
                            while ($result_batch=mysqli_fetch_assoc($sql_exe_batch_deatils)) {?>
                            <tr>
                             <input type="hidden" name="item_code_batch[]" id="item_code_batch<?=$x?>" value="<?=$res_item['item_code']?>">
                             <input type="hidden" name="Item_type_batch[]" id="Item_type_batch<?=$x?>" value="<?=$res_item['item_type']?>">
                              <td><?=$result_batch['batch_no']?>
                                 <input type="hidden" name="batch_no[]" id="batch_no<?=$x?>" value="<?=$result_batch['batch_no']?>">
                              </td>
                              <td><?=$result_batch['batch_quantity']?>
                                <input type="hidden" name="batch_quantity[]" id="batch_quantity<?=$x?>" value="<?=$result_batch['batch_quantity']?>">
                              </td>
                              <td><?=$result_batch['date_expire']?>
                                <input type="hidden" name="date_expire[]" id="date_expire<?=$x?>" value="<?=$result_batch['date_expire']?>">
                              </td>

                            </tr>
                          <?php }

                          }else{ ?>
                          <tr>
                              <td>N/A</td>
                              <td>N/A</td>
                              <td>N/A</td>

                            </tr>

                          <?php }
                          ?>
                        </tbody>
                      </table>
                   
                    </td>
                </tr>
                <?php $x++ ; }?>
              </tbody>
            </table>
            

        </div>
        </div>                   
            <a href="admin_received_issue.php"  class="btn btn-default">Back</a>
            <!-- <input type="button" class="btn-primary pull-right" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/>  -->
           <button type="submit" class="btn btn-default pull-right">Confirm</button>
          </form>
        </div>
      </div>
      </div>
      </div>
<!--       <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center" style="background-color: palevioletred;"><strong>Item Batch Details</strong></div>
          <div class="panel-body">
            <table class="table table-striped" >
              <tr>
                <th>Item Code</th>
                <th>Type</th>
                <th>Batch No</th>
                <th>Qty</th>
                <th>Date Of Exp.</th>
              </tr>
              <tbody id="details">
                
              </tbody>

            </table>
          </div>
        </div>

      </div> -->
    <!-- </div> -->
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
//   $(document).on("keypress", "form", function(event) { 
//     return event.keyCode != 13;
// });
</script> 
<script type="text/javascript">
function get_batch(id) {
  var itemcodes=$('#item_code'+id).val();
  var itemtypes=$('#Item_type'+id).val();
  var place_ids=$('#issuer_id').val();
  // var item_quantity=$('#item_quantity'+id).val();
   var item_quantity=document.getElementById("item_quantity"+id).value;
  var qnt_issue=document.getElementById("qnt_issue"+id).value;
  // var qnt_issue=$('#qnt_issue'+id).val();
  // alert((parseInt(qnt_issue)>parseInt(item_quantity)));
  if(qnt_issue!=""){
    if(parseInt(qnt_issue)>parseInt(item_quantity)){
      
      document.getElementById("error"+id).innerHTML = "Please Insert a value less  Than or equalto ("+item_quantity+")";
    }else{
       document.getElementById("error"+id).innerHTML = "";
       $.ajax({
                type:'POST',
                url:'admin_get_item_batch_details_district.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_id:place_ids,qnt_issue:qnt_issue},
                success:function(html){  
                  if(html){
                  $('#details').html(html);
                  get_quantity(id)
                  // alert(md);
                 
                   }
                    // if(html){
                    //     document.getElementById("myerror"+id).innerHTML = "";
                    //     return false;
                    //     // $("#reli").submit(); 
                    // }else{
                    //     document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                    //     return false;
                    // }
                }
            });
   
     
    }
  }else{
     document.getElementById("error"+id).innerHTML = "It should not left Blank ";
  }
}
function get_quantity(id) {
   var itemcodes=$('#item_code'+id).val();
  var itemtypes=$('#Item_type'+id).val();
  var place_ids=$('#issuer_id').val();
  var item_quantitys=$('#item_quantity'+id).val();
  var qnt_issues=$('#qnt_issue'+id).val();
  // alert(qnt_issue);
  if(qnt_issues!=""){
    if(parseInt(item_quantitys)>=parseInt(qnt_issues)){
      document.getElementById("error"+id).innerHTML = "";
       $.ajax({
                type:'POST',
                url:'admin_get_item_batch_details_districts.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_id:place_ids,qnt_issue:qnt_issues},
                success:function(html){  
                  if(html){
                  // $('#details').html(html);
                  $('#qnt_issue'+id).val(html);
                  // alert(md);
                 
                   }
                   
                }
            });
        }else{
      document.getElementById("error"+id).innerHTML = "Please Insert a value less  Than or equalto ("+item_quantity+")";
     
    }
  }else{
     document.getElementById("error"+id).innerHTML = "It should not left Blank ";
  }
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

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=550,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::<?=date('d-m-y').'-'.$$result_candidate_personal[name]?>::</title><link rel="stylesheet" type="text/css" href="assert_FRONT/print.css" /><link href="assert_FRONT/dist/css/bootstrap.min.css" rel="stylesheet" /></head><body onload="window.print()">')

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