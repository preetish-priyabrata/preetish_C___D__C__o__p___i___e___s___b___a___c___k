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
     $from_date=trim($_POST['from_date']);
    
    $to_date=trim($_POST['to_date']);
    
    $date_one=date('Y-m-d',strtotime($from_date));
    $date_two=date('Y-m-d',strtotime($to_date));
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

                 $item_names[]=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];

                 $query_list1="SELECT SUM(rhc_master_district_indent_id_details.item_quantity) FROM rhc_master_district_indent_id_details INNER JOIN rhc_master_district_indent ON rhc_master_district_indent_id_details.indent_id=rhc_master_district_indent.indent_id WHERE rhc_master_district_indent.status!='0' and rhc_master_district_indent.indent_place_raised_by='$district_id' and rhc_master_district_indent_id_details.item_code='$item_code' and rhc_master_district_indent_id_details.Item_type='$item_types' and  rhc_master_district_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                $sql_exe_list=mysqli_query($conn,$query_list1);
                $fetch=mysqli_fetch_array($sql_exe_list);

                $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_district_item_details_challan_no` WHERE `receiver_place_id`='$district_id' and `item_code`='$item_code' and `item_type`='$item_types' and `date_creation` BETWEEN '$date_one' AND '$date_two'";

                $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_district_item_details_challan_no` WHERE `receiver_place_id`='$district_id' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_types' and `date_creation` BETWEEN '$date_one' AND '$date_two'";
            
              
              $sql_exe_issued=mysqli_query($conn,$query_issued);
              $fetch_issued=mysqli_fetch_array($sql_exe_issued);

               $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
              $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

              if(!empty($fetch_issued[0])){
                $num_rows_issued[]=$fetch_issued[0]; 
              }else{
                $num_rows_issued[]="0";
              }

              if(!empty($fetch_issued[1])){
                $num_rows_receive[]=$fetch_issued[1]; 
              }else{
                $num_rows_receive[]="0";
              }
              if(!empty($fetch_issued_transit[0])){
                $num_rows_transit[]=$fetch_issued_transit[0]; 
              }else{
                $num_rows_transit[]="0";
              }
                     
                      if(!empty($fetch[0])){
                        $num_rows_indent[]=$fetch[0]; 
                      }else{
                        $num_rows_indent[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($num_rows_indent);
                $x_detail1= json_encode($num_rows_transit);
                $x_detail2= json_encode($num_rows_receive);
                $x_detail3= json_encode($num_rows_issued);
               $rasied="RHC";
               $rasied1="Indent";
                $rasied2="transit";
                 $rasied3="Receive";
                   $rasied4="Issued";
              
               
          

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
               $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  
                  $x++;
               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                  $query_list="SELECT  * FROM rhc_master_dh_block_indent_id_details INNER JOIN rhc_master_dh_block_indent ON rhc_master_dh_block_indent_id_details.indent_id=rhc_master_dh_block_indent.indent_id WHERE rhc_master_dh_block_indent.status!='0' and rhc_master_dh_block_indent.indent_place_raised_by='$block_dh_uphc' and rhc_master_dh_block_indent_id_details.item_code='$item_code' and rhc_master_dh_block_indent_id_details.Item_type='$item_types' and  rhc_master_dh_block_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                      $fetch=mysqli_fetch_array($sql_exe_list);

                    $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_dh_block_item_details_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two' ";

                    $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_dh_block_item_details_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two' ";
                 
              $sql_exe_issued=mysqli_query($conn,$query_issued);
              $fetch_issued=mysqli_fetch_array($sql_exe_issued);

               $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
              $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

              if(!empty($fetch_issued[0])){
                $num_rows_issued[]=$fetch_issued[0]; 
              }else{
                $num_rows_issued[]="0";
              }

              if(!empty($fetch_issued[1])){
                $num_rows_receive[]=$fetch_issued[1]; 
              }else{
                $num_rows_receive[]="0";
              }
              if(!empty($fetch_issued_transit[0])){
                $num_rows_transit[]=$fetch_issued_transit[0]; 
              }else{
                $num_rows_transit[]="0";
              }
                     
                      if(!empty($fetch[0])){
                        $num_rows_indent[]=$fetch[0]; 
                      }else{
                        $num_rows_indent[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($num_rows_indent);
                $x_detail1= json_encode($num_rows_transit);
                $x_detail2= json_encode($num_rows_receive);
                $x_detail3= json_encode($num_rows_issued);
               $rasied="RHC";
               $rasied1="Indent";
                $rasied2="transit";
                 $rasied3="Receive";
                   $rasied4="Issued";


              

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
         // indent_place_raised_to
                      $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  
                  $x++;
               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];

                  $query_list="SELECT * FROM rhc_master_phc_aphc_indent_id_details INNER JOIN rhc_master_phc_aphc_indent ON rhc_master_phc_aphc_indent_id_details.indent_id=rhc_master_phc_aphc_indent.indent_id WHERE rhc_master_phc_aphc_indent.status!='0' and rhc_master_phc_aphc_indent.indent_place_raised_by='$phc_aphc' and rhc_master_phc_aphc_indent_id_details.item_code='$item_code' and rhc_master_phc_aphc_indent_id_details.Item_type='$item_type'and  rhc_master_phc_aphc_indent.date_creation BETWEEN '$date_one' AND '$date_two' ";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                     $fetch=mysqli_fetch_array($sql_exe_list);

                    $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_phc_aphc_item_details_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two'";

                    $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_phc_aphc_item_details_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two'";

              $sql_exe_issued=mysqli_query($conn,$query_issued);
              $fetch_issued=mysqli_fetch_array($sql_exe_issued);

               $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
              $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

              if(!empty($fetch_issued[0])){
                $num_rows_issued[]=$fetch_issued[0]; 
              }else{
                $num_rows_issued[]="0";
              }

              if(!empty($fetch_issued[1])){
                $num_rows_receive[]=$fetch_issued[1]; 
              }else{
                $num_rows_receive[]="0";
              }
              if(!empty($fetch_issued_transit[0])){
                $num_rows_transit[]=$fetch_issued_transit[0]; 
              }else{
                $num_rows_transit[]="0";
              }
                     
                      if(!empty($fetch[0])){
                        $num_rows_indent[]=$fetch[0]; 
                      }else{
                        $num_rows_indent[]="0";
                      }
            }
                 // print_r($num_rows_forcast);
                $x_place= json_encode($item_names);
                $x_detail= json_encode($num_rows_indent);
                $x_detail1= json_encode($num_rows_transit);
                $x_detail2= json_encode($num_rows_receive);
                $x_detail3= json_encode($num_rows_issued);
               $rasied="RHC";
               $rasied1="Indent";
                $rasied2="transit";
                 $rasied3="Receive";
                   $rasied4="Issued";

                
             ?>
           <h3 class="text-center">  <?=$place_name?></h3>
     
          <?php
         
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
  var score1=(<?=$x_detail1?>);
  var score2=(<?=$x_detail2?>);
  var score3=(<?=$x_detail3?>);
  
  var chartdata = {
        labels: player ,
        datasets : [
          {
            label: ' <?=$rasied1?> value',
            backgroundColor: randomColorGenerator(),
            borderColor: randomColorGenerator(),
            hoverBackgroundColor: randomColorGenerator(),
            hoverBorderColor: randomColorGenerator(),
            borderWidth: 1,
            stack: 'Stack 1',
            data:  score
          },
          {
            label: "<?=$rasied2?> value",
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            borderWidth: 1,
            stack: 'Stack 2',
            data:  score1
          },
          {
            label: "<?=$rasied3?> value",
            backgroundColor: randomColorGenerator(),
            borderColor: randomColorGenerator(),
            hoverBackgroundColor: randomColorGenerator(),
            hoverBorderColor: randomColorGenerator(),
            borderWidth: 1,
            stack: 'Stack 3',
            data:  score2
          },
          {
            label: "<?=$rasied4?> value",
            backgroundColor: randomColorGenerator(),
            borderColor: randomColorGenerator(),
            hoverBackgroundColor: randomColorGenerator(),
            hoverBorderColor: randomColorGenerator(),
            borderWidth: 1,
            stack: 'Stack 4',
            data:  score3
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