<?php
error_reporting(0);
session_start();
include '../config.php';
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
         <link href="chart/css/bootstrap.min.css" rel="stylesheet">        
        <script>
        $(document).ready(function(){
			$("#dob").Zebra_DatePicker({
			  view: 'years',format: 'd/M/Y'
			});
			});
        </script>
       
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
               
                <input type="button" name="cancel" value="Back" style="float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='../optionPage.php'"/>  
                <input type="button" name="cancel" value="Graphical View Tribe" style="margin-right: 10px; float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='graphical_view_tribal.php'"/>
                 <input type="button" name="cancel" value="Graphical View Vocational" style="margin-right: 10px; float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='graphical_view_vocational.php'"/>
                  <input type="button" name="cancel" value="Search Student" style="margin-right: -173px;float: right;
                    background-color: #428bca;margin-top: -48px;" onclick="window.location.href='index.php'"/>
                    <input type="button" name="cancel" value="Search Student" style="float: right;
                    background-color: #428bca; margin-right: 5px; margin-top: 20px;" onclick="window.location.href='index.php'"/>
            </div>
        </div>
           <br>
        <br>
           <br>
        <br>
        <br>
        <br>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 171px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #map_canvas {
    width: 100%;
    height: 900px;
}
    </style>
   <?php
      $str = "SELECT DISTINCT(`district_name`) AS dest FROM `tbl_state_district_block_odisha` order by district_name";
      $sql = mysqli_query($con, $str);
      while ($data = mysqli_fetch_array($sql)) {
        $da[]=$data['dest'];
      
     
      // SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='I' AND b.district_name='Angul' 

      $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND b.district_name='$data[dest]' AND a.gender='Male'";
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND b.district_name='$data[dest]' AND a.gender='Female'";
        $sql1 = mysqli_query($con, $str1);
        $num_row1 = mysqli_num_rows($sql1);
        $data_total_male[]=$num_row1;

        $sql2 = mysqli_query($con, $str2);
        $num_row2 = mysqli_num_rows($sql2);
        $data_total_female[]=$num_row2;
        $total=$num_row1+$num_row2;
        $dat[]=array('0'=>$data['dest'],'1'=>$num_row1,'2'=>$num_row2,'3'=>$total);
            // $my=$data['vocational_name'];
          }
          $dat_str=json_encode($dat);
         $da_str=json_encode($da);  
      // print_r($dat);
   ?>
   <!--  <div id="floating-panel">
      <input id="address" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Geocode">
    </div>
    <div id="map"></div> -->
    <div class="container">      
            <div class="panel panel-default">
            <div class="panel-heading">Graphical View Of District Wise </div>
            <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="clearfix"></div>                                
                    <canvas id="canvas_radar"></canvas>                            
                </div>
                <div class="clearfix"></div>

                <div class="container">
                  <h2>District Wise Type</h2>
                <div class="col-md-11">           
                  <table class="table table-bordered">
                     <thead>
                      <tr>
                        <th>District Wise</th>
                        <th>Total</th>
                        <th>Girl</th>
                        <th>Boy</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      for ($j=0; $j < count($dat) ; $j++) { ?>
                        <tr>
                        <td><?=ucwords($dat[$j][0])?></td>
                        
                         <td><?=ucwords($dat[$j][3])?></td>
                        <td><?=ucwords($dat[$j][2])?></td>
                        <td><?=ucwords($dat[$j][1])?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map_canvas"></div>
    
  
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHZsQ7Nr2OB8OUb0tiGB-ZZ39ORotERbE&callback=initMap">
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
       alert('Welcome Map Graphical view');
    var map;
    var elevator;
    var myOptions = {
        zoom: 8,
        center: new google.maps.LatLng(20.951666, 85.098524),
        mapTypeId: 'terrain'
    };
    map = new google.maps.Map($('#map_canvas')[0], myOptions);
    var datas=<?=$dat_str?>;
    var addresses = <?=$da_str?>;
    console.log ( datas );
    // infowindow.open(map,marker);
    for (var x = 0; x < datas.length; x++) {
      var y=datas[x][0];
     alert(y);
     if(datas[x][0]==y){
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
          if(data.status=='OK'){
           //console.log ( data );
            var p = data.results[0].geometry.location;
             var w = data.results[0].address_components[0];
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            var marker=new google.maps.Marker({
                position: latlng,
                map: map
               
            });
            wid=w.long_name;
            for (var d = 0; d < datas.length; d++) {
             if(wid==datas[d][0]){
            //alert(wid);
        //       var marker = new google.maps.Marker({position:new google.maps.LatLng(p.lat, p.lng)});
        //       marker.setMap(map);
              var infowindow = new google.maps.InfoWindow({
                content: "Name District ="+w.long_name+"<br> Boys ="+datas[d][1]+"<br> Girls ="+datas[d][2]
              });
               //alert(addresses[x]);
            infowindow.open(map,marker);
          }else if(wid=='Kendujhar'){
             var infowindow = new google.maps.InfoWindow({
                content: "Name District = Keonjhar<br> Boys ="+datas[d][1]+"<br> Girls ="+datas[d][2]
              });
               //alert(addresses[x]);
            infowindow.open(map,marker);
          }
            // }else{
            //   var infowindow = new google.maps.InfoWindow({
            //     content: "Name District = "+w.long_name+"<br> Boys = "+datas[x][1]+"<br>Girls = "+datas[x][2]
            //   });
            //    //alert(addresses[x]);
            //   infowindow.open(map,marker);
            // }
            }
          }

        });
            }
          }
          

});
    </script>

    <?php }else{
      header("location:../logout.php");
      }?>