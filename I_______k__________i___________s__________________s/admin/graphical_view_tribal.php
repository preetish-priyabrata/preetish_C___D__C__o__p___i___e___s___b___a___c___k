<?php
error_reporting(0);
session_start();
include 'config.php';
if ($_SESSION['user_id'])
  {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>KISS</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="dtpicker/css/metallic.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="dtpicker/jquery.min.js"></script>
        <script type="text/javascript" src="dtpicker/javascript/zebra_datepicker.js"></script>
                
        <script>
        $(document).ready(function(){
			$("#dob").Zebra_DatePicker({
			  view: 'years',format: 'd/M/Y'
			});
			});
        </script>
       <link href="chart/css/bootstrap.min.css" rel="stylesheet">

    <link href="chart/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="chart/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="chart/css/custom.css" rel="stylesheet">
    <link href="chart/css/icheck/flat/green.css" rel="stylesheet">


    <script src="chart/js/jquery.min.js"></script>
        <!--Data table-->
        <link href="data_tables/jquery.dataTables.css" rel="stylesheet" type="text/css" />
        <link href="data_tables/shCore.css" rel="stylesheet" type="text/css" />
        <link href="data_tables/demo.css" rel="stylesheet" type="text/css" />
        <script src="data_tables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="data_tables/shCore.js" type="text/javascript"></script>
        <script src="data_tables/demo.js" type="text/javascript"></script>
        <script src="ajax/ajax js/ajax_js.js" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
	$('#example').DataTable();
} );
        </script>
        <!--Data Table End-->
        
        <style>
		.records
		{
			background:none; 
			border:none;
		}
		.table-bordered {
			    border: 1px solid #ddd;
			    font-size: 1.3em;
			}
		</style>
        <script type="text/javascript">
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        if($(this).attr("id")=="activity"){
            $("#act").toggle();
        }
        
    });
});
</script>
        <script>
		function showactivities()
		{
			document.getElementById("act").style.display="block";
			document.getElementById("close").style.display="block";
		}
		function close()
		{
			document.getElementById("act").style.display="none";
		}
		</script>
    </head>

    <body>
    
    	
        
        
    	
        <div class="navbar navbar-default navbar-fixed-top">
        
        <?php include 'header.php';?>
        </div>
        
        <div id="wrapper">
        	<div class="">
        	<input type="button" name="cancel" value="Back" style="float: right; background-color: #428bca; margin-top: -48px; margin-right: 99px;" onclick="window.location.href='../optionPage.php'"/>  
                <input type="button" name="cancel" value="map" style="margin-right: 10px; float:right; background-color:#428bca; margin-top: -48px;" onclick="window.location.href='map_view.php'"/>
                <input type="button" name="cancel" value="Search Student" style="margin-right: -173px;float: right;
                    background-color: #428bca;margin-top: -48px;" onclick="window.location.href='index.php'"/>
            <input type="button" name="cancel" value="Graphical View Vocational" style="margin-right: -451px;float: right;
                    background-color: #428bca;margin-top: -48px;" onclick="window.location.href='graphical_view_vocational.php'"/>
                 

                     <div class="clearfix"></div>
					
			</div>
        </div>

        <?php
        
                        $str_tribe = "SELECT * FROM `primitive_tribe` ORDER BY `primitive_tribe`";
                        $sql = mysqli_query($conn,$str_tribe);
                        while($data = mysqli_fetch_array($sql))
                        {
                        	$data_re[]=$data['primitive_tribe'];
                        	          
            				$str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND b.tribe_type='$data[primitive_tribe]' AND a.gender='Male'";
            				$str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND b.tribe_type='$data[primitive_tribe]' AND a.gender='Female'";
            				

                    		$sql1 = mysqli_query($conn, $str1);
                    		$num_row1 = mysqli_num_rows($sql1);
                    		$data_total_male[]=$num_row1;

                     		$sql2 = mysqli_query($conn, $str2);
                    		$num_row2 = mysqli_num_rows($sql2);
                    		$data_total_female[]=$num_row2;
                    		$data_total[]=$num_row2+$num_row1;
                    		
                    		
                        }
                       	
                       	$total_rel=json_encode($data_total);
                        $male=json_encode($data_total_male);
                        $rel= json_encode($data_re);
                      
                        $girl=json_encode($data_total_female);

                       $str_schedu = "SELECT * FROM `scheduled_tribe` ORDER BY`scheduled_tribe`";
                        $sql_str_schedu = mysqli_query($conn,$str_schedu);
                        while($data_schedu = mysqli_fetch_array($sql_str_schedu))
                        {
                        
                        	$datas_schedu[]=$data_schedu['scheduled_tribe'];
                        	         
            				$str1_schedu = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND b.tribe_type='$data_schedu[scheduled_tribe]' AND a.gender='Male'";
            				$str2_schedu = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND b.tribe_type='$data_schedu[scheduled_tribe]' AND a.gender='Female'"; 
            				
                    		$sql1_schedu = mysqli_query($conn, $str1_schedu);
                    		$num_row1_schedu = mysqli_num_rows($sql1_schedu);
                     		$sql2_schedu = mysqli_query($conn, $str2_schedu);
                    		$num_row2_schedu = mysqli_num_rows($sql2_schedu);
                    		
                    		$data_total_male_schedu[]=$num_row1_schedu;
                    		$data_total_female_schedu[]=$num_row2_schedu;
                    		$data_total_schedu[]=$num_row2_schedu+$num_row1_schedu;
                        }
                       
                        $male_schedu=json_encode($data_total_male_schedu);
                        $schedu= json_encode($datas_schedu);
                        $data_total_schedu1= json_encode($data_total_schedu);
                       
                        $girl_schedu=json_encode($data_total_female_schedu);

                        ?>
        	<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                	            <h2>Graphical View Of Tribes</h2>
                    		        
                                <div class="clearfix"></div>
                            </div>
                           	<div class="x_content">
                                <div id="mainb" style="height:350px;"></div>
                               


                                <div class="container">
								  <h2>Primitive Tribes</h2>
								           
								  <table class="table table-bordered">
								    <thead>
								      <tr>
								        <th>Primitive Tribe Name</th>
								        <th>Total</th>
								        <th>Girl</th>
								        <th>Boy</th>
								      </tr>
								    </thead>
								    <tbody>
								      <?php 
								      for ($i=0; $i < count($data_re) ; $i++) { ?>
								      	<tr>
								        <td><?=ucwords($data_re[$i])?></td>
								        <td><?=($data_total[$i])?></td>
								        <td><?=($data_total_female[$i])?></td>
								        <td><?=($data_total_male[$i])?></td>
								      </tr>
								    <?php } ?>
								    </tbody>
								  </table>
								</div>

								 <div class="clearfix"></div>
                                <div id="mainb1" style="height:350px;"></div>

                                <div class="clearfix"></div>

                                <div class="container">
								  <h2>Scheduled Tribe</h2>
								             
								  <table class="table table-bordered">
								     <thead>
								      <tr>
								        <th>Scheduled Tribe Name</th>
								        <th>Total</th>
								        <th>Girl</th>
								        <th>Boy</th>
								      </tr>
								    </thead>
								    <tbody>
								      <?php 
								      for ($j=0; $j < count($datas_schedu) ; $j++) { ?>
								      	<tr>
								        <td><?=ucwords($datas_schedu[$j])?></td>
								        
								         <td><?=ucwords($data_total_schedu[$j])?></td>
								        <td><?=ucwords($data_total_female_schedu[$j])?></td>
								        <td><?=ucwords($data_total_male_schedu[$j])?></td>
								      </tr>
								    <?php } ?>
								    </tbody>
								  </table>
								</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	
        	
    </body>
     <script src="chart/js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="chart/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="chart/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="chart/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="chart/js/icheck/icheck.min.js"></script>

    <script src="chart/js/custom.js"></script>

    <!-- echart -->
    <script src="chart/js/echart/echarts-all.js"></script>
    <script src="chart/js/echart/green.js"></script>
     <script>
        var myChart9 = echarts.init(document.getElementById('mainb'), theme);
        myChart9.setOption({
            title: {
                text: 'Primitive Tribes',
                subtext: ''
            },
            //theme : theme,
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Girl', 'Boy','Total']
            },
            toolbox: {
                show: false
            },
            calculable: false,
            xAxis: [
                {
                    type: 'category',
                    data: <?=$rel?>
            }
        ],
            yAxis: [
                {
                    type: 'value'
            }
        ],
            series: [
                {
                    name: 'Girl',
                    type: 'bar',
                    data: <?=$girl?>,
                    // markPoint: {
                    //     data: [
                    //         {
                    //             type: 'max',
                    //             name: '???'
                    //         },
                    //         {
                    //             type: 'min',
                    //             name: '???'
                    //         }
                    // ]
                    // },
                    // markLine: {
                    //     data: [
                    //         {
                    //             type: 'average',
                    //             name: '???'
                    //         }
                    // ]
                    // }
            },
                {
                    name: 'Boy',
                    type: 'bar',
                    data: <?=$male?>,
                    // markPoint: {
                    //     data: [
                    //         {
                    //             name: 'sales',
                    //             value: 182.2,
                    //             xAxis: 7,
                    //             yAxis: 183,
                    //             symbolSize: 18
                    //         },
                    //         {
                    //             name: 'purchases',
                    //             value: 2.3,
                    //             xAxis: 11,
                    //             yAxis: 3
                    //         }
                    // ]
                    // },
                    // markLine: {
                    //     data: [
                    //         {
                    //             type: 'average',
                    //             name: '???'
                    //         }
                    // ]
                    // }
            },
            {
                    name: 'Total',
                    type: 'bar',
                    data: <?=$total_rel?>,
                    // markPoint: {
                    //     data: [
                    //         {
                    //             name: 'sales',
                    //             value: 182.2,
                    //             xAxis: 7,
                    //             yAxis: 183,
                    //             symbolSize: 18
                    //         },
                    //         {
                    //             name: 'purchases',
                    //             value: 2.3,
                    //             xAxis: 11,
                    //             yAxis: 3
                    //         }
                    // ]
                    // },
                    // markLine: {
                    //     data: [
                    //         {
                    //             type: 'average',
                    //             name: '???'
                    //         }
                    // ]
                    // }
            }

        ]
        });
        var myChart19 = echarts.init(document.getElementById('mainb1'), theme);
        myChart19.setOption({
            title: {
                text: 'Scheduled Tribes',
                subtext: ''
            },
            //theme : theme,
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Boy','Total', 'Girl']
            },
            toolbox: {
                show: false
            },
            calculable: false,
            xAxis: [
                {
                    type: 'category',
                    data: <?=$schedu?>
            }
        ],
            yAxis: [
                {
                    type: 'value'
            }
        ],
            series: [
                {
                    name: 'Boy',
                    type: 'bar',
                    data: <?=$male_schedu?>,
                    // markPoint: {
                    //     data: [
                    //         {
                    //             type: 'max',
                    //             name: '???'
                    //         },
                    //         {
                    //             type: 'min',
                    //             name: '???'
                    //         }
                    // ]
                    // },
                    // markLine: {
                    //     data: [
                    //         {
                    //             type: 'average',
                    //             name: '???'
                    //         }
                    // ]
                    // }
            },
              {
                    name: 'Total',
                    type: 'bar',
                    data: <?=$data_total_schedu1?>,
                    // markPoint: {
                    //     data: [
                    //         {
                    //             name: 'sales',
                    //             value: 182.2,
                    //             xAxis: 7,
                    //             yAxis: 183,
                    //             symbolSize: 18
                    //         },
                    //         {
                    //             name: 'purchases',
                    //             value: 2.3,
                    //             xAxis: 11,
                    //             yAxis: 3
                    //         }
                    // ]
                    // },
                    // markLine: {
                    //     data: [
                    //         {
                    //             type: 'average',
                    //             name: '???'
                    //         }
                    // ]
                    // }
            },
                {
                    name: 'Girl',
                    type: 'bar',
                    data: <?=$girl_schedu?>,
                    // markPoint: {
                    //     data: [
                    //         {
                    //             name: 'sales',
                    //             value: 182.2,
                    //             xAxis: 7,
                    //             yAxis: 183,
                    //             symbolSize: 18
                    //         },
                    //         {
                    //             name: 'purchases',
                    //             value: 2.3,
                    //             xAxis: 11,
                    //             yAxis: 3
                    //         }
                    // ]
                    // },
                    // markLine: {
                    //     data: [
                    //         {
                    //             type: 'average',
                    //             name: '???'
                    //         }
                    // ]
                    // }
            }
        ]
        });
</script>
</html>
<?php }else{
	header("location:../logout.php");
}

	?>