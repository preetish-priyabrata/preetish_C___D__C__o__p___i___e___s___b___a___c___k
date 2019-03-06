<?php
session_start();
if($_SESSION['admin_emails']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// print_r($_REQUEST);
 	// exit;
 	$place_id_district=$_SESSION['place_id'];
//Array ( [slno] => 1 [batch_store_id] => stockPat3 [batch_no] => b4 ) 
// 
// 
//$challan_no=$_REQUEST['challan_no'];
$slno=$_REQUEST['slno'];
$batch_store_id=$_REQUEST['batch_store_id'];
$batch_no=$_REQUEST['batch_no'];
	//here we have get information of batch total stock and avaliable stock in particular 
	 $sql_query="SELECT * FROM `rhc_master_stock_aphc_batch_details` WHERE `slno`='$slno' and `batch_nos`='$batch_no'and `aphc_stock_batch_id`='$batch_store_id'";
	$sql_exe_batch=mysqli_query($conn,$sql_query);
	 $num=mysqli_num_rows($sql_exe_batch);
	
	// here it is check because avaliable or not
	if($num!=0){
		$fetch_data=mysqli_fetch_assoc($sql_exe_batch);
		$total=$fetch_data['total_quantity']; // total batch quantity
		$quantity=$fetch_data['remaining_quantity']; //quantity left to be issued
		//here state of particular commudity will have quantiy 
		$state_item="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `aphc_stock_batch_id`='$batch_store_id' and`aphc_place_id`='$place_id_district'";
		$sql_exe_state_item=mysqli_query($conn,$state_item);
		$num_state=mysqli_num_rows($sql_exe_state_item);
		// here it check particular commudity is avaliable or not
		if($num_state!=0){
			$fetch_state=mysqli_fetch_assoc($sql_exe_state_item);
			$total_item=$fetch_state['item_quantity'];

		}else{
			$msg->error('Unable to find Batch Information in our system');
			header('Location:admin_dashboard.php');
	  		exit;
		}

	}else{
		$msg->error('Unable to find Batch Information in our system');
		header('Location:admin_dashboard.php');
	  	exit;
	}
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
	          					<form class="form-inline" id="stock_add" action="admin_edit_batch_info_current_save.php"  method="POST">
	          						<table class="table ">
						                <tr>                 
						                  <th>Batch No</th>
						                  <th>Batch Quantity</th>
						                  <th>Remark</th>
						                  
						                </tr>
						              <tr>      
						              
						              <input type="hidden" name="slno" value="<?=$slno?>">    
						              <input type="hidden" name="batch_store_id" value="<?=$batch_store_id?>">    
						              <input type="hidden" name="batch_no" value="<?=$batch_no?>">    
						              <input type="hidden" name="total_item" value="<?=$total_item?>">    
						              <input type="hidden" name="total" value="<?=$total?>">          
						                <td>
						                 <input type="text" readonly autocomplete="off" class="form-control"  name="batch_no" id="batch_no" value="<?=$batch_no?>">
						                </td>
						                <td>
						                  <input type="text" autocomplete="off" class="form-control" name="quanity" value="<?=$quantity?>" id="quanity">
						                  <input type="hidden" autocomplete="off" class="form-control" name="quanity_OLD" value="<?=$quantity?>" id="quanity_OLD" >
						                  <span style="color: red" id="error"></span>
						                </td>
						                 <td>
						                  <input type="text" autocomplete="off" class="form-control" name="remark" id="remark">
						                  
						                </td>
						              </tr>
						            </table>
						            <input type="hidden" name="challan_no" value="<?=$challan_no?>">
						             <input type="hidden" name="slno" value="<?=$slno?>">
						            
						            <div class="form-group">
									    <div class="col-sm-offset-10 col-sm-2 pull-right">
									    <a class="btn btn-default" href="admin_avaliable_stock_view.php">cancel</a>
									      <button type="button" onclick="check_quantity()" class="btn btn-default">Submit</button>
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
 function check_quantity(){
 	var remark=$('#remark').val();
 	if(remark==""){
 		alert("Remark Field Should not Left Blank");
 		return false;
 	}else{
	 	var errors=0;
	 	var che_count=0;
	 	var qnt_issues=$('#quanity').val();
	         var qnt_issueds=$('#quanity_OLD').val();
	        if(qnt_issues!=""){
	          if (parseInt(qnt_issues) > 0){
	            if(parseInt(qnt_issues)>parseInt(qnt_issueds)){
	              document.getElementById("error").innerHTML = "Insert a value less than or equal to value of avaliable quantity ";
	            che_count++;
	            errors++;
	            }else{
	              document.getElementById("error").innerHTML = "";
	            } 
	          }else if(parseInt(qnt_issues)==0){
	            
	              document.getElementById("error").innerHTML = "";
	           }else{
	            document.getElementById("error").innerHTML = "Invalid Value";
	            che_count++;
	            errors++;
	        
	          }
	        }else{
	          document.getElementById("error").innerHTML = "This field can't Be Left Blank";
	          alert("This field can't Be Left Blank");
	        }

	        if(che_count==0 && errors==0){

	        $("#stock_add").submit(); 
	      }else{
	      alert("Form Can't Submitted some error");
	      return false;
	    }
	}
 }
  </script>