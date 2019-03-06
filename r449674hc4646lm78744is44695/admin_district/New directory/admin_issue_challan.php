<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receive Of Commodities
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
    <div class="col-sm-12">
      <!-- end message displayed -->
       <div class="box box-info">
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Challan Details</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline">
            <div class="col-sm12">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Date :</label>
                  <?=date('Y-m-d')?>     
                  <!-- <input type="email" class="form-control" id="email"> -->
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <!-- <input type="password" class="form-control" id="pwd"> -->
                <?=date('H:i:s')?>
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
                 Indent Id
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div> 
              
              <div class="col-sm-6">      
              <div class="form-group">
                <label for="email">Issue Location :</label>
               
                xyz
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-sm-6">
               <div class="form-group">
                <label for="email">Received Location :</label>
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
                 <th>Qty Issued</th>
                <th >Batch Details</th>
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
                    200
                        <!-- <input type="text" id="text_quantity1" name="item_quantity[]" required=""  value="200" /> -->
                    </td>
                    <td>
                      <table  class="table">
                        <thead>
                          <tr>
                            <th>Batch No</th>
                            <th>Qty</th>
                            <th>Date Exp.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>b12</td>
                            <td>50</td>
                            <td>20-05-16</td>
                          </tr>
                          <tr>
                            <td>b13</td>
                            <td>50</td>
                            <td>20-07-16</td>
                          </tr>
                          <tr>
                            <td>b14</td>
                            <td>50</td>
                            <td>20-08-16</td>
                          </tr>
                          <tr>
                            <td>b15</td>
                            <td>50</td>
                            <td>20-10-16</td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
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
                    150
                        <!-- <input type="text" id="text_quantity1" name="item_quantity[]" required=""  value="150" /> -->
                    </td>
                    <td>
                      <table  class="table">
                        <thead>
                          <tr>
                            <th>Batch No</th>
                            <th>Qty</th>
                            <th>Date Exp.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>C12</td>
                            <td>50</td>
                            <td>20-05-16</td>
                          </tr>
                          <tr>
                            <td>C13</td>
                            <td>100</td>
                            <td>20-07-16</td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </td>
                    <!-- <td id="btnAdd" class="button-add">Add</td> -->
                </tr>

              </tbody>
            </table>
            <div class="row">
            <div class="col-sm-12">
             <div class="text-left">
               <a href="admin_received_issue.php"  class="btn btn-default">Back</a>             
            </div>
            <div class="text-right">
               <a href=""  class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-success">Confirm</button>
            </div>
            </div>
            </div>
          </form>
        </div>
      </div>
      </div>
      </div>
      </div>
      <!-- <div class="col-sm-5">
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

      </div> -->
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
