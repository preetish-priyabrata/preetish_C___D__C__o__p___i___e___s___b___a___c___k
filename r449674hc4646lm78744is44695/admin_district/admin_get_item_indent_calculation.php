<?php 
include 'config.php';


if($_POST['place_status']!="" && $_POST['place_id']!="" && $_POST['itemtypes']!="" && $_POST['itemcodes']!="" && $_POST['ids']!=""){
	$place_status=$_POST['place_status'];
	if($place_status==2){
		//District Table database
		$item_type=$_POST['itemtypes'];
		$item_code=$_POST['itemcodes'];
		$place_id= $_POST['place_id'];
		$ids=$_POST['ids'];
		$query_dates="SELECT * FROM `rhc_master_year_setting` WHERE `status`='1'";
		$sql_exe_dates=mysqli_query($conn,$query_dates);
		while ($result_dates=mysqli_fetch_assoc($sql_exe_dates)) {
			$starting_date=$result_dates['starting_date'];
			$ending_date=$result_dates['ending_date'];
		}

		 $query_table_place="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_id' AND `item_code`='$item_code'and`item_type`='$item_type' AND `place_status`='$place_status' ";
		$sql_exe_place=mysqli_query($conn,$query_table_place);
		$get_result_place=mysqli_fetch_assoc($sql_exe_place);
		// tota; indent value
		$num_rows_forcast=mysqli_num_rows($sql_exe_place);
		 if($num_rows_forcast!=0){
		 	$total_Indent_Quantity =$get_result_place['quantity'];
		 }else{
		 	$total_Indent_Quantity=0;
		 }

		  $query_table_received="SELECT SUM(`quantity_received`) FROM `rhc_master_district_item_details_challan_no` WHERE `item_code`='$item_code' and `item_type`='$item_type' and `status`='1' And `receiver_place_id`='$place_id' And `date_creation` Between '$starting_date' AND '$ending_date'";
		$sql_exe_received=mysqli_query($conn,$query_table_received);
		$num_received=mysqli_num_rows($sql_exe_received);
		$get_result_received=mysqli_fetch_array($sql_exe_received);
		// print_r($get_result_received);
		// // echo $get_result_received[0];
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
                <td>Total Quantity To Be Indented :</td>
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
	}else{
		header('Location:logout.php');
		exit;
	}
}else{
		header('Location:logout.php');
		exit;
	}
?>