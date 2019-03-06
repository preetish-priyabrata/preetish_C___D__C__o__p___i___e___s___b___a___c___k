<?php

error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){
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
    $hsc_ids=trim($_POST['hsc_ids']);
  
		switch ($place_id) {
      case '4':
      
      ?>
          <h3 class="text-center"> Indent Received By Bihar[BR]</h3>
          <!-- <div id="chart-1"></div> -->

  <div id="chart_div" style="width: 900px; height: 1000px;"></div>
  <canvas id="myChart" width="400" height="400"></canvas>
 <?php 
                $get_block="SELECT * FROM `rhc_master_place_district` ";
                $sql_exec_block=mysqli_query($conn,$get_block);
                echo $num_rows1=mysqli_num_rows($sql_exec_block);
                // $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                //  collecting place name 1st 
                // the put it into an array store it array
                $place_dist=array();
                while ($res_list=mysqli_fetch_assoc($sql_exec_block)) {
                   $place_name=strtoupper($res_list['district_name']);
                   $place_code=$res_list['place_district_id'];
                   $place_dist[]=array('palce_name'=>$place_name,'place_code'=>$place_code);

                }
                // print_r($place_dist);
                $dis="District";
                $dis1="No Of Times";
                $indent_details[]=array($dis, $dis1);
                $labels=array();
                $datasets=array();
                $datasets2=array();
                // $labels2=array();
                for ($i=0; $i <count($place_dist) ; $i++) { 
                   $place_district_id=$place_dist[$i]['place_code'] ;             
                    $query_list="SELECT * FROM `rhc_master_district_indent` WHERE `indent_place_raised_by`='$place_district_id' ";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      $num_rows=mysqli_num_rows($sql_exe_list);
                      $palce_name=$place_dist[$i][palce_name];
                      // array_push($indent_details,$palce_name,$num_rows);
                      $indent_details[]=array($palce_name,$num_rows);
                      $labels[]=array('label'=>$palce_name);
                      $datasets[]=array('label'=>"d1",'backgroundColor'=>"color(window.chartColors.red).alpha(0.5).rgb(255, 99, 132)",'borderColor'=>"window.chartColors.red",'borderWidth'=>"1",'data'=>$num_rows);
                      $datasets2[]=$num_rows;
                      $labels2[]=$palce_name;
                      $labes[]=array('label'=>$palce_name,'value'=>$num_rows);


                }
                $jsonEncodedData=json_encode($labes);
                // This is a simple example on how to draw a chart using FusionCharts and PHP.
// We have included includes/fusioncharts.php, which contains functions
// to help us easily embed the charts.
include("charts/src/fusioncharts.php");
// Create the chart - Column 2D Chart with data given in constructor parameter 
// Syntax for the constructor - new FusionCharts("type of chart", "unique chart id", "width of chart", "height of chart", "div id to render the chart", "type of data", "actual data")
// $columnChart = new FusionCharts("column2d", "ex1", "100%", 400, "chart-1", "json", '{  
//                 "chart":{  
//                   "caption":"Harry\'s SuperMart",
//                   "subCaption":"Top 5 stores in last month by revenue",
//                   "numberPrefix":"$",
//                   "theme":"ocean"
//                 },
//                 "data":'.json_encode($labes).'
//             }');

 $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        // Render the chart
        $columnChart->render();

// Render the chart
// $columnChart->render();
                // print_r($datasets);
                $labels21=json_encode($labels2);
                $datasets21=json_encode($datasets2);
                 $datasets1=json_encode($datasets);
                 $labels1=json_encode($labels);
                 $res=json_encode($indent_details);


          ?>
          <div id="chart-1"><!-- Fusion Charts will render here--></div>
          <?php   

        break;
			case '1':
				# code...
				 
		            $place_district_id=$district_id;
		            $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
		            $sql_exec_block=mysqli_query($conn,$get_block);
		            $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
		            $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
			?>
			<h3 class="text-center">Issued From <?=$place_name?></h3>
      <table id="example1" class="table table-bordered table-striped table-hover text-center">
        <thead>
          <tr>
          <th>Serial Nos </th>
          <th>Challan No</th>
          <th>Issued To</th>                       
          <th>Issued Date</th>
          <th>Issued Time</th>
          <!-- <th>Status</th>
          <th>Received Date</th>
          <th>Received Time</th> -->
          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $place_id=$district_id;
          $x=0;
          $query_list="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `issuer_place_id`='$place_id'  ORDER BY `slno` DESC ";
          $sql_exe_list=mysqli_query($conn,$query_list);
          while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
          $x++;
          ?>   
          <tr>
          <td><?=$x?></td>                       
          <td><?=$res_list['challen_no']?></td>
          <td>
            <?php         
              $block_id=$res_list['receiver_place_id'];
              $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
              $sql_exec_block=mysqli_query($conn,$get_block);
              
                 
             
                $dh_id=$res_list['receiver_place_id'];
                $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$dh_id'";
                $sql_exec_dh=mysqli_query($conn,$get_dh);
                
            
                $dh_id1=$res_list['receiver_place_id'];
                $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id1'";
                $sql_exec_dh1=mysqli_query($conn,$get_dh);

                $num_hos1=mysqli_num_rows($sql_exec_dh1);
                $num_block=mysqli_num_rows($sql_exec_block);
                $num_hos=mysqli_num_rows($sql_exec_dh);

                if($num_hos1!="0"){
                  $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh1);
                  echo strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';
                }
                if($num_hos!="0"){
                  $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
                   echo strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']';
                }
                if($num_block!="0"){
                  $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                  echo strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
                }
              ?>
          </td>

          <td><?=date('d-m-Y',strtotime(trim($res_list['date_creation'])));?></td>
          <td><?=date('h:i:s a',strtotime(trim($res_list['time_creation'])));?></td>
            <td> <a target="_blank" href="admin_issued_challan_district.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>                     
          </tr>
          <?php }?>
        </tbody>
      </table>
	 <?php
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
                       

		?>
			<h3 class="text-center">Issued From <?=$place_name?></h3>
      <table id="example1" class="table table-bordered table-striped table-hover text-center">
        <thead>
          <tr>
            <th>Serial Nos </th>
            <th>Challan No</th>
            <th>Issued To</th> 
            <th>Issued Date</th>
            <th>Issued Time</th>
            <!-- <th>Status</th>
            <th>Received Date</th>
            <th>Received Time</th> -->
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
        <?php 
        $place_id=$block_dh_uphc;
        $x=0;
        $query_list="SELECT * FROM `rhc_master_phc_aphc_challan_no` WHERE `issuer_place_id`='$place_id'  ORDER BY `slno` DESC ";
        $sql_exe_list=mysqli_query($conn,$query_list);
        while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
          // print_r($res_list);
        $x++;
        ?>              

        <tr>
        <td><?=$x?></td>                       
        <td><?=$res_list['challen_no']?></td>
        <td>
          <?php 

            
         $phc_id=$res_list['receiver_place_id'];
                $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
                $sql_exec_phc=mysqli_query($conn,$get_phc);
                $num_phc=mysqli_num_rows($sql_exec_phc);
                if($num_phc!=0){
          $phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
                  echo  strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';

        }   
                
                 $place_id_aphc=$res_list['receiver_place_id'];
                $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
                $sql_exec_aphc=mysqli_query($conn,$get_aphc);
                $num_aphc=mysqli_num_rows($sql_exec_aphc);
                if($num_aphc!=0){
          $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
                    echo strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
        }
          ?>
        </td>
        

        <td><?=date('d-m-Y',strtotime(trim($res_list['date_creation'])));?></td>
        <td><?=date('h:i:s a',strtotime(trim($res_list['time_creation'])));?></td>
        <td> <a target="_blank" href="admin_issued_challan_block.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td> 

        </tr>
        <?php }?>
        </tbody>
      </table>
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
            ?>
              <h3 class="text-center">Issued From <?=$place_name?></h3>
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th>Serial Nos </th>
                    <th>Challan No</th>
                    <th>Issued To</th> 
                    <th>Issued Date</th>
                    <th>Issued Time</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $place_id=$phc_aphc;
                  $x=0;
                  $query_list="SELECT * FROM `rhc_master_phc_asha_challan_no` WHERE `issuer_place_id`='$place_id'  ORDER BY `slno` DESC ";
                  $sql_exe_list=mysqli_query($conn,$query_list);
                  while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
                  $x++;
                  ?>              

                  <tr>
                    <td><?=$x?></td>                       
                    <td><?=$res_list['challen_no']?></td>
                    <td>
                      <?php
                      $receiver_id=$res_list['indent_place_raised_by'];
                      $get_phc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_phc_sub_id`='$receiver_id'";
                      $sql_exec_phc=mysqli_query($conn,$get_phc);
                      $num_no=mysqli_num_rows($sql_exec_phc);
                      if($num_no){
                        $phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);                           
                        echo $place_full_name=strtoupper($phc_fetch_detail['phc_sub_center_name']).'['.$phc_fetch_detail['place_phc_sub_id'].']';
                      }else{
                        echo "ASHA [".$res_list['indent_place_raised_by']."]";
                      }
                      ?>

                    </td>

                    <td><?=date('d-m-Y',strtotime(trim($res_list['date_creation'])));?></td>
                    <td><?=date('h:i:s a',strtotime(trim($res_list['time_creation'])));?></td>
                    <td> <a target="_blank" href="admin_issued_challan_phc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td> 
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            <?php
				  }    
                
          $place_id_aphc=$phc_aphc;
           $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
          $sql_exec_aphc=mysqli_query($conn,$get_aphc);
           $num_aphc=mysqli_num_rows($sql_exec_aphc);
          if($num_aphc!=0){
            $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
            $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
          ?>
            <h3 class="text-center">Issued From <?=$place_name?></h3>
            <table id="example1" class="table table-bordered table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th>Serial Nos </th>
                    <th>Challan No</th>
                    <th>Issued To</th> 
                    <th>Issued Date</th>
                    <th>Issued Time</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $place_id=$phc_aphc;
                  $x=0;
                  $query_list="SELECT * FROM `rhc_master_aphc_asha_challan_no` WHERE `issuer_place_id`='$place_id'  ORDER BY `slno` DESC ";
                  $sql_exe_list=mysqli_query($conn,$query_list);
                  while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
                  $x++;
                  ?>              

                  <tr>
                    <td><?=$x?></td>                       
                    <td><?=$res_list['challen_no']?></td>
                    <td>
                      <?php
                      $receiver_id=$res_list['indent_place_raised_by'];
                      $get_phc="SELECT * FROM `rhc_master_place_aphc_sub_center` WHERE `place_aphc_sub_id`='$receiver_id'";
                      $sql_exec_phc=mysqli_query($conn,$get_phc);
                      $num_no=mysqli_num_rows($sql_exec_phc);
                      if($num_no){
                        $phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);                           
                        echo $place_full_name=strtoupper($phc_fetch_detail['phc_asub_center_name']).'['.$phc_fetch_detail['place_aphc_sub_id'].']';
                      }else{
                        echo "ASHA [".$res_list['indent_place_raised_by']."]";
                      }
                      ?>

                    </td>

                    <td><?=date('d-m-Y',strtotime(trim($res_list['date_creation'])));?></td>
                    <td><?=date('h:i:s a',strtotime(trim($res_list['time_creation'])));?></td>
                    <td> <a target="_blank" href="admin_issued_challan_aphc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td> 
                  </tr>
                  <?php }?>
                </tbody>
              </table>
          <?php

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
<!-- <script src="../assert/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assert/plugins/datatables/dataTables.bootstrap.min.js"></script> -->
<script type="text/javascript">
 google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable(<?=$res?>
      //   [
      //   ['City', '2010 Population',],
      //   ['New York City, NY', 8175000],
      //   ['Los Angeles, CA', 3792000],
      //   ['Chicago, IL', 2695000],
      //   ['Houston, TX', 2099000],
      //   ['Philadelphia, PA', 1526000]
      // ]
      );

      var options = {
        title: 'Total Indent',
        width: 900,
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Indenting',
          minValue: 0
        },
        vAxis: {
          title: 'District'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
 var color = Chart.helpers.color;
        var chartdata = {
           <?=$labels1?>,
            // <?=$datasets1?>
            };

        var chartdata = {
        labels: ,
        datasets : [
          {
            label: 'Player Score',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: 
        ]
      };
      


var myBarChart = new Chart(ctx, {
    type: 'horizontalBar',
    // type: 'bar',
    data: chartdata,
   options: {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each horizontal bar to be 2px wide
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Horizontal Bar Chart'
                    }
                }
            });

</script>