<?php
error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){


	if(!empty($_POST['place_id'])){
		$state_id=trim($_POST['state_id']);
		$district_id=trim($_POST['district_id']);
		$block_dh_uphc=trim($_POST['block_dh_uphc']);
		$phc_aphc=trim($_POST['phc_aphc']);
		$place_id=trim($_POST['place_id']);

    ?>
          <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
       /*height: auto;*/

    }
    </style>

    
    
    
   
          <?php
		// exit;
		switch ($place_id) {
      case '4';
              
             
                $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  

               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                 $labels2[]=$item_names;                
                              
                      $datasets1[]="60";
                      $datasets2[]= $result_list_item['item_quantity'];
                      
                 


                }
                // print_r($labels2);
                
                $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
                $x_detail_issue= json_encode($datasets1);
                $rasied="Bihar[BR]";
               
        break;
			case '1':
				# code...
				 
		            $place_district_id=$district_id;
		            $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
		            $sql_exec_block=mysqli_query($conn,$get_block);
		            $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
		            $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
                 $query_item="SELECT * FROM `rhc_master_stock_district_items` WHERE `distrct_place_id`='$district_id'";
                $sql_exe=mysqli_query($conn,$query_item);

        
             $num_aphc_present=mysqli_num_rows($sql_exe);
            if($num_aphc_present==0){
               echo "<b  style='color:red'>No Records Available</b>";
               exit;
            }else{
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {

                  $item_code=$result_list_item['item_codes'];// item code
                  $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                  $sql_exe_item=mysqli_query($conn,$query_item_name);
                  $res_list=mysqli_fetch_assoc($sql_exe_item);

                  $item_types=$result_list_item['item_types']; //itrem type
                  $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                  $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                  $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                   $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name']; // naming with type
                   $labels2[]=$item_names;     

                   //issue value  will be find here only6
                    $query_issued="SELECT SUM(quantity_issued) FROM `rhc_master_district_item_details_challan_no` WHERE `receiver_place_id`='$place_district_id' and `item_code`='$item_code' and `item_type`='$item_types'";

                      $sql_exe_issued=mysqli_query($conn,$query_issued);
                      $fetch_issued=mysqli_fetch_array($sql_exe_issued); 
                      if(!empty($fetch_issued[0])){
                        $num_rows12=$fetch_issued[0]; 
                      }else{
                        $num_rows12="0";
                      }
                      // SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id` `place_status``item_code``item_type``quantity`
                      // forecasting amount
                      // 
                      $query_forecasting="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_district_id' and `place_status`='2' and `item_code`='$item_code'and `item_type`='$item_types'";
                      $sql_exe_forecasting=mysqli_query($conn,$query_forecasting);
                      $fetch_forecasting=mysqli_fetch_array($sql_exe_forecasting);  

                        $datasets1[]=$num_rows12; // issued amount 
                        $datasets2[]= $result_list_item['item_quantity']; // current
                        $datasets3[]= $fetch_forecasting['quantity']; //forcasting
                   


                }
                  // print_r($labels2);
                  
                  $x_place= json_encode($labels2); // name ot item and type
                  $x_detail= json_encode($datasets2); // current stock
                  $x_detail_issue= json_encode($datasets1); // issued stock
                  $x_detail_fore= json_encode($datasets3); // issued forecasting quantity
                   $rasied=$place_name;?>
                  <div id="container" >
        <canvas id="mycanvas" width="400" height="800"   ></canvas>
    </div>
                  <?php
                  }
		
	    	break;
		case '2':
      $block_id=$block_dh_uphc;
      $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
      $sql_exec_block=mysqli_query($conn,$get_block);

      $dh_id=$block_dh_uphc;
      $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$dh_id'";
      $sql_exec_dh=mysqli_query($conn,$get_dh);
                            
      $dh_id1=$block_dh_uphc;
      $get_dh1="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id1'";
      $sql_exec_dh1=mysqli_query($conn,$get_dh1);

      $num_hos1=mysqli_num_rows($sql_exec_dh1);
      $num_block=mysqli_num_rows($sql_exec_block);
      $num_hos=mysqli_num_rows($sql_exec_dh);

      if($num_hos1!="0"){
       	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh1);
       	$place_name=strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';

        $query_item="SELECT * FROM `rhc_master_stock_uphc_items` WHERE `uphc_place_id`='$block_dh_uphc'";
            $sql_exe=mysqli_query($conn,$query_item);

        
            $num_aphc_present=mysqli_num_rows($sql_exe);
            if($num_aphc_present==0){
               echo "<b style='color:red'>No Records Available</b>";
            }else{
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {

              $item_code=$result_list_item['item_codes'];
              $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
              $sql_exe_item=mysqli_query($conn,$query_item_name);
              $res_list=mysqli_fetch_assoc($sql_exe_item);

              $item_types=$result_list_item['item_types'];
              $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
              $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

               $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
               $labels2[]=$item_names;                
                            
                //issue value  will be find here only6
                $query_issued="SELECT SUM(quantity_issued) FROM `rhc_master_dh_block_indent_id_details` WHERE `receiver_place_id`='$block_dh_uphc' and `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued); 
                  if(!empty($fetch_issued[0])){
                    $num_rows12=$fetch_issued[0]; 
                  }else{
                    $num_rows12="0";
                  }
                  // SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id` `place_status``item_code``item_type``quantity`
                  // forecasting amount
                  // 
                  $query_forecasting="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$block_dh_uphc' and `place_status`='11' and `item_code`='$item_code'and `item_type`='$item_types'";
                  $sql_exe_forecasting=mysqli_query($conn,$query_forecasting);
                  $fetch_forecasting=mysqli_fetch_array($sql_exe_forecasting);  

                    $datasets1[]=$num_rows12; // issued amount 
                    $datasets2[]= $result_list_item['item_quantity']; // current
                    $datasets3[]= $fetch_forecasting['quantity']; //forcasting
               


            }
              // print_r($labels2);
              
              $x_place= json_encode($labels2); // name ot item and type
              $x_detail= json_encode($datasets2); // current stock
              $x_detail_issue= json_encode($datasets1); // issued stock
              $x_detail_fore= json_encode($datasets3); // issued forecasting quantity
               $rasied=$place_name;?>
                  <div id="container" >
        <canvas id="mycanvas" width="400" height="800"   ></canvas>
    </div>
                  <?php
            }


      }
      if($num_hos!="0"){
       	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
        $place_name=strtoupper($dh_fetch_detail['place_hostpital_id']).'';

         $query_item="SELECT * FROM `rhc_master_stock_district_hospital_items` WHERE `dh_place_id`='$block_dh_uphc'";
            $sql_exe=mysqli_query($conn,$query_item);

        
            $num_aphc_present=mysqli_num_rows($sql_exe);
            if($num_aphc_present==0){
               echo "<b style='color:red'>No Records Available</b>";
            }else{
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            
              $item_code=$result_list_item['item_codes'];
              $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
              $sql_exe_item=mysqli_query($conn,$query_item_name);
              $res_list=mysqli_fetch_assoc($sql_exe_item);

              $item_types=$result_list_item['item_types'];
              $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
              $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

               $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
               $labels2[]=$item_names;                
                            
                  //issue value  will be find here only6
                $query_issued="SELECT SUM(quantity_issued) FROM `rhc_master_dh_block_indent_id_details` WHERE `receiver_place_id`='$block_dh_uphc' and `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued); 
                  if(!empty($fetch_issued[0])){
                    $num_rows12=$fetch_issued[0]; 
                  }else{
                    $num_rows12="0";
                  }
                  // SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id` `place_status``item_code``item_type``quantity`
                  // forecasting amount
                  // 
                  $query_forecasting="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$block_dh_uphc' and `place_status`='4' and `item_code`='$item_code'and `item_type`='$item_types'";
                  $sql_exe_forecasting=mysqli_query($conn,$query_forecasting);
                  $fetch_forecasting=mysqli_fetch_array($sql_exe_forecasting);  

                    $datasets1[]=$num_rows12; // issued amount 
                    $datasets2[]= $result_list_item['item_quantity']; // current
                    $datasets3[]= $fetch_forecasting['quantity']; //forcasting
               


            }
              // print_r($labels2);
              
              $x_place= json_encode($labels2); // name ot item and type
              $x_detail= json_encode($datasets2); // current stock
              $x_detail_issue= json_encode($datasets1); // issued stock
              $x_detail_fore= json_encode($datasets3); // issued forecasting quantity
               $rasied=$place_name;?>
                  <div id="container" >
        <canvas id="mycanvas" width="400" height="800"   ></canvas>
    </div>
                  <?php
            }

      }
      if($num_block!="0"){
       	$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
      	$place_name=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
        $query_item="SELECT * FROM `rhc_master_stock_block_items` WHERE `block_place_id`='$block_dh_uphc'";
        $sql_exe=mysqli_query($conn,$query_item);
       
        
            $num_aphc_present=mysqli_num_rows($sql_exe);
            if($num_aphc_present==0){
               echo "<b style='color:red'>No Records Available</b>";
            }else{
        while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
         
        
              $item_code=$result_list_item['item_codes'];
              $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
              $sql_exe_item=mysqli_query($conn,$query_item_name);
              $res_list=mysqli_fetch_assoc($sql_exe_item);

              $item_types=$result_list_item['item_types'];
              $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
              $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

               $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
               $labels2[]=$item_names;                
                 //issue value  will be find here only6
                $query_issued="SELECT SUM(quantity_issued) FROM `rhc_master_dh_block_indent_id_details` WHERE `receiver_place_id`='$block_dh_uphc' and `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued); 
                  if(!empty($fetch_issued[0])){
                    $num_rows12=$fetch_issued[0]; 
                  }else{
                    $num_rows12="0";
                  }
                  // SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id` `place_status``item_code``item_type``quantity`
                  // forecasting amount
                  // 
                  $query_forecasting="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$block_dh_uphc' and `place_status`='3' and `item_code`='$item_code'and `item_type`='$item_types'";
                  $sql_exe_forecasting=mysqli_query($conn,$query_forecasting);
                  $fetch_forecasting=mysqli_fetch_array($sql_exe_forecasting);  

                    $datasets1[]=$num_rows12; // issued amount 
                    $datasets2[]= $result_list_item['item_quantity']; // current
                    $datasets3[]= $fetch_forecasting['quantity']; //forcasting
               


            }
              // print_r($labels2);
              
              $x_place= json_encode($labels2); // name ot item and type
              $x_detail= json_encode($datasets2); // current stock
              $x_detail_issue= json_encode($datasets1); // issued stock
              $x_detail_fore= json_encode($datasets3); // issued forecasting quantity
               $rasied=$place_name;?>
                  <div id="container" >
        <canvas id="mycanvas" width="400" height="800"   ></canvas>
    </div>
                  <?php
            }

      }
                       

		
				break;
			case '3':

				$phc_id=$phc_aphc;
        $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
        $sql_exec_phc=mysqli_query($conn,$get_phc);
        $num_phc=mysqli_num_rows($sql_exec_phc);
        if($num_phc!=0){
					$phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
         	$place_name= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';
          $query_item="SELECT * FROM `rhc_master_stock_phc_items` WHERE `phc_place_id`='$phc_aphc'";
            $sql_exe=mysqli_query($conn,$query_item);
        
            $num_aphc_present=mysqli_num_rows($sql_exe);
            if($num_aphc_present==0){
               echo "<b style='color:red'>No Records Available</b>";
            }else{
               while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            
              $item_code=$result_list_item['item_codes'];
              $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
              $sql_exe_item=mysqli_query($conn,$query_item_name);
              $res_list=mysqli_fetch_assoc($sql_exe_item);

              $item_types=$result_list_item['item_types'];
              $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
              $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

               $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
               $labels2[]=$item_names;                
                            
                  //issue value  will be find here only6
                $query_issued="SELECT SUM(quantity_issued) FROM `rhc_master_phc_aphc_indent_id_details` WHERE `receiver_place_id`='$phc_aphc' and `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued); 
                  if(!empty($fetch_issued[0])){
                    $num_rows12=$fetch_issued[0]; 
                  }else{
                    $num_rows12="0";
                  }
                  // SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id` `place_status``item_code``item_type``quantity`
                  // forecasting amount
                  // 
                  $query_forecasting="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$phc_aphc' and `place_status`='5' and `item_code`='$item_code'and `item_type`='$item_types'";
                  $sql_exe_forecasting=mysqli_query($conn,$query_forecasting);
                  $fetch_forecasting=mysqli_fetch_array($sql_exe_forecasting);  

                    $datasets1[]=$num_rows12; // issued amount 
                    $datasets2[]= $result_list_item['item_quantity']; // current
                    $datasets3[]= $fetch_forecasting['quantity']; //forcasting
               


            }
              // print_r($labels2);
              
              $x_place= json_encode($labels2); // name ot item and type
              $x_detail= json_encode($datasets2); // current stock
              $x_detail_issue= json_encode($datasets1); // issued stock
              $x_detail_fore= json_encode($datasets3); // issued forecasting quantity
               $rasied=$place_name;?>
                  <div id="container" >
        <canvas id="mycanvas" width="400" height="800"   ></canvas>
    </div>
                  <?php
            }

				}    
                
        $place_id_aphc=$phc_aphc;
        $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
        $sql_exec_aphc=mysqli_query($conn,$get_aphc);
        $num_aphc=mysqli_num_rows($sql_exec_aphc);
        if($num_aphc!=0){

					$aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
          $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
          $query_item="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `aphc_place_id`='$phc_aphc'";
            $sql_exe=mysqli_query($conn,$query_item);
            $num_aphc_present=mysqli_num_rows($sql_exe);
            if($num_aphc_present==0){
               echo "<b style='color:red'>No Records Available</b>";
            }else{
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {

           
              $item_code=$result_list_item['item_codes'];
              $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
              $sql_exe_item=mysqli_query($conn,$query_item_name);
              $res_list=mysqli_fetch_assoc($sql_exe_item);

              $item_types=$result_list_item['item_types'];
              $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
              $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

               $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
               $labels2[]=$item_names;                
                   //issue value  will be find here only6
                $query_issued="SELECT SUM(quantity_issued) FROM `rhc_master_phc_aphc_indent_id_details` WHERE `receiver_place_id`='$phc_aphc' and `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued); 
                  if(!empty($fetch_issued[0])){
                    $num_rows12=$fetch_issued[0]; 
                  }else{
                    $num_rows12="0";
                  }
                  // SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id` `place_status``item_code``item_type``quantity`
                  // forecasting amount
                  // 
                  $query_forecasting="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$phc_aphc' and `place_status`='6' and `item_code`='$item_code'and `item_type`='$item_types'";
                  $sql_exe_forecasting=mysqli_query($conn,$query_forecasting);
                  $fetch_forecasting=mysqli_fetch_array($sql_exe_forecasting);  

                    $datasets1[]=$num_rows12; // issued amount 
                    $datasets2[]= $result_list_item['item_quantity']; // current
                    $datasets3[]= $fetch_forecasting['quantity']; //forcasting
               


            }
              // print_r($labels2);
              
              $x_place= json_encode($labels2); // name ot item and type
              $x_detail= json_encode($datasets2); // current stock
              $x_detail_issue= json_encode($datasets1); // issued stock
              $x_detail_fore= json_encode($datasets3); // issued forecasting quantity
               $rasied=$place_name;?>
                  <div id="container" >
        <canvas id="mycanvas" width="400" height="800"   ></canvas>
    </div>
                  <?php
            }

        }
                          
			
				break;
			default:
				header('Location:logout.php');
				exit;
				break;
		}
	}

}else{
	header('Location:logout.php');
	exit;
}
?>

<script src="../assert/Chart1/dist/Chart.js"></script>
<script type="text/javascript">

var randomColorGenerator = function () { 
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
};
var randomColorGenerator1 = function () { 
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
};
  var player=(<?=$x_place?>);
  var score=(<?=$x_detail?>);
  var score1=(<?=$x_detail_issue?>);
  var score2=(<?=$x_detail_fore?>);
  var chartdata = {
        labels: player ,
        datasets : [{
            label: "Available Stock Level <?=$rasied?>",
            backgroundColor: randomColorGenerator(),
            borderColor: randomColorGenerator(),
            hoverBackgroundColor: randomColorGenerator(),
            hoverBorderColor: randomColorGenerator(),
            borderWidth: 1,
            // stack: 'Stack 0',
            data:  score
          },
          {
            label: "Issued Stock <?=$rasied?>",
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            borderWidth: 1,
            // stack: 'Stack 1',
            data:  score1
          },
          {
            label: "Annual Requirement <?=$rasied?>",
            backgroundColor: randomColorGenerator1(),
            borderColor: randomColorGenerator1(),
            hoverBackgroundColor: randomColorGenerator1(),
            hoverBorderColor: randomColorGenerator1(),
            borderWidth: 1,
            // stack: 'Stack 2',
            data:  score2
          }
        ],
      };
      // var chartdata = {
      //   labels: player ,
      //   datasets : [
      //     {
      //       label: 'Indent In District',
      //       backgroundColor: 'rgba(200, 200, 200, 0.75)',
      //       borderColor: 'rgba(200, 200, 200, 0.75)',
      //       hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
      //       hoverBorderColor: 'rgba(200, 200, 200, 1)',
      //       data:  score
      //     }
      //   ]
      // };

      // var ctx =document.getElementById("mycanvas").getContext("2d");
    
      var ctx = $("#mycanvas");
      var barGraph = new Chart(ctx, {
        type: 'horizontalBar',
        "data":chartdata ,
        "options":{
           "events": ['click'],
             "elements": {
                        "rectangle": {
                            "borderWidth": 2,
                        }
                    },
                    "responsive": true,
                    "legend": {
                        "position": 'right',
                    },
               "tooltips": {
                        "mode": 'index',
                        "intersect": true
                    },       
          "title":{
                        "display":true,
                        "text":"Stock Analysis"
                    },
                    "scales": {
                        "xAxes": [{
                            // "stacked": true,
                            "ticks": {
                                "beginAtZero": true
                            },
                            "scaleLabel": {
                            "display": true,
                            "labelString": 'No Of Stock --->'
                            },
                            // "gridLines": {
                            //     "offsetGridLines": false
                            // }
                        }],
                        "yAxes": [{
                            // "stacked": true,
                            "ticks": {
                                "beginAtZero": true
                            },
                            "showDatapoints": true,
                            "scaleLabel": {
                            "display": true,
                            "labelString": '<?=$rasied?> --->'
                            },
                            //  "gridLines": {
                            //     "offsetGridLines": false
                            // }
                        }]
                    },
    }
      });
    //    
</script>