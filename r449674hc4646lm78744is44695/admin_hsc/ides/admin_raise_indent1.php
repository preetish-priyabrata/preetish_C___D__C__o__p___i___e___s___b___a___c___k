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
        Indent Raise Form
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
    <div class="col-sm-8">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading">Fill Indent Form</div>
        <div class="demo">
          <div class="panel-body">
            <div id="POItablediv">
    <!-- <input type="button" id="addPOIbutton" value="Add POIs"/><br/><br/> -->
              <table  id="POITable" border="1">
                  <tr>
                      <td>Slno</td>
                      <td>Item Code</td>
                      <td>Type</td>
                      <td>Quantity</td>
                      <td><input type="button" id="addmorePOIbutton" value="Add New Item" onclick="insRow()"/></td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td><input  type="text" id="code1" name="code1[]"/></td>
                      <td><input  type="text" id="type1"  name="type1[]"/></td>
                      <td><input  type="text" id="Quantity1" name="Quantity1[]" /></td>
                      <td></td>
                  </tr>
              </table>
            </div>
        </div>
      </div>
      </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">Item Details</div>
          <div class="panel-body">
            <table class="table table-striped">
              <tr>
                <td>Item Code :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Item Type :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Total Indent Quantity :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Received Quantity</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Available Indent Quantity</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Indent Upper Limit Quantity</td>
                <td>0</td>                
              </tr>
            </table>
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
  function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('POITable').deleteRow(i);
}


function insRow()
{
    console.log( 'hi');
    var x=document.getElementById('POITable');
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    new_row.cells[0].innerHTML = len;
    
    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id += len;
    inp1.value = '';
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id += len;
    inp2.value = '';
    var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
    inp3.id += len;
    inp3.value = '';
    x.appendChild( new_row );
}
</script>
