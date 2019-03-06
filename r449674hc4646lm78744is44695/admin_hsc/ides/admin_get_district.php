<?php
// print_r($_POST);
error_reporting(E_ALL);
session_start();
include "config.php";

// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id'])){
	$state_id=trim($_POST['state_id']);
	?>
	<div class="form-group">
	<label class="control-label col-sm-2" for="district_id">District:</label>
    <div class="col-sm-6">
    	<select class="form-control text-center" onchange="get_block_dh()" name="district_id" id="district_id" >
        	                  
        	<?php 
        	$query_district="SELECT * FROM `rhc_master_place_district` WHERE `place_state_id`='$state_id'";
        	$sql_exe_district=mysqli_query($conn,$query_district);
        	$num=mysqli_num_rows($sql_exe_district);
        	if($num!=0){
        		?>
        		<option value="">-- Select District -- </option> 
        		<?php
        		while ($res_dist=mysqli_fetch_assoc($sql_exe_district)) {?>
        			<option value="<?=$res_dist['place_district_id']?>"> <?=$res_dist['district_name']?> [<?=$res_dist['place_district_id']?>]</option> 
        		<?php }
        	}else{
        		?>
        			<option value="">-- No Is Present District -- </option>  
        	<?php
        	}?>
        </select>
                    
    </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-2" for="district_id">Health Facilities  :</label>
     		<div class="col-sm-6">
     			<label class="radio-inline"><input type="radio" name="optradio"  onclick="handleClick(this);" value="1" >District Hospital</label>
				<label class="radio-inline"><input type="radio" name="optradio" onclick="handleClick(this);" value="2">Block</label>
     		</div>
    </div>
    <span id="block_hostpitals_details"></span>
    <?php
}
?>
<script type="text/javascript">
	// var currentValue = 0;
function handleClick(myRadio) {
    // alert('Old value: ' + currentValue);
    // alert('New value: ' + myRadio.value);
    var currentValue = myRadio.value;
 // alert('Old value: ' + currentValue);
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    // alert(district_ids);
    if(state_id){
        if(district_ids){

            $.ajax({
                type:'POST',
                url:'admin_get_district_block_hospital.php',
                data:'state_id='+state_id+'&district_id='+district_ids+'&search_table='+currentValue,
                success:function(html){
                    $('#block_hostpitals_details').html(html);
                   
                }
            }); 
        }else{
        	if(currentValue==1){
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

	function get_block_dh() {

		var lastSelected = $('[name="optradio"]:checked').val();
		var state_id = $('#state_id').val();
   		var district_ids = $('#district_id').val();
   		if(district_ids){
			if(lastSelected){
				 $.ajax({
	                type:'POST',
	                url:'admin_get_district_block_hospital.php',
	                data:'state_id='+state_id+'&district_id='+district_ids+'&search_table='+lastSelected,
	                success:function(html){
	                    $('#block_hostpitals_details').html(html);
	                   
	                }
	            }); 
			}
		}else{
			if(lastSelected==1){
           $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">District Hospital:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
       		}else if(lastSelected==2){
       			$('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">Block:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
       		}else{
       			$('#block_hostpitals_details').html('');
       		}
		}
	}
</script>