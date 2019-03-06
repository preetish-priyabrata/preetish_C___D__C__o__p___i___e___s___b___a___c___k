<?php 
include 'config.php';
// itemcodes	
// ocp
// itemtypes	
// p
// place_id	
// Pat
// place_status	
// 2
if($_POST['place_status']!="" && $_POST['place_id']!="" && $_POST['itemtypes']!="" && $_POST['itemcodes']!="" && $_POST['ids']!=""){

// }else{
$place_status=$_POST['place_status'];
	if($place_status==2){
		//District Table database
		$item_type=$_POST['itemtypes'];
		$item_code=$_POST['itemcodes'];
		$place_id= $_POST['place_id'];
		$ids=$_POST['ids'];
		$query_table_place="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_id'";
		$sql_exe_place=mysqli_query($conn,$query_table_place);
		$get_result_place=mysqli_fetch_assoc($sql_exe_place);
		// tota; indent value
		$total_Indent_Quantity =$get_result_place['total_indent_qty'];

		echo $query_table_received="SELECT SUM(`quantity_received`) FROM `rhc_master_itemdetails_challan_no` WHERE `item_code`='$item_code' and `item_type`='$item_type' and `status`='1' And `receiver_place_id`='$place_id' ";
		$sql_exe_received=mysqli_query($conn,$query_table_received);
		$num_received=mysqli_num_rows($sql_exe_received);
		$get_result_received=mysqli_fetch_array($sql_exe_received);
		// print_r($get_result_received);
		if($$get_result_received['0']==0){
			$total_received="0";
		}else{
			$total_received=$get_result_received['0'];
		}
		$avaliable_quantity=$total_Indent_Quantity-$total_received;
		// if($total_received<=0){

		// }else{

		// }
		?>
			<tr>
			<td>Item Code :</td>
                <td><?=$item_code?></td>                
              </tr>
              <tr>
                <td>Item Type :</td>
                <td><?=$item_type?></td>                
              </tr>
              <tr>
                <td>Total Indent Quantity :</td>
                <td><?=$total_Indent_Quantity?></td>                
              </tr>
              <tr>
                <td>Received Quantity</td>
                <td><?=$total_received?></td>                
              </tr>
              <tr>
                <td>Available Indent Quantity</td>
                <td><?=$avaliable_quantity?></td>                
              </tr>
              <tr>
                <td>Indent Upper Limit Quantity</td>
                <td class="user_click"><?=$avaliable_quantity?>
                	<input type="hidden" id="vard" value="<?=$avaliable_quantity?>">
                </td>
                </tr>
			<?php

	}else if($place_status==3){
		// block table database
		// 
		$item_type=$_POST['itemtypes'];
		$item_code=$_POST['itemcodes'];
		$place_id= $_POST['place_id'];
		$ids=$_POST['ids'];
		 $query_table_place="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code'and`item_type`='$item_type' ";
		$sql_exe_place=mysqli_query($conn,$query_table_place);
		$get_result_place=mysqli_fetch_assoc($sql_exe_place);
		// tota; indent value
		 $total_Indent_Quantity =$get_result_place['quantity'];

		$query_table_received="SELECT SUM(`quantity_received`) FROM `rhc_master_itemdetails_challan_no` WHERE `item_code`='$item_code' and `item_type`='$item_type' and `status`='1' And `receiver_place_id`='$place_id'  ";
		$sql_exe_received=mysqli_query($conn,$query_table_received);
		  $num_received=mysqli_num_rows($sql_exe_received);
		$get_result_received=mysqli_fetch_array($sql_exe_received);
		
		if($get_result_received['0']==0){
			$total_received="0";
		}else{
			$total_received=$get_result_received['0'];
		}
		$avaliable_quantity=$total_Indent_Quantity-$total_received;
		if(0<$avaliable_quantity){
			$avaliable_quantity=$avaliable_quantity;
		}else{
			$avaliable_quantity="0";
		}
		echo $avaliable_quantity;	
		exit;
		

	}else if($place_status==4){
		// district hospital database

	}else if($place_status==5){
		// phc database

	}else if($place_status==6){
		//aphc database

	}else{

	}
}
?>