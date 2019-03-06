<?php 

// print_r($_POST);
// Array ( [state_id] => BR [district_id] => Gop [search_table] => 1 ) 
// <?php
// print_r($_POST);
error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){
// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id']) && !empty($_POST['district_id']) ){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$search_table=trim($_POST['search_table']);
	?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="uphc">Uphc:</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center"  name="uphc" id="uphc" >
        	                  
		        	<?php 
		        	$query_district_host="SELECT * FROM `rhc_master_place_uphc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id'";
		        	$sql_exe_district_host=mysqli_query($conn,$query_district_host);
		        	$num_hos=mysqli_num_rows($sql_exe_district_host);
		        	if($num_hos!=0){
		        		?>
		        		<option value="">-- Select UPHC-- </option> 
		        		<?php
		        		while ($res_dist_host=mysqli_fetch_assoc($sql_exe_district_host)) {?>
		        			<option value="<?=$res_dist_host['place_uphc_id']?>"> <?=$res_dist_host['uphc_name']?> [<?=$res_dist_host['place_uphc_id']?>]</option> 
		        		<?php }
		        	}else{
		        		?>
		        			<option value="">-- No UPHC Present In District Please Contact Admin -- </option>  
		        	<?php
		        	}?>
        		</select>
                    
    		</div>
   		 </div>
   		   <div class="form-group" id="hidde_block_center">
    	<label class="control-label col-sm-2" for="district_id">Indent Raised To :</label>
     		<div class="col-sm-6">
     			<label class="radio-inline" id="hidde_phc"><input type="radio" name="sub_center_dis_hos"  value="11" required="" >District</label>
				<label class="radio-inline" id="hidde_aphc"><input type="radio" name="sub_center_dis_hos" value="12" required="">UPHC</label>
     		</div>
    </div> 
	

	<?php 
}

}else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	
   