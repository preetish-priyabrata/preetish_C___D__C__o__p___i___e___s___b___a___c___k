<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
$indent_id=$_REQUEST['indent_id'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $query_list="SELECT * FROM `rhc_master_indent` WHERE `indent_place_raised_to`='$place_id' and 'indent_id'='$indent_id' AND `status`='1'";
  $sql_exe_list=mysqli_query($conn,$query_list);
  $num_rows=mysqli_num_rows($sql_exe_list);
  if($num_rows==0){
    header('Location:admin_dashboard.php');
    exit;
  }
  $result_list=mysqli_fetch_assoc($sql_exe_list);
  $block_id=$result_list['indent_place_raised_by'];
  $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
  $sql_exec_block=mysqli_query($conn,$get_block);
  $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                      
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Issue Of Commodities
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Indent</a></li>
        <li class="active"><a href="#">Raise Indent</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
    <div class="row">
    <div class="col-sm-7">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Fill Issue Form</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline">
            <div class="col-sm12">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Date :</label>                 
                    <?=date('d-m-Y',strtotime(trim($result_list['date_creation'])));?>  
                  <!-- <input type="email" class="form-control" id="email"> -->
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <!-- <input type="password" class="form-control" id="pwd"> -->
                <?=date('h:i:s a',strtotime(trim($result_list['time_creation'])));?>  
              </div> 
              </div> 
              <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Challan No :</label>
                 XXXXXXX
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div>  
              <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Indent No :</label>
                  <?=$result_list['indent_id'];?>
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div> 
              
              <div class="col-sm-6">      
              <div class="form-group">
                <label for="email">Indent Location :</label>
                <?php  echo strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-sm-6">
               <div class="form-group">
                <label for="email">Issue Location :</label>
                abc
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
            </div>
              
 
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Qty Indented</th>
                 <th>Qty to Be Issued</th>
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody>
                <tr>
                    <td>
                       <!--  <input type="text" id="txtName1" /> -->
                       1
                    </td>
                    <td>
                    cc
                        <!-- <input type="text" onkeyup="get_item(1)" id="itemcode1" name="item_code[]" required="" /> -->
                    </td>
                     <td>
                     F 
                        <!-- <input type="text" onkeyup="get_item(1)" id="itemcode1" name="item_code[]" required="" /> -->
                    </td>
                    <td>
                    200
                        <!-- <select onchange="get_details(1)" id="itemtype1" name="item_type[]" required=""></select> -->
                    </td>
                    <td>
                        <input type="text" id="text_quantity1" name="item_quantity[]" required=""  value="200" />
                    </td>
                    <!-- <td></td> -->
                    <!-- <td id="btnAdd" class="button-add">Add</td> -->
                </tr>
                 <tr>
                    <td>
                       <!--  <input type="text" id="txtName1" /> -->
                       2
                    </td>
                     <td>
                    iucd
                        <!-- <input type="text" onkeyup="get_item(1)" id="itemcode1" name="item_code[]" required="" /> -->
                    </td>
                     <td>
                      P
                        <!-- <input type="text" onkeyup="get_item(1)" id="itemcode1" name="item_code[]" required="" /> -->
                    </td>
                    <td>
                    150
                        <!-- <select onchange="get_details(1)" id="itemtype1" name="item_type[]" required=""></select> -->
                    </td>
                    <td>
                        <input type="text" id="text_quantity1" name="item_quantity[]" required=""  value="150" />
                    </td>
                    <!-- <td></td> -->
                    <!-- <td id="btnAdd" class="button-add">Add</td> -->
                </tr>

              </tbody>
            </table>
            <a href="admin_receive_indent.php"  class="btn btn-default">Back</a> 
           <button type="submit" class="btn btn-default pull-right">Submit</button>

                           
            
          </form>
        </div>
      </div>
      </div>
      </div>
      <div class="col-sm-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center" style="background-color: palevioletred;"><strong>Item Batch Details</strong></div>
          <div class="panel-body">
            <table class="table table-striped">
              <tr>
                <th>Batch No</th>
                <th>Qty</th>
                <th>Date Of Exp.</th>
              </tr>
              <tbody>
                
              </tbody>

            </table>
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
//   function deleteRow(row)
// {
//     var i=row.parentNode.parentNode.rowIndex;
//     document.getElementById('POITable').deleteRow(i);
// }


// function insRow()
// {
//     console.log( 'hi');
//     var x=document.getElementById('POITable');
//     var new_row = x.rows[1].cloneNode(true);
//     var len = x.rows.length;
//     new_row.cells[0].innerHTML = len;
    
//     var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
//     inp1.id += len;
//     inp1.value = '';
//     var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
//     inp2.id += len;
//     inp2.value = '';
//     var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
//     inp3.id += len;
//     inp3.value = '';
//     x.appendChild( new_row );
// }
var ctr = 1;
$('#myTable').on('click', '.button-add', function () {
    ctr++;
    var itemcodes = "itemcode" + ctr;
    var itemtypes = "itemtype" + ctr;
    var text_quantitys = "text_quantity" + ctr;
    var txtOccupation = "txtOccupation" + ctr;
    var newTr = '<tr><td>'+ctr+'</td><td><input required onkeyup="get_item('+ctr+')" type="text"  name="item_code[]" id=' + itemcodes + ' /></td><td><select required onchange="get_details('+ctr+')" id='+itemtypes+' name="item_type[]" required=""></select></td><td><input type="text" id=' + text_quantitys + ' name="item_quantity[]" required/></td><td></td></tr>';
    $('#myTable').append(newTr);
});
function get_item(id){
var ids=id;
  alert(ids);
}
function get_details(id) {
  var idsd=id;
  alert(idsd);
}
</script>
