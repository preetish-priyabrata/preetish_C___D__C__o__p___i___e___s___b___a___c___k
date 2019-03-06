<?php
error_reporting(0);
session_start();
include '../config.php';

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
                <form action="" method="post" enctype="multipart/form-data">
                <input type="button" name="cancel" value="Back" style="float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='../optionPage.php'"/>  
                <input type="button" name="cancel" value="Graphical View Tribe" style="margin-right: 10px; float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='graphical_view_tribal.php'"/>
                 <input type="button" name="cancel" value="Graphical View Vocational" style="margin-right: 10px; float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='graphical_view_vocational.php'"/>
                  <input type="button" name="cancel" value="map" style="margin-right: 10px; float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='map_view.php'"/>
                <fieldset>
                    <legend>Search Student</legend>
                    
                    <div>
                        <select class="select" style="height:40px;" name="dist" id="dist" onchange="showBlock(this.value)">
                            <option value="">-Select District-</option>
                            <option value="all">All</option>
                            <?php
                            $str = "SELECT DISTINCT(`district_name`) AS dest FROM `tbl_state_district_block_odisha` order by district_name";
                            $sql = mysqli_query($con, $str);
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?php echo $data['dest']; ?>"><?php echo $data['dest']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="block_interface">
                        <select class="select" style="height:40px;" name="block" id="block">
                            <option value="">-Select Block-</option>
                            <?php
                            $str = "SELECT `block_name` FROM `tbl_state_district_block_odisha` ORDER BY `block_name` ";
                            $sql = mysqli_query($con,$str);
                            while($data = mysqli_fetch_array($sql))
                            {
                            ?>
                            <option><?php echo $data['block_name'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                        
                        </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="select" style="height:40px;" name="tribe" id="tribe">
                        <option value="">-Select Tribe-</option>
                        <optgroup label="Primitive Tribes">
                        <?php
                        $str = "SELECT * FROM `primitive_tribe` ORDER BY `primitive_tribe`";
                        $sql = mysqli_query($con,$str);
                        while($data = mysqli_fetch_array($sql))
                        {
                        ?>
                        <option><?php echo $data['primitive_tribe'];?></option>
                        <?php
                        }
                        ?>
                        </optgroup>
                        <optgroup label="Scheduled Tribes">
                        <?php
                        $str = "SELECT * FROM `scheduled_tribe` ORDER BY`scheduled_tribe`";
                        $sql = mysqli_query($con,$str);
                        while($data = mysqli_fetch_array($sql))
                        {
                        ?>
                        <option><?php echo $data['scheduled_tribe'];?></option>
                        <?php
                        }
                        ?>
                        </optgroup>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="select" style="height:40px;" name="dialect" id="dialect">
                        <option value="">-Select Dialect-</option>
                        <?php
                        $str = "SELECT * FROM `dialect` ORDER BY `dialect`";
                        $sql = mysqli_query($con,$str);
                        while($data = mysqli_fetch_array($sql))
                        {
                        ?>
                        <option><?php echo $data['dialect']?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    
                    <div>
                    <select class="select" style="height:40px;" name="join_class" id="join_class">
                        <option value="">-Select Join class-</option>
                        <option>I</option>
                        <option>II</option>
                        <option>III</option>
                        <option>IV</option>
                        <option>V</option>
                        <option>VI</option>
                        <option>VII</option>
                        <option>VIII</option>
                        <option>IX</option>
                        <option>X</option>
                        <option value="2 Science">+2 Science</option>
                        <option value="2 Commerce">+2 Commerce</option>
                        <option value="2 Arts">+2 Arts</option>
                        <option value="3 Science">+3 Science</option>
                        <option value="3 Commerce">+3 Commerce</option>
                        <option value="3 Arts">+3 Arts</option>
                        <option value="pg">Post graduation</option>  
                        <option>PhD Scholar</option>
                        <option>ITI</option>
                        <option>DIPLOMA</option>
                        <option>B-TECH</option>
                        <option>M-TECH</option>
                        <option>NURSHING</option>
                        <option>MBBS</option>
                        <option>MBA</option>
                        <option>BBA</option>
                        <option>BCA</option>
                        <option>MCA</option>
                        <option>BIO-TECH</option>
                        <option>LAW</option>
                        <option>FILM And MEDIA</option>
                        <option>FASHION TECHONLOGY</option>
                        <option>DENTAL SCIENCE(BDS)</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <select class="select" style="height:40px;" name="vocational" id="vocational">
                    <option value="">-Select Vocational-</option>
                    <?php
                    $str = "SELECT * FROM `vocational` ORDER BY vocational_name";
                    $sql = mysqli_query($con,$str);
                    while($data = mysqli_fetch_array($sql))
                    {
                    ?>
                    <option><?php echo $data['vocational_name'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                     <select class="select" style="height:40px;" name="gender" id="gender">            	 <option value="">-Select Gender-</option>
                     <option>Male</option>
                     <option>Female</option>
                     </select> 
                     &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="dob" id="dob" placeholder="Enter Date of Birth" />
                    
                   </div>
                   <div>
                   <input type="text" name="num_std" id="num_std" placeholder="Enter Number of Student" />
                   &nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text" name="age_from" id="age_from" placeholder="Enter Age From" onblur="placeValue(this.value)" />
                   &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="age_to" id="age_to" onblur="placeValue2(this.value)" placeholder="Enter Age To" />       			&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="name" id="name" placeholder="Enter Name" />
                    </div>
                    <input type="submit" name="submit" value="Search"/>
                    <input type="button" name="back" value="Cancel" onclick="window.location.href='../optionPage.php'"/>
                </fieldset>    
                </form>
            </div>
        </div>
        <div id="txtHint" >
			<?php include 'search_student.php';?>
        </div>

    </body>
    <script>
    function placeValue(str)
	{
		var age_to = document.getElementById('age_to');
		if(age_to.value=="")
		{
			age_to.value=str;
			return false;	
		}
	}
	function placeValue2(str)
	{
		var age_from = document.getElementById('age_from');
		if(age_from.value=="")
		{
			age_from.value=str;
			return false;	
		}
	}
    </script>
</html>