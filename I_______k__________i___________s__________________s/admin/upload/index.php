<?php
session_start();
include '../config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
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
        <script>
        $(document).ready(function() {
	$('#example').DataTable();
} );
        </script>
        <!--Data Table End-->
        <script>
        function showBlock(str)
		{
			 if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("block_interface").innerHTML = xmlhttp.responseText;
                    }
                }


                xmlhttp.open("GET", "ajax/search_block.php?dist="+str, true);
                xmlhttp.send();	
		}
        </script>
    </head>

    <body>
        <div id="wrapper">
			<form action="" method="post" enctype="multipart/form-data">
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
                <input type="submit" name="submit" value="Serach"/>
                <input type="button" name="back" value="Cancel" onclick="window.location.href='../optionPage.php'"/>
            </fieldset>    
			</form>
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