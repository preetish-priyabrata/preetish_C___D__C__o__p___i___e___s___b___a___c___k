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
		<div class="row" id="remove_display">
      <div class="col-md-3 text-right">
        <label>BLOCK</label>
      </div>
      <div class="col-md-1">:</div>
      <div class="col-md-8">
    		
    			<select onchange="get_phc_aphc()" name="block_dh_uphc" id="block_dh_uphc" >
        	         <option value="">-- Select-- </option>          
		        	<?php
		        		$query_block="SELECT * FROM `rhc_master_place_block` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' ORDER BY `rhc_master_place_block`.`block_name` ASC ";
		        	$sql_exe_block=mysqli_query($conn,$query_block);
		        	$num_block=mysqli_num_rows($sql_exe_block);
		        	if($num_block!=0){
		        		?>
		        		<optgroup label="Block List">
		        		<?php
		        		while ($res_block=mysqli_fetch_assoc($sql_exe_block)) {?>
		        			<option value="<?=$res_block['place_block_id']?>"> <?=$res_block['block_name']?> [<?=$res_block['place_block_id']?>]</option> 
		        		<?php }
		        		?></optgroup><?php
		        	}
		        	?>
        		</select>
                    
    		
   		 </div>
    </div>

	

	<?php 
}

}else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	<script type="text/javascript">
  function get_phc_aphc() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_dh_uphc = $('#block_dh_uphc').val();
   
     if(block_dh_uphc){
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $.ajax({
          type:'POST',
          url:'admin_get_phc_aphc_status.php',
          data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc,
          success:function(html){
              // // $remove_display
              // $("#remove_display").remove(); 
              // $('#block_dh_uphc1').html(html);
              // alert(html);
            if(html==1){
              $("#remove_display1").remove(); 
              get_phc_aphc1();
              // $('#block_dh_uphc1').html(html);
             
              }else{
                 $('#phc_aphc').html('<option value="">-- Please Select District -- </option>');
                 $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
              }
            }
      }); 
     }else{
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
     }
  }
   function get_phc_aphc1() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_dh_uphc = $('#block_dh_uphc').val();
     if(block_dh_uphc){
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $.ajax({
          type:'POST',
          url:'admin_get_phc_aphc_details.php',
         data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc,
          success:function(html){
              // $remove_display
              // $("#remove_display").remove(); 
              $('#phc_aphc1').html(html);
             
          }
      }); 
     }else{
       // $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
     }
  }
</script>
	
   