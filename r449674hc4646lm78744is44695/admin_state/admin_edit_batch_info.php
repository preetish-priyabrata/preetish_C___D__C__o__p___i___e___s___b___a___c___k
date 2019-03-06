<?php 
session_start();
if($_SESSION['admin_emails']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	// print_r($_REQUEST);
// Array ( [challan_no] => 1234 [slno] => 3 ) 
// 
// 
 	$challan_no=$_REQUEST['challan_no'];
 	$slno=$_REQUEST['slno'];
 	$query_item_batch="SELECT * FROM `rhc_master_state_stock_level` WHERE `challan_no`='$challan_no' and `slno`='$slno'";
 	$sql_item_batch=mysqli_query($conn,$query_item_batch);
 	$result_item_batch=mysqli_fetch_assoc($sql_item_batch);

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Stock Detail Edit
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock</a></li>
        <li class="active"><a href="#">Edit Stock </a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="box box-info">
      			<!-- end message displayed -->
      				<div class="panel panel-default">
        				<div class="panel-heading text-center" style="background-color: lightpink;"><strong>Edit Stock Information</strong></div>
        				<div class="demo">
          					<div class="panel-body">
	          					<form class="form-inline" id="stock_add" action="admin_stock_edit_batch.php"  method="POST">
	          						<table class="table ">
						                <tr>                 
						                  <th>Batch No</th>
						                  <th>Batch Quantity</th>
						                  <th>Expire</th>
						                  <th>Action</th>
						                </tr>
						              <tr>             
						                <td>
						                 <input type="text" autocomplete="off" class="form-control"  name="batch_no" id="batch_no" value="<?=$result_item_batch['batch_no']?>">
						                </td>
						                <td>
						                  <input type="text" autocomplete="off" class="form-control" name="quanity" value="<?=$result_item_batch['batch_quantity']?>" >
						                  <input type="hidden" autocomplete="off" class="form-control" name="quanity_OLD" value="<?=$result_item_batch['batch_quantity']?>" >
						                </td>
						                <td>
						                  <input type="text" autocomplete="off" class="form-control" name="expire" id="expire" value="<?=$result_item_batch['expire']?>">
						                </td>
						                <td>
						                  <select name="detail_stock" class="form-control" >
						                  	<option value="1">Deduction</option>
						                  	<option value="2">Increment</option>
						                  </select>
						                </td>
						              </tr>
						            </table>
						            <input type="hidden" name="challan_no" value="<?=$challan_no?>">
						             <input type="hidden" name="slno" value="<?=$slno?>">
						            
						            <div class="form-group">
									    <div class="col-sm-offset-10 col-sm-2 pull-right">
									    <a class="btn btn-default" href="admin_view_not_conform_information.php?challan_no=<?=$challan_no?>">cancel</a>
									      <button type="submit" class="btn btn-default">Submit</button>
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

</div>

<?php

}else{
	header('Location:logout.php');
  	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';
?>
 <script>
  $( function() {
    $( "#expire" ).datepicker();
    $( "#expire1" ).datepicker();
    $( "#expire2" ).datepicker();
    $( "#expire3" ).datepicker();
  } );
  </script>