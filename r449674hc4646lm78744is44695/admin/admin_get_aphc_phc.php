<?php
//getting list aphc or phc List Of 
error_reporting(E_ALL);
session_start();
include "config.php";


if(!empty($_POST['state_id']) && !empty($_POST['district_id']) && !empty($_POST['search_table_block_phc_aphc']) && !empty($_POST['block_ids'])){
	$state_id=trim($_POST['state_id']);
	$district_id=trim($_POST['district_id']);
	$block_ids=trim($_POST['block_ids']);
	$search_table_block_phc_aphc=trim($_POST['search_table_block_phc_aphc']);
	// if PHC is ! WE WILL GET LIST PHC 
	if($search_table_block_phc_aphc==1){ 
		?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phc_id">PHC :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center" onchange="get_detail_phc_sub_center()"  name="phc_id" id="phc_id" >
        	                  
		        	<?php 
		        	$query_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_ids'";
		        	$sql_exe_phc=mysqli_query($conn,$query_phc);
		        	$num_phc=mysqli_num_rows($sql_exe_phc);
		        	if($num_phc!=0){
		        		?>
		        		<option value="">-- Select PHC-- </option> 
		        		<?php
		        		while ($res_phc=mysqli_fetch_assoc($sql_exe_phc)) {?>
		        			<option value="<?=$res_phc['place_phc_id']?>"> <?=$res_phc['phc_name']?> [<?=$res_phc['place_phc_id']?>]</option> 
		        		<?php }
		        	}else{
		        		?>
		        			<option value="">-- No PHC Present In This Block-- </option>  
		        	<?php
		        	}?>
        		</select>
                    
    		</div>
   		</div>
		<span id="sub_center_phc_aphc_details"></span>
	<?php }else if($search_table_block_phc_aphc==2){ //aphc

		?>
		<div class="form-group">
			<label class="control-label col-sm-2" for="APHC_id">APHC :</label>
    		<div class="col-sm-6">
    			<select class="form-control text-center" onchange="get_detail_phc_sub_center2()" name="APHC_id" id="APHC_id" >
        	                  
		        	<?php 
		        	$query_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_state_id`='$state_id' AND `place_district_id`='$district_id' AND `place_block_id`='$block_ids'";
		        	$sql_exe_aphc=mysqli_query($conn,$query_aphc);
		        	$num_aphc=mysqli_num_rows($sql_exe_aphc);
		        	if($num_aphc!=0){
		        		?>
		        		<option value="">-- Select APHC -- </option> 
		        		<?php
		        		while ($res_aphc=mysqli_fetch_assoc($sql_exe_aphc)) {?>
		        			<option value="<?=$res_aphc['place_aphc_id']?>"> <?=$res_aphc['aphc_name']?> [<?=$res_aphc['place_aphc_id']?>]</option> 
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
    	<label class="control-label col-sm-2" for="phc_subcenter">Health Facilities :</label>
     		<div class="col-sm-6">
     			<label class="radio-inline" id="hide_sub_phc"><input type="radio" name="sub_center"  onclick="Check_sub_center(this);" value="1" >PHC Sub-Center</label>
				<label class="radio-inline" id="hide_sub_aphc"><input type="radio" name="sub_center" onclick="Check_sub_center(this);" value="2">APHC Sub-Center</label>
     		</div>
    </div>  -->
    <span id="sub_center_phc_aphc_details"></span>
	<?php }else{ 
		header('Location:logout.php');
		exit;
	}
	?>
	
   
    <?php
}
?>
<script type="text/javascript">
// $( document ).ready(function() {
	
// 	var Desigination_users = $('#Desigination_user').val();
// 	alert(Desigination_users);
//      if(Desigination_users=='1' && Desigination_users=='2' && Desigination_users=='3' && Desigination_users=='4' && Desigination_users=='5' && Desigination_users=='6' ){
//      	$("#phc_subcenter").hide();
//        // $("#dist_hidden").show();
//        //  $("#dist_hidden_cho").show();
//        //   $("#dist_hidden_cho1").show();
//        //    $("#user_pass_hiden").show();
//         // $('input:radio[name="sub_center"][value="1"]').attr('checked', true);
//         //   $("#hidde_aphc").hide();

//         // get_block_dh();
//     }else if(Desigination_users=='7'){
//     	 $("#phc_subcenter").show();
//     	$("#hide_sub_phc").show();
//     	 $("#hide_sub_aphc").hide();
//     	 $('input:radio[name="sub_center"][value="1"]').attr('checked', true);
//     }else if(Desigination_users=='8'){
//     	 $("#phc_subcenter").show();
//     	$("#hide_sub_aphc").show();
//     	 $("#hide_sub_phc").hide();
//     	 $('input:radio[name="sub_center"][value="2"]').attr('checked', true);
//     }else if(Desigination_users=='9'){
//     	$("#phc_subcenter").show();
//     	$("#hide_sub_phc").show();
//     	 $("#hide_sub_phc").show();
//     }
// });
</script>

<script type="text/javascript">
// $( document ).ready(function() {
//  // $("#sub_center_phc_aphc_details").hide();
//  //  var Desigination_users = $('#Desigination_user').val();
//  // if(Desigination_users=='7'|| Desigination_users=='8'){
//  // 	$("#sub_center_phc_aphc_details").show();
//  // }else{
//  // 	$("#sub_center_phc_aphc_details").hide();
//  // }
// });
function get_detail_phc_sub_center() {
	var sub_center_health = $('[name="sub_center"]:checked').val();
    var block_status = $('[name="optradio"]:checked').val();
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_id=$('#block_id').val();
    var phc_ids=$('#phc_id').val();
    var Desigination_users = $('#Desigination_user').val();
    if(Desigination_users=='7'|| Desigination_users=='8' || Desigination_users=='9'  || Desigination_users=='10'){
	    if(phc_ids){
	    	// alert();
	    	$.ajax({
	            type:'POST',
		        url:'admin_get_sub_center_aphc_phc.php',
		        data:'state_id='+state_id+'&district_id='+district_ids+'&search_table_block_phc_aphc='+sub_center_health+'&block_ids='+block_id+'&phc_aphc_id='+phc_ids,
		        success:function(html){
		        	// alert(html);
			        $('#sub_center_phc_aphc_details').html(html);
		        }
		    });
	    }
	}
}
function get_detail_phc_sub_center2() {
	var sub_center_health = $('[name="sub_center"]:checked').val();
    var block_status = $('[name="optradio"]:checked').val();
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_id=$('#block_id').val();
    var phc_ids=$('#APHC_id').val();
    var Desigination_users = $('#Desigination_user').val();
    if(Desigination_users=='7'|| Desigination_users=='8'|| Desigination_users=='9' || Desigination_users=='10'){
	    if(phc_ids){
	    	// alert();
	    	$.ajax({
	            type:'POST',
		        url:'admin_get_sub_center_aphc_phc.php',
		        data:'state_id='+state_id+'&district_id='+district_ids+'&search_table_block_phc_aphc='+sub_center_health+'&block_ids='+block_id+'&phc_aphc_id='+phc_ids,
		        success:function(html){
		        	// alert(html);
			        $('#sub_center_phc_aphc_details').html(html);
		        }
		    });
	    }
	}
}
</script>

