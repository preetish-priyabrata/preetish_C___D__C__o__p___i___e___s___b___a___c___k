<?php 


error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){
// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id']) && !empty($_POST['district_id'])  && !empty($_POST['block_dh_uphc']) && !empty($_POST['phc_ids'])  ){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$block_dh_uphc=trim($_POST['block_dh_uphc']);
  $phc_ids=trim($_POST['phc_ids']);
	?>
  <span id="hsc"></span>
	<div class="row" id="remove_display2">
        <div class="col-md-3 text-right">
            <label>HSC</label>
        </div>
        <div class="col-md-1">:</div>
        <div class="col-md-8">
	
    	
			<select   name="hsc_id" id="hsc_id" >
		           <option value="">-- Select-- </option>   
	        	<?php 
	        	$query_phc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_dh_uphc' and `place_phc_id`='$phc_ids'";
				$sql_exe_phc=mysqli_query($conn,$query_phc);
				$num_phc=mysqli_num_rows($sql_exe_phc); 
	        	if($num_phc!=0){
              while ($res_hsc=mysqli_fetch_assoc($sql_exe_phc)) {
              
	        		?>
	        		<option value="<?=$res_hsc['place_phc_sub_id']?>"><?=$res_hsc['phc_sub_center_name']?>[<?=$res_hsc['place_phc_sub_id']?>]</option>
	        	<?php
              }
	        	}
	        	

	?>
			</select>
                    
    	</div>
   	</div>

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
	