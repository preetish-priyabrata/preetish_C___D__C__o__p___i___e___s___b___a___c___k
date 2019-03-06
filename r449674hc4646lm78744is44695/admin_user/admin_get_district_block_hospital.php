<?php 

// print_r($_POST);
// Array ( [state_id] => BR [district_id] => Gop [search_table] => 1 ) 
// <?php
// print_r($_POST);
error_reporting(E_ALL);
session_start();
include "config.php";

// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id']) && !empty($_POST['district_id']) && !empty($_POST['search_table'])){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$search_table=trim($_POST['search_table']);
	if($search_table==1){ ?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="district_hospital_id">District Hospital :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center"  name="district_hospital_id" id="district_hospital_id" >
        	                  
		        	<?php 
		        	$query_district_host="SELECT * FROM `rhc_master_place_dh` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id'";
		        	$sql_exe_district_host=mysqli_query($conn,$query_district_host);
		        	$num_hos=mysqli_num_rows($sql_exe_district_host);
		        	if($num_hos!=0){
		        		?>
		        		<option value="">-- Select District Hospitals-- </option> 
		        		<?php
		        		while ($res_dist_host=mysqli_fetch_assoc($sql_exe_district_host)) {?>
		        			<option value="<?=$res_dist_host['place_hostpital_id']?>"> <?=$res_dist_host['hosptial_name']?> [<?=$res_dist_host['place_hostpital_id']?>]</option> 
		        		<?php }
		        	}else{
		        		?>
		        			<option value="">-- No District Hospitals Present In District Please Contact Admin -- </option>  
		        	<?php
		        	}?>
        		</select>
                    
    		</div>
   		 </div>

	<?php }else if($search_table==2){?>
		<div class="form-group" id="hidde_block">
			<label class="control-label col-sm-2" for="block_id">Block :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center" onchange="get_aphc_phc_list()" name="block_id" id="block_id" >
        	                  
		        	<?php 
		        	echo $query_block="SELECT * FROM `rhc_master_place_block` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' ORDER BY `rhc_master_place_block`.`block_name` ASC ";
		        	$sql_exe_block=mysqli_query($conn,$query_block);
		        	$num_block=mysqli_num_rows($sql_exe_block);
		        	if($num_block!=0){
		        		?>
		        		<option value="">-- Select Block -- </option> 
		        		<?php
		        		while ($res_block=mysqli_fetch_assoc($sql_exe_block)) {?>
		        			<option value="<?=$res_block['place_block_id']?>"> <?=$res_block['block_name']?> [<?=$res_block['place_block_id']?>]</option> 
		        		<?php }
		        	}else{
		        		?>
		        			<option value="">-- No Block Is Present In This District -- </option>  
		        	<?php
		        	}?>
        		</select>
                    
    		</div>
   		 </div>
   		   <div class="form-group" id="hidde_block_center">
    	<label class="control-label col-sm-2" for="district_id">Health Facilities :</label>
     		<div class="col-sm-6">
     			<label class="radio-inline" id="hidde_phc"><input type="radio" name="sub_center"  onclick="Check_sub_center(this);" value="1" >PHC</label>
				<label class="radio-inline" id="hidde_aphc"><input type="radio" name="sub_center" onclick="Check_sub_center(this);" value="2">APHC</label>
     		</div>
    </div> 
    <span id="phc_aphc_details"></span>
	<?php }else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	
   <!--  <div class="form-group">
    	<label class="control-label col-sm-2" for="district_id">Type :</label>
     		<div class="col-sm-6">
     			<label class="radio-inline"><input type="radio" name="optradio"  onclick="handleClick(this);" value="1" >District Hospital</label>
				<label class="radio-inline"><input type="radio" name="optradio" onclick="handleClick(this);" value="2">Block</label>
     		</div>
    </div> -->
    <!-- <span id="block_hostpitals_details"></span> -->
    <?php
}
?>

<script type="text/javascript">
$( document ).ready(function() {
	
	var Desigination_users = $('#Desigination_user').val();
     if(Desigination_users=='3'){
     	$("#hidde_block_center").hide();
       // $("#dist_hidden").show();
       //  $("#dist_hidden_cho").show();
       //   $("#dist_hidden_cho1").show();
       //    $("#user_pass_hiden").show();
        // $('input:radio[name="sub_center"][value="1"]').attr('checked', true);
        //   $("#hidde_aphc").hide();

        // get_block_dh();
    }else if(Desigination_users=='5'){
    	 $("#hidde_block").show();
    	$("#hidde_block_center").show();
    	 $("#hidde_aphc").hide();
    	 $('input:radio[name="sub_center"][value="1"]').attr('checked', true);
    }else if(Desigination_users=='6'){
    	 $("#hidde_block").show();
    	$("#hidde_block_center").show();
    	 $("#hidde_phc").hide();
    	 $('input:radio[name="sub_center"][value="2"]').attr('checked', true);
    }else if(Desigination_users=='7'|| Desigination_users=='8'){
    	$("#hidde_block").show();
    	$("#hidde_block_center").show();
    	 $("#hidde_phc").show();
    }
});
	// var currentValue = 0;
function Check_sub_center(sub_centerRadio) {
    // alert('Old value: ' + currentValue);
    // alert('New value: ' + myRadio.value);
    var Desigination_users = $('#Desigination_user').val();

    var sub_center_health = sub_centerRadio.value;
    var lastSelected1 = $('[name="optradio"]:checked').val();
 // alert('Old value: ' + currentValue);
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_id=$('#block_id').val();
    // alert(district_ids);
    if(state_id){
        if(district_ids){
        	if(block_id){
	            $.ajax({
	                type:'POST',
	                url:'admin_get_aphc_phc.php',
	                data:'state_id='+state_id+'&district_id='+district_ids+'&search_table_block_phc_aphc='+sub_center_health+'&block_ids='+block_id,
	                success:function(html){
	                    $('#phc_aphc_details').html(html);
	                   
	                }
	            }); 
	        }else{
	        	if(sub_center_health==1){
		           $('#phc_aphc_details').html('<div class="form-group"><label class="control-label col-sm-2" for="phc_id">PHC :</label><div class="col-sm-6"><select class="form-control text-center" name="phc_id" id="phc_id" required=""><option value="">-- Please Select Block -- </option></select></div>'); 
		       	}else{
		       		$('#phc_aphc_details').html('<div class="form-group"><label class="control-label col-sm-2" for="aphc_id">APHC:</label><div class="col-sm-6"><select class="form-control text-center" name="aphc_id" id="aphc_id" required=""><option value="">-- Please Select Block -- </option></select></div>'); 
		       		}
	        }
        }else{
        	if(lastSelected1==1){
	           $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">District Hospital:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
       		}else{
       			$('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">Block:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
       		}
        }
    }else{
    	$('#district_details').html('<div class="form-group"><label class="control-label col-sm-2" for="district_id">District:</label><div class="col-sm-6"><select class="form-control text-center" name="district_id" id="district_id" required=""><option value="">-- Please Select State -- </option></select></div>'); 
    }
 

}

</script>
<script type="text/javascript">

	function get_aphc_phc_list() {
		var Desigination_users = $('#Desigination_user').val();


		var lastSelecteds = $('[name="sub_center"]:checked').val();
		var state_id = $('#state_id').val();
   		var district_ids = $('#district_id').val();
   		var block_id=$('#block_id').val();
   		if(block_id){
			if(lastSelecteds){
				 $.ajax({
	                type:'POST',
	                url:'admin_get_aphc_phc.php',
	                data:'state_id='+state_id+'&district_id='+district_ids+'&search_table_block_phc_aphc='+lastSelecteds+'&block_ids='+block_id,
	                success:function(html){
	                    $('#phc_aphc_details').html(html);
	                   
	                }
	            }); 
			}
		}else{
			if(lastSelecteds==1){
		        $('#phc_aphc_details').html('<div class="form-group"><label class="control-label col-sm-2" for="phc_id">PHC :</label><div class="col-sm-6"><select class="form-control text-center" name="phc_id" id="phc_id" required=""><option value="">-- Please Select Block -- </option></select></div>'); 
		    }else if(lastSelecteds==2){
		    	$('#phc_aphc_details').html('<div class="form-group"><label class="control-label col-sm-2" for="aphc_id">APHC:</label><div class="col-sm-6"><select class="form-control text-center" name="aphc_id" id="aphc_id" required=""><option value="">-- Please Select Block -- </option></select></div>'); 
		    }else{
		    	$('#phc_aphc_details').html('');
		    }
		}
	}
</script>