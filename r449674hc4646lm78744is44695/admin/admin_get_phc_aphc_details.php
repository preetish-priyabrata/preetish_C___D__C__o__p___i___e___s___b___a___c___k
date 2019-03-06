<?php 


error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){
// Array ( [state_id] => BR ) 
if(!empty($_POST['state_id']) && !empty($_POST['district_id'])  && !empty($_POST['block_dh_uphc'])  ){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$block_dh_uphc=trim($_POST['block_dh_uphc']);
	?>
	<div class="row" id="remove_display1">
        <div class="col-md-3 text-right">
            <label>Phc/Aphc</label>
        </div>
        <div class="col-md-1">:</div>
        <div class="col-md-8">
	
    	
			<select  onchange="get_detail_phc_sub_center()"  name="phc_aphc" id="phc_aphc" >
		           <option value="">-- Select-- </option>   
	        	<?php 
	        	$query_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_dh_uphc'";
				$sql_exe_phc=mysqli_query($conn,$query_phc);
				$num_phc=mysqli_num_rows($sql_exe_phc); 
	        	if($num_phc!=0){
	        		?>
	        		<optgroup label="PHC List">
	        		<?php
	        		while ($res_phc=mysqli_fetch_assoc($sql_exe_phc)) {?>
	        			<option value="<?=$res_phc['place_phc_id']?>"> <?=$res_phc['phc_name']?> [<?=$res_phc['place_phc_id']?>]</option> 
	        		<?php }
	        		?>
	        	</optgroup>
	        	<?php
	        	}
	        	$query_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_dh_uphc'";
	        	$sql_exe_aphc=mysqli_query($conn,$query_aphc);
	        	$num_aphc=mysqli_num_rows($sql_exe_aphc);
	        	if($num_aphc!=0){
	        		?>
	        		<optgroup label="APHC List">
	        		<?php
	        		while ($res_aphc=mysqli_fetch_assoc($sql_exe_aphc)) {?>
	        			<option value="<?=$res_aphc['place_aphc_id']?>"> <?=$res_aphc['aphc_name']?> [<?=$res_aphc['place_aphc_id']?>]</option> 
	        		<?php }
	        		?></optgroup><?php
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
	<script type="text/javascript">
  function get_detail_phc_sub_center() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_dh_uphc = $('#block_dh_uphc').val();
   	var phc_aphc_ids=$('#phc_aphc').val();
     if(phc_aphc_ids){
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
       $.ajax({
          type:'POST',
          url:'admin_get_hsc_status.php',
          data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_ids='+phc_aphc_ids,
          success:function(html){
              // // $remove_display
              // $("#remove_display").remove(); 
              // $('#block_dh_uphc1').html(html);
              // alert(html);
            if(html==1){
              
              get_detail_phc_sub_center1();
              // $('#block_dh_uphc1').html(html);
             
              }else{
                 
                 $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
              }
            }
      }); 
     }else{
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select District -- </option>');
       $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
     }
  }
  function get_detail_phc_sub_center1() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_dh_uphc = $('#block_dh_uphc').val();
   	var phc_aphc_ids=$('#phc_aphc').val();
      if(phc_aphc_ids){
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
        $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
        $.ajax({
          type:'POST',
          url:'admin_get_hsc_details.php',
          data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_ids='+phc_aphc_ids,
          success:function(html){
              // $remove_display
            $("#remove_display2").remove(); 
              $('#hsc').html(html);
             
          }
        }); 
      }else{
        // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
        $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
        $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
      }
  }
</script>
	
   