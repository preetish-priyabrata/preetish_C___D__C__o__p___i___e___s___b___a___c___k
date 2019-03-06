<?php
session_start();
if($_SESSION['email_id']){
  include 'webconfig/config.php';
	$crop_option=trim($_POST['crop_option']);
	if($crop_option=='2'){
		$Crop_type=trim($_POST['Crop_type']);
		$GET_TYPE="SELECT * FROM `ilab_water_crops` WHERE `Status`='1' and `sub_menu_id`='$Crop_type'";
	    $SQL_GET=mysqli_query($conn,$GET_TYPE);
	    $num_crop=mysqli_num_rows($SQL_GET);
	    if($num_crop==0){?>
	    	<option value="">--No Crop Name Is Available--</option>
	   	<?php
	    }else{
	    	?>
	    	<option value="">--Select Crop Name--</option>
	    <?php 
	    	while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
	        	<option value="<?=$get_fetch_type['crop_id']?>"><?=strtoupper($get_fetch_type['crop_name'])?></option>

	 <?php  }
	    }

	}else if($crop_option=='3'){
		$crop_name=trim($_POST['crop_name']);
        $GET_TYPE="SELECT * FROM `ilab_water_session` WHERE `status`='1' and `seasion_crop_id`='$crop_name'";
        $SQL_GET=mysqli_query($conn,$GET_TYPE);
        $num_crop_season=mysqli_num_rows($SQL_GET);
	    if($num_crop_season==0){?>
	    	<option value="">--No Season Is Avaliable--</option>
	   	<?php
	    }else{
	    	?>
	    	<option value="">--Select Season Name--</option>
	    <?php 
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['session_id']?>"><?=strtoupper($get_fetch_type['seasion_name'])?></option>

               <?php  }
		
	    }
	}else if($crop_option=='4'){
		$crop_name=trim($_POST['crop_name']);
        $GET_TYPE="SELECT * FROM `ilab_water_method_cultivation` WHERE `cultivation_crop_id`='$crop_name' AND`Status`='1'";
        $SQL_GET=mysqli_query($conn,$GET_TYPE);
        $num_crop_season=mysqli_num_rows($SQL_GET);
	    if($num_crop_season==0){?>
	    	<option value="">--No Method of Cultivation Is Avaliable--</option>
	   	<?php
	    }else{
	    	?>
	    	<option value="">--Select Method of Cultivation Name--</option>
	    <?php 
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['method_cultivation_id']?>"><?=strtoupper($get_fetch_type['cultivation_name'])?></option>

               <?php  }
		
	    }
	}else if($crop_option=='5'){
		$land_id=trim($_POST['land_id']);
        $GET_TYPE="SELECT * FROM `ilab_water_water_details` WHERE `status`='1' and `water_land_id`='$land_id'";
        $SQL_GET=mysqli_query($conn,$GET_TYPE);
        $num_crop_season=mysqli_num_rows($SQL_GET);
	    if($num_crop_season==0){?>
	    	<option value="">--No Water Detail Is Avaliable--</option>
	   	<?php
	    }else{
	    	?>
	    	<option value="">--Select Water Detail--</option>
	    <?php 
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['water_id']?>"><?=strtoupper($get_fetch_type['water_name'])?></option>

               <?php  }
		
	    }
	}

}