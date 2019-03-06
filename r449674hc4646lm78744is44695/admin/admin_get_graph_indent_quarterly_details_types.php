<?php

error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){
  include "fusioncharts.php";
// print_r($_POST);
?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script> -->
<?php

	if(!empty($_POST['place_id'])){
	   $state_id=trim($_POST['state_id']);
    $district_id=trim($_POST['district_id']);
    $block_dh_uphc=trim($_POST['block_dh_uphc']);
    $phc_aphc=trim($_POST['phc_aphc']);
    $place_id=trim($_POST['place_id']);
    $years_selected=trim($_POST['years']);
    $year_array=explode('-', $years_selected);
    $year_one=$year_array[0];
    $year_two=$year_array[0];
    $quarterly_selected=trim($_POST['quarterly']);
    $quarterly_array=explode('-', $quarterly_selected);
    $quarterly_one=$quarterly_array[0];
    $quarterly_two=$quarterly_array[1];
    $date_one=$year_one."-".$quarterly_one."-"."1";
    $date_two=$year_two."-".$quarterly_two."-"."31";
    $types_item=$_POST['types_item'];
    $hsc_ids=trim($_POST['hsc_ids']);
      ?>
          <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        height: auto;

    }
    </style>

    <div id="container" >
        <canvas id="mycanvas" width="400" ></canvas>
    </div>
    
    
   
          <?php
  
		switch ($place_id) {
      case '1':
        
                $place_district_id=$district_id;
                $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
                $sql_exec_block=mysqli_query($conn,$get_block);
                $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
      ?>
          <h3 class="text-center"><?=$place_name?></h3>
     
 <?php 
         // here all district place name is store in array is checked 
        $get_block="SELECT * FROM `rhc_master_place_district` ";
         $sql_exec_block=mysqli_query($conn,$get_block);
         $num_rows1=mysqli_num_rows($sql_exec_block);
         $place_dist=array();
                while ($res_list=mysqli_fetch_assoc($sql_exec_block)) {
                   $place_name=strtoupper($res_list['district_name']);
                   $place_code=$res_list['place_district_id'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);

                }
                 $x=1;
             
               $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id' and `item_types`='$types_item'";
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

                 

                 $query_list1="SELECT SUM(rhc_master_district_indent_id_details.item_quantity) FROM rhc_master_district_indent_id_details INNER JOIN rhc_master_district_indent ON rhc_master_district_indent_id_details.indent_id=rhc_master_district_indent.indent_id WHERE rhc_master_district_indent.status!='0' and rhc_master_district_indent.indent_place_raised_by='$district_id' and rhc_master_district_indent_id_details.item_code='$item_code' and rhc_master_district_indent_id_details.Item_type='$item_types' and  rhc_master_district_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                $sql_exe_list=mysqli_query($conn,$query_list1);
                $fetch=mysqli_fetch_array($sql_exe_list);
                
                  $item_names[]=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                  //$datasets2[]=mysqli_num_rows($sql_exe_list);
               
                $query_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$place_district_id'  and `item_code`='$item_code' and `item_type`='$item_types'";
                $sql_forcast_exe=mysqli_query($conn,$query_forcast);
                $num_forcast=mysqli_num_rows($sql_forcast_exe);
                if($num_forcast!=0){
                  $fetch_forcat=mysqli_fetch_assoc($sql_forcast_exe);
                  $num_rows_forcast[]=$fetch_forcat['quantity'];
                }else if($num_forcast==0){
                  $num_rows_forcast[]="0";

                }else{
                  $num_rows_forcast[]="0";
                }
                     
                      if(!empty($fetch[0])){
                        $datasets2[]=$fetch[0]; 
                      }else{
                        $datasets2[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($datasets2);
                // $x_detail1= json_encode($num_rows_forcast);
               $rasied="RHC";
               $rasied1="ForeCast";
              
               
          

        break;
			case '2':				
            $block_id=$block_dh_uphc;
            $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
            $sql_exec_block=mysqli_query($conn,$get_block);
            
               
           
              $dh_id=$block_dh_uphc;
              $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$dh_id'";
              $sql_exec_dh=mysqli_query($conn,$get_dh);
              
          
              $dh_id1=$block_dh_uphc;
              $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id1'";
              $sql_exec_dh1=mysqli_query($conn,$get_dh);

              $num_hos1=mysqli_num_rows($sql_exec_dh1);
              $num_block=mysqli_num_rows($sql_exec_block);
              $num_hos=mysqli_num_rows($sql_exec_dh);

              if($num_hos1!="0"){
                $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh1);
                $place_name=strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';
              }
              if($num_hos!="0"){
                $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
                 $place_name=strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']';
              }
              if($num_block!="0"){
                $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                $place_name=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
              }
              $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id' and `item_types`='$types_item'";
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

                 $item_names[]=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                  $query_list="SELECT  * FROM rhc_master_dh_block_indent_id_details INNER JOIN rhc_master_dh_block_indent ON rhc_master_dh_block_indent_id_details.indent_id=rhc_master_dh_block_indent.indent_id WHERE rhc_master_dh_block_indent.status!='0' and rhc_master_dh_block_indent.indent_place_raised_by='$block_dh_uphc' and rhc_master_dh_block_indent_id_details.item_code='$item_code' and rhc_master_dh_block_indent_id_details.Item_tdate_twoype='$item_types' and  rhc_master_dh_block_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                      $fetch=mysqli_fetch_array($sql_exe_list);

                   $query_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$block_dh_uphc'  and `item_code`='$item_code' and `item_type`='$item_types'";
                  
                  $sql_forcast_exe=mysqli_query($conn,$query_forcast);
                $num_forcast=mysqli_num_rows($sql_forcast_exe);
                if($num_forcast!=0){
                  $fetch_forcat=mysqli_fetch_assoc($sql_forcast_exe);
                  $num_rows_forcast[]=$fetch_forcat['quantity'];
                }else if($num_forcast==0){
                  $num_rows_forcast[]="0";

                }else{
                  $num_rows_forcast[]="0";
                }
                     
                      if(!empty($fetch[0])){
                        $datasets2[]=$fetch[0]; 
                      }else{
                        $datasets2[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($datasets2);
                $x_detail1= json_encode($num_rows_forcast);
               $rasied="RHC";
               $rasied1="ForeCast";
              

             ?>
          <h3 class="text-center"><?=$place_name?></h3>
     
          <?php 
                     
	    	break;
		case '3':                 
            $phc_id=$phc_aphc;
                $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
                $sql_exec_phc=mysqli_query($conn,$get_phc);
                $num_phc=mysqli_num_rows($sql_exec_phc);
                if($num_phc!=0){
          $phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
                  $place_name= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';

        }    
                
                $place_id_aphc=$phc_aphc;
                $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
                $sql_exec_aphc=mysqli_query($conn,$get_aphc);
                $num_aphc=mysqli_num_rows($sql_exec_aphc);
                if($num_aphc!=0){
          $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
                    $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
        }
         $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id' and `item_types`='$types_item'";
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

             //$item_names[]=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];

               $query_list="SELECT * FROM rhc_master_phc_aphc_indent_id_details INNER JOIN rhc_master_phc_aphc_indent ON rhc_master_phc_aphc_indent_id_details.indent_id=rhc_master_phc_aphc_indent.indent_id WHERE rhc_master_phc_aphc_indent.status!='0' and rhc_master_phc_aphc_indent.indent_place_raised_by='$phc_aphc' and rhc_master_phc_aphc_indent_id_details.item_code='$item_code' and rhc_master_phc_aphc_indent_id_details.Item_type='$item_type'and  rhc_master_phc_aphc_indent.date_creation BETWEEN '$date_one' AND '$date_two' ";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                     $fetch=mysqli_fetch_array($sql_exe_list);

                  $query_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$phc_aphc' and `item_code`='$item_code' and `item_type`='$item_types'";
                  $item_names[]=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                  //$datasets2[]=mysqli_num_rows($sql_exe_list);
             
              
                 $sql_forcast_exe=mysqli_query($conn,$query_forcast);
                $num_forcast=mysqli_num_rows($sql_forcast_exe);
                if($num_forcast!=0){
                  $fetch_forcat=mysqli_fetch_assoc($sql_forcast_exe);
                  $num_rows_forcast[]=$fetch_forcat['quantity'];
                }else if($num_forcast==0){
                  $num_rows_forcast[]="0";

                }else{
                  $num_rows_forcast[]="0";
                }
                     
                      if(!empty($fetch[0])){
                        $datasets2[]=$fetch[0]; 
                      }else{
                        $datasets2[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($datasets2);
                $x_detail1= json_encode($num_rows_forcast);
               $rasied="RHC";
               $rasied1="ForeCast";
             ?>
           <h3 class="text-center">  <?=$place_name?></h3>
     
          <?php
         
				break;
			case '5':
        
          $hsc_ids=$hsc_ids;
          $get_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE`place_phc_sub_id`='$hsc_ids'";
          $sql_exec_hsc=mysqli_query($conn,$get_hsc);
          $hsc_fetch_detail=mysqli_fetch_assoc($sql_exec_hsc);
          $place_name=strtoupper($hsc_fetch_detail['phc_sub_center_name']).'['.$hsc_fetch_detail['place_phc_sub_id'].']';
      ?>
          <h3 class="text-center"><?=$place_name?></h3>
     
 <?php 
        
             
               $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id' and `item_types`='$types_item'";
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

                 

                 $query_list1="SELECT SUM(rhc_master_phc_asha_indent_id_details.item_quantity) FROM rhc_master_phc_asha_indent_id_details INNER JOIN rhc_master_phc_asha_indent ON rhc_master_phc_asha_indent_id_details.indent_id=rhc_master_phc_asha_indent.indent_id WHERE rhc_master_phc_asha_indent.status!='0' and rhc_master_phc_asha_indent.indent_place_raised_by='$hsc_ids' and rhc_master_phc_asha_indent_id_details.item_code='$item_code' and rhc_master_phc_asha_indent_id_details.Item_type='$item_types' and  rhc_master_district_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                $sql_exe_list=mysqli_query($conn,$query_list1);
                $fetch=mysqli_fetch_array($sql_exe_list);
                
                  $item_names[]=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                  //$datasets2[]=mysqli_num_rows($sql_exe_list);
               
                $query_forcast="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_id`='$hsc_ids'  and `item_code`='$item_code' and `item_type`='$item_types'";
                $sql_forcast_exe=mysqli_query($conn,$query_forcast);
                $num_forcast=mysqli_num_rows($sql_forcast_exe);
                if($num_forcast!=0){
                  $fetch_forcat=mysqli_fetch_assoc($sql_forcast_exe);
                  $num_rows_forcast[]=$fetch_forcat['quantity'];
                }else if($num_forcast==0){
                  $num_rows_forcast[]="0";

                }else{
                  $num_rows_forcast[]="0";
                }
                     
                      if(!empty($fetch[0])){
                        $datasets2[]=$fetch[0]; 
                      }else{
                        $datasets2[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($datasets2);
                // $x_detail1= json_encode($num_rows_forcast);
               $rasied="RHC";
               $rasied1="ForeCast";
              
               
          

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
  var player=(<?=$x_place?>);
  var score=(<?=$x_detail?>);
  // var score1=(<?=$x_detail1?>);
  
  var chartdata = {
        labels: player ,
        datasets : [
          {
            label: ' <?=$rasied?> value',
            backgroundColor: randomColorGenerator(),
            borderColor: randomColorGenerator(),
            hoverBackgroundColor: randomColorGenerator(),
            hoverBorderColor: randomColorGenerator(),
            data:  score
          }
        ]
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
                        "text":"Annually Indent Analysis RHC"
                    },
                    "scales": {
                        "xAxes": [{
                            // "stacked": true,
                            "ticks": {
                                "beginAtZero": true
                            },
                            "scaleLabel": {
                            "display": true,
                            "labelString": 'No Of Quantity --->'
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
                            "labelString": 'Item Name --->'
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