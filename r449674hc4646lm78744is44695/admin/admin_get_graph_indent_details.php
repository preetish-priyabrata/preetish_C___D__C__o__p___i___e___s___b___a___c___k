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
      
      ?>
          <h3 class="text-center">  Bihar[BR]</h3>
     
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
                for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_district_id=$place_dist[$i]['place_code'] ;             
                    $query_list="SELECT * FROM `rhc_master_district_indent` WHERE `indent_place_raised_by`='$place_district_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                     //here array is created of place indented
                      $datasets2[]=$num_rows;
                      $labels2[]=$palce_name;
                      // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }
                // print_r($labels2);
                $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
               $rasied="District";
          

        break;
			case '1':
				# code...
				        $place_dist=array();
		            $place_district_id=$district_id;
		            $get_district="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
		            $sql_exec_district=mysqli_query($conn,$get_district);
		            $district_fetch_detail=mysqli_fetch_assoc($sql_exec_district);
		            $place_name1=strtoupper($district_fetch_detail['district_name']).'['.$district_fetch_detail['place_district_id'].']';
			
              
              $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_district_id`='$district_id'";
              $sql_exec_block=mysqli_query($conn,$get_block);
              
                 
             
               
                $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_district_id`='$district_id'";
                $sql_exec_dh=mysqli_query($conn,$get_dh);
                
            
               
                $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_district_id`='$district_id'";
                $sql_exec_dh1=mysqli_query($conn,$get_dh);

                $num_hos1=mysqli_num_rows($sql_exec_dh1);
                $num_block=mysqli_num_rows($sql_exec_block);
                $num_hos=mysqli_num_rows($sql_exec_dh);

                if($num_hos1!="0"){
                  while($dh_fetch_detail1=mysqli_fetch_assoc($sql_exec_dh1)){
                    $place_name=strtoupper($dh_fetch_detail1['uphc_name']);  
                    $place_code=$dh_fetch_detail1['place_uphc_id'];
                    $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                  }
                }
                if($num_hos!="0"){
                  while($dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh)){  
                     
                     $place_name=strtoupper($dh_fetch_detail['hosptial_name']);  
                    $place_code=$dh_fetch_detail['place_hostpital_id'];
                    $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);

                  }
                }
                if($num_block!="0"){
                  while($block_fetch_detail=mysqli_fetch_assoc($sql_exec_block)){
                    $place_name= strtoupper($block_fetch_detail['block_name']); 
                    $place_code=$block_fetch_detail['place_block_id'];
                    $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                  }
                }
                for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_indent_id=$place_dist[$i]['place_code'] ;   
                  $query_list="SELECT * FROM `rhc_master_dh_block_indent` WHERE `indent_place_raised_by`='$place_indent_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                       $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                     //here array is created of place indented
                      $datasets2[]=$num_rows;
                      $labels2[]=$palce_name;
                      // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }
                // print_r($labels2);
                $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
               $rasied="Block/DH/UPHC";
             ?>
          <h3 class="text-center">  <?=$place_name1?></h3>
     
          <?php 
                     
	    	break;
		case '2':                 
        $block_id=$block_dh_uphc;
        $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
        $sql_exec_block=mysqli_query($conn,$get_block);  
        $num_block=mysqli_num_rows($sql_exec_block); 

        $dh_id1=$block_dh_uphc;
        $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id1'";
        $sql_exec_dh1=mysqli_query($conn,$get_dh);
        $num_hos1=mysqli_num_rows($sql_exec_dh1); 

        if($num_block!="0"){
         	$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
       		$place_name1=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
        
        $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_block_id`='$block_id'";
        $sql_exec_phc=mysqli_query($conn,$get_phc);      
        $num_aphc=mysqli_num_rows($sql_exec_phc);
        if($num_aphc!=0){
          while($phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc)){
            $place_name= strtoupper($phc_fetch_detail['phc_name']); 
            $place_code=$phc_fetch_detail['place_phc_id'];
            $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
          }
        }   
             
        $place_id_aphc=$res_list['receiver_place_id'];
        $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_block_id`='$block_id'";
        $sql_exec_aphc=mysqli_query($conn,$get_aphc);
        $num_aphc=mysqli_num_rows($sql_exec_aphc);
        if($num_aphc!=0){          
          while($aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc)){
            $place_name= strtoupper($aphc_fetch_detail['aphc_name']); 
            $place_code=$aphc_fetch_detail['place_aphc_id'];
            $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
          }
            
        }
         for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_indent_id=$place_dist[$i]['place_code'] ;   
                   $query_list="SELECT * FROM `rhc_master_phc_aphc_indent` WHERE `indent_place_raised_by`='$place_indent_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                       $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                     //here array is created of place indented
                      $datasets2[]=$num_rows;
                      $labels2[]=$palce_name;
                      // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }

                  $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
                $rasied="PHC/APHC";
             ?>
           <h3 class="text-center">  <?=$place_name1?></h3>
     
          <?php
            }else if($num_hos1!="0"){

                $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh1);
                $place_name1=strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';

                $sql_asha_query="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$dh_id1' and `asha_top_level`='6' and `status`='1'";
              $exe_asha=mysqli_query($conn,$sql_asha_query);
              $num_no_asha=mysqli_num_rows($exe_asha);
              if($num_no_asha!=0){
                while ($res=mysqli_fetch_assoc($exe_asha)) {
                   $place_name= "ASHA "; 
                   $place_code=$res['user_mobile'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                }
              }
              for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_indent_id=$place_dist[$i]['place_code'] ;   
                  $query_list="SELECT * FROM `rhc_master_phc_asha_indent` WHERE `indent_place_raised_by`='$place_indent_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                       $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                     //here array is created of place indented
                      $datasets2[]=$num_rows;
                       $palce_name=$place_dist[$i][palce_name] .$place_dist[$i]['place_code'];
                      // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }

                $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
                $rasied="PHC/APHC";
             ?>
           <h3 class="text-center">  <?=$place_name1?></h3>
     
          <?php

            }else{
              echo "No Indent Is Received  At District Hospital";
            }
               
         
				break;
			case '3':	
				  $phc_id=$phc_aphc;
          $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
          $sql_exec_phc=mysqli_query($conn,$get_phc);
          $num_phc=mysqli_num_rows($sql_exec_phc);
          if($num_phc!=0){
  					$phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
            $place_name1= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';
           
            $get_phc1="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_phc_id`='$phc_id'";
            $sql_exec_phc1=mysqli_query($conn,$get_phc1);
            
           
              $phc_fetch_detail1=mysqli_fetch_assoc($sql_exec_phc1);  
              $num_no_phc_hsc=mysqli_num_rows($sql_exec_phc1);
               if($num_no_phc_hsc!=0){
                while ($phc_fetch_detail1=mysqli_fetch_assoc($sql_exec_phc1)) {
                   $place_name= strtoupper($phc_fetch_detail1['phc_sub_center_name']); 
                   $place_code=$phc_fetch_detail1['place_phc_sub_id'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                }                      
               }
            
              $sql_asha_query="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id` ='$phc_id' and `asha_top_level`='1' and `status`='1'";
              $exe_asha=mysqli_query($conn,$sql_asha_query);
              $num_no_asha=mysqli_num_rows($exe_asha);
              if($num_no_asha!=0){
                while ($res=mysqli_fetch_assoc($exe_asha)) {
                   $place_name= "ASHA "; 
                   $place_code=$res['user_mobile'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                }
              }
              for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_indent_id=$place_dist[$i]['place_code'] ;   
                  $query_list="SELECT * FROM `rhc_master_phc_asha_indent` WHERE `indent_place_raised_by`='$place_indent_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                       $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                     //here array is created of place indented
                      $datasets2[]=$num_rows;
                        $palce_name=$place_dist[$i][palce_name] .$place_dist[$i]['place_code'];
                      // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }
                // print_r($labels2);
                $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
                $rasied="HSC/ASHA";

             ?>
           <h3 class="text-center">  <?=$place_name1?></h3>
     
              <?php
            }
          

				   
                
          $place_id_aphc=$phc_aphc;
           $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
          $sql_exec_aphc=mysqli_query($conn,$get_aphc);
           $num_aphc=mysqli_num_rows($sql_exec_aphc);
          if($num_aphc!=0){
            $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
            $place_name1= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
            
           
            $get_phc1="SELECT * FROM `rhc_master_place_aphc_sub_center` WHERE `place_aphc_id`='$place_id_aphc'";
            $sql_exec_phc1=mysqli_query($conn,$get_phc1);
            
           
              $phc_fetch_detail1=mysqli_fetch_assoc($sql_exec_phc1);  
              $num_no_phc_hsc=mysqli_num_rows($sql_exec_phc1);
               if($num_no_phc_hsc!=0){
                while ($phc_fetch_detail1=mysqli_fetch_assoc($sql_exec_phc1)) {
                   $place_name= strtoupper($phc_fetch_detail1['aphc_sub_center_name']); 
                   $place_code=$phc_fetch_detail1['place_aphc_sub_id'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                }                      
               }
            
              $sql_asha_query="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id` ='$place_id_aphc' and `asha_top_level`='3' and `status`='1'";
              $exe_asha=mysqli_query($conn,$sql_asha_query);
              $num_no_asha=mysqli_num_rows($exe_asha);
              if($num_no_asha!=0){
                while ($res=mysqli_fetch_assoc($exe_asha)) {
                   $place_name="ASHA "; 
                   $place_code=$res['user_mobile'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                }
              }
               for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_indent_id=$place_dist[$i]['place_code'] ;   
                  $query_list="SELECT * FROM `rhc_master_aphc_asha_indent` WHERE `indent_place_raised_by`='$place_indent_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                       $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                     //here array is created of place indented
                      $datasets2[]=$num_rows;
                       $palce_name=$place_dist[$i][palce_name] .$place_dist[$i]['place_code'];
                      // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }
                // print_r($labels2);
                $x_place= json_encode($labels2);
                $x_detail= json_encode($datasets2);
                $rasied="HSC/ASHA";

             ?>
              <h3 class="text-center">  <?=$place_name1?></h3>
     
              <?php

				  }
                          
			
				break;
      case '5':

                $hsc_ids=$hsc_ids;
                $get_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE`place_phc_sub_id`='$hsc_ids'";
                $sql_exec_hsc=mysqli_query($conn,$get_hsc);
                $hsc_fetch_detail=mysqli_fetch_assoc($sql_exec_hsc);
                $place_name1=strtoupper($hsc_fetch_detail['phc_sub_center_name']).'['.$hsc_fetch_detail['place_phc_sub_id'].']';
        $sql_asha_query="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$hsc_ids' and`asha_top_level`='2' and `status`='1'";
                $exe_asha=mysqli_query($conn,$sql_asha_query);
                $num_no_asha=mysqli_num_rows($exe_asha);
                if($num_no_asha!=0){
                  while ($res=mysqli_fetch_assoc($exe_asha)) {
                     $place_name= "ASHA ";
                     $place_code=$res['user_mobile'];
                     $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);
                  }
                }
                for ($i=0; $i <count($place_dist) ; $i++) { 
                     $place_indent_id=$place_dist[$i]['place_code'] ;   
                    $query_list="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_place_raised_by`='$place_indent_id'  and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                        $sql_exe_list=mysqli_query($conn,$query_list);
                         $num_rows=mysqli_num_rows($sql_exe_list);
                        $palce_name=$place_dist[$i][palce_name] .$place_dist[$i]['place_code'];
                       //here array is created of place indented
                        $datasets2[]=$num_rows;
                        $labels2[]=$palce_name;
                        // $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                  }
                  // print_r($labels2);
                  $x_place= json_encode($labels2);
                  $x_detail= json_encode($datasets2);
                  $rasied="HSC/ASHA";

               ?>
             <h3 class="text-center">  <?=$place_name1?></h3>
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
            label: 'Indent In <?=$rasied?>',
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
        "options": {
        "scales": {
            "xAxes": [{
                "ticks": {
                    "beginAtZero": true
                },
                "scaleLabel": {
                "display": true,
                "labelString": 'No Of Times Indented --->'
                }
            }],
             "yAxes": [{
                "ticks": {
                    "beginAtZero": true
                },
                "scaleLabel": {
                "display": true,
                "labelString": '<?=$rasied?> --->'
                }
            }]
        }
    }
      });
</script>