<?php
error_reporting(0);
session_start();

if ($_SESSION['user_id'])
  {
    include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>KISS</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                
       
            <link href="chart/css/bootstrap.min.css" rel="stylesheet">

    <link href="chart/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="chart/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="chart/css/custom.css" rel="stylesheet">
    <link href="chart/css/icheck/flat/green.css" rel="stylesheet">


    <script src="chart/js/jquery.min.js"></script>

           <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
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
            #chartdiv {
    width       : 100%;
    height      : 500px;
    font-size   : 11px;
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
        	<input type="button" name="cancel" value="Back" style="float: right; background-color: #428bca; margin-top: -48px; margin-right: 43px;" onclick="window.location.href='../optionPage.php'"/>  
                <input type="button" name="cancel" value="map" style="margin-right: -38px; float:right; background-color:#428bca; margin-top: -48px;" onclick="window.location.href='map_view.php'"/>
                <input type="button" name="cancel" value="Search Student" style="margin-right: -222px;float: right;
					background-color: #428bca;margin-top: -48px;" onclick="window.location.href='index.php'"/>
            <input type="button" name="cancel" value="Graphical View Tribe" style="margin-right: -451px;float: right;
                    background-color: #428bca;margin-top: -48px;" onclick="window.location.href='graphical_view_tribal.php'"/>
					 <div class="clearfix"></div>
			</div>
        </div>

        <?php
        
                        $str_vocational = "SELECT * FROM `vocational` ORDER BY vocational_name";
                        $sql = mysqli_query($conn,$str_vocational);
                        while($data = mysqli_fetch_array($sql))
                        {
                            
                        	$data_re[]=$data['vocational_name'];
                        	$total="SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND c.vocational='$data[vocational_name]' ";         
            				$str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND c.vocational='$data[vocational_name]' AND a.gender='Male'";
            				$str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND c.vocational='$data[vocational_name]' AND a.gender='Female'";
            				
                            $sql12 = mysqli_query($conn, $total);
                            $num_row11 = mysqli_num_rows($sql12);
                            $data_total[]=$num_row11;

                    		$sql1 = mysqli_query($conn, $str1);
                    		$num_row1 = mysqli_num_rows($sql1);
                    		$data_total_male[]=$num_row1;

                     		$sql2 = mysqli_query($conn, $str2);
                    		$num_row2 = mysqli_num_rows($sql2);
                    		$data_total_female[]=$num_row2;
                            $my=$data['vocational_name'];
                    		//$data_total[]=$num_row2+$num_row1;
                    		$data_array[]=array('Vocational'=>$my,'Boys'=>$num_row1,'Girls'=>$num_row2);
                    		
                        }
                       	//print_r($_data_total);
                         $total_nex=json_encode($data_array);
                       	$total_rel=json_encode($data_total);
                        $male=json_encode($data_total_male);
                         $rel= json_encode($data_re);
                      
                       $girl=json_encode($data_total_female);

                       
                        //SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='I' AND c.vocational='Bakery' 
                        ?>
<script>
     var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "dataProvider": <?=$total_nex?>,
    "valueAxes": [{
       // "unit": "%",
        "position": "left",
        "title": "No Of Student Present",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "No Of Student [[category]] (Girl): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "Girls",
        "type": "column",
        "valueField": "Girls"
    }, {
        "balloonText": "No Of Student [[category]] (Boy): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "Boys",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "Boys"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "Vocational",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
        "enabled": true
     }

});
     </script> 
                
    <div class="container">      
            <div class="panel panel-default">
            <div class="panel-heading">Graphical View Of Vocational </div>
            <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="clearfix"></div>                                
                    <canvas id="canvas_radar"></canvas>                            
                </div>
                <div class="clearfix"></div>

                <div class="container">
                  <h2>Vocational Type</h2>
                             
                  <table class="table table-bordered">
                     <thead>
                      <tr>
                        <th>Vocational</th>
                        <th>Total</th>
                        <th>Girl</th>
                        <th>Boy</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      for ($j=0; $j < count($data_re) ; $j++) { ?>
                        <tr>
                        <td><?=ucwords($data_re[$j])?></td>
                        
                         <td><?=ucwords($data_total[$j])?></td>
                        <td><?=ucwords($data_total_female[$j])?></td>
                        <td><?=ucwords($data_total_male[$j])?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="panel panel-default">
                        <div class="panel-heading">ACCOUNT OPEN REPORT</div>
                            <div class="panel-body">
                                <div id="chartdiv"></div>
                            </div>
                        </div>
    </div>
            	
       	
        	<script src="chart/js/bootstrap.min.js"></script>

    <script src="chart/js/nprogress.js"></script>
    <!-- chart js --><!-- <script src="chart/js/chartjs/chart.min.js"></script>-->
    <!-- bootstrap progress js -->
    <script src="chart/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="chart/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="chart/js/icheck/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
    <script src="chart/js/custom.js"></script>
     <script>
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100)
        };
        var ctx = document.getElementById("canvas_radar");
        var data = {
            labels: <?=$rel?>,
            datasets: [
                {
                    label: "Female",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: <?=$girl?>
                },
                {
                    label: "Male",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(255,99,132,1)",
                    data: <?=$male?>
                }
            ]
        };
            var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: data,
        options: {
            scale: {
                reverse: true,
                ticks: {
                    beginAtZero: true
                }
            }
    }
    });




        



    </script>
    </body>
    
</html>
<?php }else{
	header("location:../logout.php");
}

	?>