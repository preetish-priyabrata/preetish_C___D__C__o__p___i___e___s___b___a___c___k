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
        Received Indent List
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
    <div class="col-sm-11">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of Indent Received</strong></div>
        <div class="demo">
          <div class="panel-body">
          <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                          <th>Serial Nos </th>
                        <th>Challan No</th>
                        <!-- <th>Indent Id</th> -->
                        <th>Date</th>
                        <th>Time</th>
                        <!-- <th>Action</th> -->

                      </tr>
                    </thead>
                    <tbody> 
                    <tr><td>1</td>
                        <!-- <td>Place1</td> -->
                        <td><a href="admin_issue_challan.php">Challanid</a></td>
                        <td>20-02-2017</td>
                        <td>11:30 am</td>
                        <!-- <td><a href="admin_issue_indent.php" class="btn btn-info" role="button">Issue</a></td> -->
                    </tr>
                    
                    </tbody>
              </table>
        </div>
        <div class="row">
            <div class="col-sm-12">
             <div class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
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
