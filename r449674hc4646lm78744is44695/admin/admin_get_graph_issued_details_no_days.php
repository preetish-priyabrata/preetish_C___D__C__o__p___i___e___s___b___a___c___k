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
    $differenceFormat = '%a';
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
      case '4':
        $place_id=$state_id;
        $query_list="SELECT * FROM `rhc_master_district_challan_no` WHERE `issuer_place_id`='$place_id' and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
        $sql_exe_list=mysqli_query($conn,$query_list);
        while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              // $res_list['challen_no'];
             
              $indent_id=$res_list['indent_id'];
              $item_names_find[]=$res_list['indent_id'];
              $get_indent_date="SELECT * FROM `rhc_master_district_indent` WHERE `indent_id`='$indent_id' ";
              $sql_exe_indent_date=mysqli_query($conn,$get_indent_date);
              $fetch_indent_date=mysqli_fetch_assoc($sql_exe_indent_date);
               $date_indent=date_create(date('Y-m-d',strtotime(trim($fetch_indent_date['date_creation']))));
              $date_challan=date_create(date('Y-m-d',strtotime(trim($res_list['date_creation']))));
              $interval = date_diff($date_indent, $date_challan);
              //$interval = date_diff($date_indent, $date_challan);
              // print_r($interval);
                      // NO OF DAYS
                   
              $datasets2[]=$interval->format($differenceFormat);
              
              
              }
             
                $x_place= json_encode($item_names_find);
                $x_detail= json_encode($datasets2);
                $rasied="Indent Id";   
      ?>
          <h3 class="text-center">Issued From Bihar[BR]</h3>
     

               
          
<?php
        break;
      case '1':  

        $place_district_id=$district_id;
        $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
        $sql_exec_block=mysqli_query($conn,$get_block);
        $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
        $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';

        $query_list="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `issuer_place_id`='$place_district_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc ";
          $sql_exe_list=mysqli_query($conn,$query_list);
          while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
            $item_names_find[]=$indent_id=$res_list['indent_id'];
            $get_indent_date="SELECT * FROM `rhc_master_dh_block_indent` WHERE `indent_id`='$indent_id' ";
            $sql_exe_indent_date=mysqli_query($conn,$get_indent_date);
            $fetch_indent_date=mysqli_fetch_assoc($sql_exe_indent_date);
            $date_indent=date_create(date('Y-m-d',strtotime(trim($fetch_indent_date['date_creation']))));
            $date_challan=date_create(date('Y-m-d',strtotime(trim($res_list['date_creation']))));
            $interval = date_diff($date_indent, $date_challan);
            $datasets2[]=$interval->format($differenceFormat);
          }
           $x_place= json_encode($item_names_find);
           $x_detail= json_encode($datasets2);
           $rasied="Indent Id"; 
      ?>
      <h3 class="text-center">Issued From <?=$place_name?></h3>

      <?php 
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
               $place_id=$block_dh_uphc;
        
                $query_list="SELECT * FROM `rhc_master_phc_aphc_challan_no` WHERE `issuer_place_id`='$place_id' and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                $sql_exe_list=mysqli_query($conn,$query_list);
                while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
                      $item_names_find[]=$indent_id=$res_list['indent_id'];
                      $get_indent_date="SELECT * FROM `rhc_master_phc_aphc_indent` WHERE `indent_id`='$indent_id' ";
                      $sql_exe_indent_date=mysqli_query($conn,$get_indent_date);
                      $fetch_indent_date=mysqli_fetch_assoc($sql_exe_indent_date);
                      $date_indent=date_create(date('Y-m-d',strtotime(trim($fetch_indent_date['date_creation']))));
                      $date_challan=date_create(date('Y-m-d',strtotime(trim($res_list['date_creation']))));
                      $interval = date_diff($date_indent, $date_challan);
                      $datasets2[]=$interval->format($differenceFormat);
                }
                 $x_place= json_encode($item_names_find);
                 $x_detail= json_encode($datasets2);
                 $rasied="Indent Id"; 
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
            $place_id=$phc_aphc;
                  $x=0;
                  $query_list="SELECT * FROM `rhc_master_phc_asha_challan_no` WHERE `issuer_place_id`='$place_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc ";
                  $sql_exe_list=mysqli_query($conn,$query_list);
                  while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
                    $item_names_find[]=$indent_id=$res_list['indent_id'];
                    $get_indent_date="SELECT * FROM `rhc_master_phc_asha_indent` WHERE `indent_id`='$indent_id' ";
                    $sql_exe_indent_date=mysqli_query($conn,$get_indent_date);
                    $fetch_indent_date=mysqli_fetch_assoc($sql_exe_indent_date);
                    $date_indent=date_create(date('Y-m-d',strtotime(trim($fetch_indent_date['date_creation']))));
                    $date_challan=date_create(date('Y-m-d',strtotime(trim($res_list['date_creation']))));
                    $interval = date_diff($date_indent, $date_challan);

                  $datasets2[]=$interval->format($differenceFormat);
                }
                 $x_place= json_encode($item_names_find);
                 $x_detail= json_encode($datasets2);
                 $rasied="Indent Id"; 

          }else{
              $place_id_aphc=$phc_aphc;
              $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
              $sql_exec_aphc=mysqli_query($conn,$get_aphc);
              $num_aphc=mysqli_num_rows($sql_exec_aphc);
              if($num_aphc!=0){
                $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
                $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
                  $place_id=$phc_aphc;
                  $x=0;
                  $query_list="SELECT * FROM `rhc_master_aphc_asha_challan_no` WHERE `issuer_place_id`='$place_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc ";
                  $sql_exe_list=mysqli_query($conn,$query_list);
                  while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
                    $item_names_find[]=$indent_id=$res_list['indent_id'];
                      $get_indent_date="SELECT * FROM `rhc_master_aphc_asha_indent` WHERE `indent_id`='$indent_id' ";
                      $sql_exe_indent_date=mysqli_query($conn,$get_indent_date);
                      $fetch_indent_date=mysqli_fetch_assoc($sql_exe_indent_date);
                      $date_indent=date_create(date('Y-m-d',strtotime(trim($fetch_indent_date['date_creation']))));
                      $date_challan=date_create(date('Y-m-d',strtotime(trim($res_list['date_creation']))));
                      $interval = date_diff($date_indent, $date_challan);
                      $datasets2[]=$interval->format($differenceFormat);
                  }
                   $x_place= json_encode($item_names_find);
                   $x_detail= json_encode($datasets2);
                   $rasied="Indent Id"; 

              }
          }
           ?>
            <h3 class="text-center">Issued From <?=$place_name?></h3>
            <?php
        break;
      case '5':
        $hsc_ids=$hsc_ids;
        $get_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE`place_phc_sub_id`='$hsc_ids'";
        $sql_exec_hsc=mysqli_query($conn,$get_hsc);
        $hsc_fetch_detail=mysqli_fetch_assoc($sql_exec_hsc);
        $place_name=strtoupper($hsc_fetch_detail['phc_sub_center_name']).'['.$hsc_fetch_detail['place_phc_sub_id'].']';
       
        $query_list="SELECT * FROM `rhc_master_asha_challan_no` WHERE `issuer_place_id`='$hsc_ids' and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
        $sql_exe_list=mysqli_query($conn,$query_list);
        while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              // $res_list['challen_no'];
             
              $indent_id=$res_list['indent_id'];
              $item_names_find[]=$res_list['indent_id'];
              $get_indent_date="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_id`='$indent_id' ";
              $sql_exe_indent_date=mysqli_query($conn,$get_indent_date);
              $fetch_indent_date=mysqli_fetch_assoc($sql_exe_indent_date);
               $date_indent=date_create(date('Y-m-d',strtotime(trim($fetch_indent_date['date_creation']))));
              $date_challan=date_create(date('Y-m-d',strtotime(trim($res_list['date_creation']))));
              $interval = date_diff($date_indent, $date_challan);
              //$interval = date_diff($date_indent, $date_challan);
              // print_r($interval);
                      // NO OF DAYS
                   
              $datasets2[]=$interval->format($differenceFormat);
              
              
              }
             
                $x_place= json_encode($item_names_find);
                $x_detail= json_encode($datasets2);
                $rasied="Indent Id";   
      ?>
         <h3 class="text-center">Issued From <?=$place_name?></h3>            
          
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
  var chartdata = {
        labels: player ,
        datasets : [
          {
            label: 'Raised Indent ',
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
                        "text":"Issued Analysis RHC"
                    },
                    "scales": {
                        "xAxes": [{
                            // "stacked": true,
                            "ticks": {
                                "beginAtZero": true
                            },
                            "scaleLabel": {
                            "display": true,
                            "labelString": 'No Of Days --->'
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