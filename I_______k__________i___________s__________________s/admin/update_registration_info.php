<?php
error_reporting(0);
session_start();
include '../config.php';
if($_SESSION['updation_user_id'])
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
        	<div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="button" name="cancel" value="Back" style="float:right; background-color:#428bca; margin-top:20px;" onclick="window.location.href='../optionPage.php'"/>
                <fieldset>
                    <legend>Search Student</legend>
                    <div>
                    <select class="select" style="height:40px;" name="class" id="class" onchange="showsection(this.value);">
                        <option value="">-Select class-</option>
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
                    <select class="select" style="height:40px;" name="section" id="section">
                    <option value="">-Select section-</option>
                    
                    </select>
                    
                    
                     
                    </div>
                    <input type="submit" name="submit" value="Search"/>
                    <input type="button" name="back" value="Cancel" onclick="window.location.href='../optionPage.php'"/>
                </fieldset>    
                </form>
            </div>
        </div>
        <div id="txtHint" >
			<?php include 'updt_search_student.php';?>
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
<?php
}
?>