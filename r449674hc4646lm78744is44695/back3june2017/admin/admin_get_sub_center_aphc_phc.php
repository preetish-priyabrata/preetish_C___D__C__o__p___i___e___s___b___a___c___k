<?php
 // print_r($_POST);
// Array ( [state_id] => BR [district_id] => Pat [search_table_block_phc_aphc] => 1 [block_ids] => ATHM [phc_aphc_id] => PHC-ATHM )
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
	$phc_aphc_ids=$_POST['phc_aphc_id'];?>
	<div class="form-group" id="phc_subcenter1">
    	<label class="control-label col-sm-2" for="phc_subcenter1">Indent Level:</label>
     		<div class="col-sm-6">
     			<label class="radio-inline" id="hide_sub_phc2"><input type="radio" name="asha_level_anm_level" required="" value="1" >PHC </label>
				<label class="radio-inline" id="hide_sub_phc3"><input type="radio" name="asha_level_anm_level" required="" value="2">APHC </label>
				<label class="radio-inline" id="hide_sub_phc4"><input type="radio" name="asha_level_anm_level" required=""  value="3" >PHC Sub-Center</label>
				<label class="radio-inline" id="hide_sub_phc5"><input type="radio" name="asha_level_anm_level" required="" value="4">APHC Sub-Center</label>
				<label class="radio-inline" id="hide_sub_phc1"><input type="radio" name="asha_level_anm_level" required="" value="5" >None </label>
				
     		</div>
    </div> 
	<?php
	if($search_table_block_phc_aphc==1){ // phc

		?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="sub_phc_id">Sub Center PHC :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center"  name="sub_phc_id" id="sub_phc_id" >
        	                  
		        	<?php 
		        	 $query_phc_sub="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_ids' AND `place_phc_id`='$phc_aphc_ids'";
		        	$sql_exe_phc_sub=mysqli_query($conn,$query_phc_sub);
		        	$num_phc_sub=mysqli_num_rows($sql_exe_phc_sub);
		        	if($num_phc_sub!=0){
		        		?>
		        		<option value="">-- Select PHC SUB-CENTER-- </option> 
		        		<?php
		        		while ($res_phc_sub=mysqli_fetch_assoc($sql_exe_phc_sub)) {?>
		        			<option value="<?=$res_phc_sub['place_phc_sub_id']?>"> <?=$res_phc_sub['phc_sub_center_name']?> [<?=$res_phc_sub['place_phc_sub_id']?>]</option> 
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
   		   
    <span id="phc_aphc_details"></span>
	<?php }else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	
   
    <?php
}
?>
<script type="text/javascript">
$( document ).ready(function() {
	var block_status = $('[name="sub_center"]:checked').val();
	//alert(block_status);
	
	var Desigination_users = $('#Desigination_user').val();
	//alert(Desigination_users);
     if(Desigination_users=='1' && Desigination_users=='2' && Desigination_users=='3' && Desigination_users=='4' && Desigination_users=='5' && Desigination_users=='6' ){
     	$("#phc_subcenter1").hide();
       // $("#dist_hidden").show();
       //  $("#dist_hidden_cho").show();
       //   $("#dist_hidden_cho1").show();
       //    $("#user_pass_hiden").show();
        // $('input:radio[name="sub_center"][value="1"]').attr('checked', true);
        //   $("#hidde_aphc").hide();

        // get_block_dh();
    }else if(Desigination_users=='7' || Desigination_users=='8'){
    	 $("#phc_subcenter1").hide();
    	 // document.getElementsByTagName("asha_level_anm_level").removeAttribute("required");
    	 // 
    	 $('input[name="asha_level_anm_level"]').removeAttr('required');
    	//$('input[name="asha_level_anm_level"]').attr('disabled', 'disabled');
    }else if(Desigination_users=='9'){
    	 $("#phc_subcenter1").show();
    	
    	 $("#hide_sub_phc1").hide();
    	 if(block_status==1){
			$("#hide_sub_phc5").hide();
			$("#hide_sub_phc3").hide();
			$("#hide_sub_phc4").show();
			$("#hide_sub_phc2").show();

		}else{
			$("#hide_sub_phc2").hide();
			$("#hide_sub_phc4").hide();
			$("#hide_sub_phc3").show();
			$("#hide_sub_phc5").show();
		}
    	 
    }else if(Desigination_users=='10'){
    	$("#phc_subcenter1").show();
    	$("#hide_sub_phc1").show();
    	if(block_status==1){
			$("#hide_sub_phc5").hide();
			$("#hide_sub_phc3").hide();
			$("#hide_sub_phc4").show();
			$("#hide_sub_phc2").show();

		}else{
			$("#hide_sub_phc2").hide();
			$("#hide_sub_phc4").hide();
			$("#hide_sub_phc3").show();
			$("#hide_sub_phc5").show();
		}
    	 
    }

});
</script>