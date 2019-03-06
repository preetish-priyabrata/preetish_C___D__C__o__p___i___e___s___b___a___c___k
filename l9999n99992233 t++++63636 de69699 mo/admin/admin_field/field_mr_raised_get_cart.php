<?php
session_start();
if($_SESSION['admin_field']){
require '../config.php';


	if(!empty($_POST["action"])) {
	switch($_POST["action"]) {
		case "add":
			if(!empty($_POST["code"])) {
				$code=trim($_POST['code']);
				$productByCode ="SELECT * FROM `lt_master_item_detail` WHERE `status`='1' and `item_second_code`='$code'";

				$sql_exe1=mysqli_query($conn,$productByCode);
				$result1_new=mysqli_fetch_assoc($sql_exe1);
					$item_second_code=$result1_new['item_second_code'];
					$item_primary_code=$result1_new['item_primary_code'];
					$it_de_unit_m=$result1_new['it_de_unit_m'];
					$item_name=$result1_new['item_name'];
					$ITEM_MASTER_SERIAL=$result1_new['slno'];


#####################################################################################################
					$item_category_id=$result1_new['item_category_id'];
					$query_view_category = "SELECT  * FROM `lt_master_item_category` where `status`='1' and `slno`='$item_category_id' ";
					$exe_view_category = mysqli_query($conn,$query_view_category);
					$rec_category = mysqli_fetch_assoc($exe_view_category);
					$category_name=$rec_category['category_name'];
###################################################################################################
				$itemArray=array($result1_new['item_second_code']=>array('item_second_code'=>$item_second_code,'item_primary_code'=>$item_primary_code,'it_de_unit_m'=>$it_de_unit_m,'item_name'=>$item_name,'ITEM_MASTER_SERIAL'=>$ITEM_MASTER_SERIAL,'item_category_id'=>$item_category_id,'category_name'=>$category_name));
				// print_r($itemArray);


	    	 	
				
				
				if(!empty($_SESSION["Field_cart_item"])) {
					if(in_array($result1_new['item_second_code'],$_SESSION["Field_cart_item"])) {
						
					} else {
						$_SESSION["Field_cart_item"] = array_merge($_SESSION["Field_cart_item"],$itemArray);
					}
				} else {
					$_SESSION["Field_cart_item"] = $itemArray;
				}
			}
		break;
		case "remove":
		
			if(!empty($_SESSION["Field_cart_item"])) {
				
				foreach($_SESSION["Field_cart_item"] as $k => $v) {
					
					if(in_array($_POST["code"],$_SESSION["Field_cart_item"][$k])) {
						unset($_SESSION["Field_cart_item"][$k]);
					}						
				}
			}
		break;
		case "empty":
			unset($_SESSION["Field_cart_item"]);
		break;		
	}
	}
?>

<table id="example771" class="display nowrap table " width="100%" cellspacing="0">
	 <thead>
	    <tr>
	        <th>Sl.No</th>			 
	        <th>Secondary Code</th>
	        <th>Component Name</th>
	        <th>Component Category </th>
	        <th>Machine No</th>
	      	<th>Action</th>
	        
	        
	    </tr>
	 </thead>
	<tfoot>
		<tr>
			<th>Sl.No</th>			   
	        <th>Secondary Code</th>
	        <th>Component Name</th>
	        <th>Component Category </th>
	        <th>Maintenance Category</th>
	        <th>Action</th>
	        
	       
		</tr>
		 </tfoot>
	<tbody >
					        					<?php
	$zonal_place=$_SESSION['zonal_place'];
	$y=0;
	if(isset($_SESSION["Field_cart_item"])){
	    foreach ($_SESSION["Field_cart_item"] as $item){
	    	$ids=$item['ITEM_MASTER_SERIAL'];
			$custom_query="SELECT * FROM `lt_master_model_item_detail` JOIN `lt_master_machine__transfer_information` ON `lt_master_model_item_detail`.`i_model_id`=`lt_master_machine__transfer_information`.`model_id` WHERE`lt_master_machine__transfer_information`.`t_status`='1' AND `lt_master_model_item_detail`.`i_item_slno`='$ids' and `lt_master_machine__transfer_information`.`t_store_site_location`='$zonal_place' ";
			$sql_exe_detail=mysqli_query($conn,$custom_query);	
			$y++;

	?>
					<tr>
						<td><?=$y?></td>
					<td><strong><?php echo $item["item_second_code"]; ?></strong>
						<input type="hidden" name="secondary_details[]" class="secondary_details" value="<?=$item['item_second_code']?>">
						<input type="hidden" name="primary_details[]" value="<?=$item['item_primary_code']?>">
						<input type="hidden" name="item_name[]" value="<?=$item['item_name']?>">
						<input type="hidden" name="unit_details[]" value="<?=$item['it_de_unit_m']?>">
						 <input type="hidden" name="category_name[]" value="<?=$item['category_name']?>">
						<input type="hidden" name="category_name_id[]" value="<?=$item['item_category_id']?>">
					</td>
					<td><?php echo $item["item_name"]; ?></td>
					<td><?php echo $item["category_name"]; ?></td>					
					<td>
						<select name="maintenance_id[]" required="">
				    		<option value="">--Select Catrgory--</option>
				    		<option value="scheduled">Scheduled</option>
				    		<option value="predictive">Predictive</option>
				    		<option value="immediate">Immediate</option>
				    	</select>
					</td>
					<td><a onClick="cartAction('remove','<?php echo $item["item_second_code"]; ?>')" class="btnRemoveAction cart-action">Remove Item</a></td>
					</tr>
					<?php
	    }
	    ?>
	     </tbody>
				    						</table>
	    <?php
	}

}else{

}
?>
<script type="text/javascript">
$(document).ready(function() {
  
    $('#example771 tfoot th').not(":eq(0),:eq(4)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example771').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4 ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>