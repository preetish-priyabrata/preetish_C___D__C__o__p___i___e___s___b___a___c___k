<?php
// print_r($_POST);
// Array( [state_id] => BR  [district_id] => Pat    [search_table_block_phc_aphc] => 1    [block_ids] => PHUS    [phc_aphc_id] => PHC-PHUS)
// exit; 
error_reporting(E_ALL);
session_start();
include "config.php";

// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id']) && !empty($_POST['district_id']) && !empty($_POST['search_table_block_phc_aphc']) && !empty($_POST['block_ids']) && !empty($_POST['phc_aphc_id'])){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$block_ids=trim($_POST['block_ids']);
	$search_table_block_phc_aphc=trim($_POST['search_table_block_phc_aphc']);
	$phc_aphc_ids=$_POST['phc_aphc_id'];
	if($search_table_block_phc_aphc==1){ // phc
		?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="sub_phc_id">Sub Center PHC :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center"  name="sub_phc_id" id="sub_phc_id" >
        	                  
		        	<?php 
		        	$query_phc_sub="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_ids' AND `place_phc_id`='$phc_aphc_ids'";
		        	$sql_exe_phc_sub=mysqli_query($conn,$query_phc);
		        	$num_phc_sub=mysqli_num_rows($sql_exe_phc_sub);
		        	if($num_phc_sub!=0){
		        		?>
		        		<option value="">-- Select PHC SUB-CENTER-- </option> 
		        		<?php
		        		while ($res_phc_sub=mysqli_fetch_assoc($sql_exe_phc_sub)) {?>
		        			<option value="<?=$res_phc_sub['place_phc_sub_id']?>"> <?=$res_phc_sub[' 	phc_sub_center_name']?> [<?=$res_phc_sub['place_phc_sub_id']?>]</option> 
		        		<?php }
		        	}else{
		        		?>
		        			<option value="">-- No PHC SUb Center  Present In This Block-- </option>  
		        	<?php
		        	}?>
        		</select>
                    
    		</div>
   		 </div>

	<?php }else if($search_table_block_phc_aphc==2){ //aphc

		?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="sub_APHC_id">Sub Center APHC :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center"  name="sub_APHC_id" id="sub_APHC_id" >
        	                  
		        	<?php 
		        	$query_aphc_sub="SELECT * FROM `rhc_master_place_aphc_sub_center` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_ids' AND `place_aphc_id`='$phc_aphc_ids'";
		        	$sql_exe_aphc_sub=mysqli_query($conn,$query_aphc_sub);
		        	$num_aphc_sub=mysqli_num_rows($sql_exe_aphc_sub);
		        	if($num_aphc_sub!=0){
		        		?>
		        		<option value="">-- Select APHC -- </option> 
		        		<?php
		        		while ($res_aphc_sub=mysqli_fetch_assoc($sql_exe_aphc_sub)) {?>
		        			<option value="<?=$res_aphc_sub['place_aphc_sub_id']?>"> <?=$res_aphc_sub['aphc_sub_center_name']?> [<?=$res_aphc_sub['place_aphc_id']?>]</option> 
		        		<?php }
		        	}else{
		        		?>
		        			<option value="">-- No APHC Is Present In This Block-- </option>  
		        	<?php
		        	}?>
        		</select>
                    
    		</div>
   		 </div>
   		  <!--  <div class="form-group">
    	<label class="control-label col-sm-2" for="district_id">Health Facilities :</label>
     		<div class="col-sm-6">
     			<label class="radio-inline"><input type="radio" name="sub_center"  onclick="Check_sub_center(this);" value="1" >PHC</label>
				<label class="radio-inline"><input type="radio" name="sub_center" onclick="Check_sub_center(this);" value="2">APHC</label>
     		</div>
    </div> 
    <span id="phc_aphc_details"></span> -->
	<?php }else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	
   
    <?php
}
?>

