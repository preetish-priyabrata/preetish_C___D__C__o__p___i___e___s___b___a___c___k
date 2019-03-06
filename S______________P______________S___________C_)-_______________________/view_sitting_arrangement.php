<?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['preexam_user'])
{
	
	$room_no=$_REQUEST['room_no'];
	$row_no = $_REQUEST['row_no'];
	$curr_set = $_REQUEST['starting_set'];
	
	$curr_roll = $_REQUEST['starting_roll_no'];
	
	$qry_roll_prefix="SELECT `rollno_prefix` FROM `preexam_rollno_status` WHERE `exam_name`='$_SESSION[exam]'";
	$sql_roll_prefix=mysqli_query($conn, $qry_roll_prefix);
	$res_roll_prefix=mysqli_fetch_array($conn, $sql_roll_prefix);
	$rollno_prefix = $res_roll_prefix["rollno_prefix"];
	
	$colmn_no = $_REQUEST['col_no'];
	
	$qry_chk="SELECT * FROM `preexam_sitting_arrangement_info` WHERE `exam_name`='$_SESSION[exam]' AND `center_name`='$_SESSION[center]' AND `room_no`='$room_no'";
	$sql_chk=mysqli_query($conn, $qry_chk);
	$chk_num_rows=mysqli_num_rows($sql_chk);
	
	if($chk_num_rows==0)
	{
		$qry_insert="INSERT INTO `preexam_sitting_arrangement_info`(`slno`, `exam_name`, `center_name`, `room_no`, `no_of_row`, `no_of_column`, `starting_rollno`, `starting_set`) VALUES (NULL, '$_SESSION[exam]', '$_SESSION[center]', '$room_no', '$row_no', '$colmn_no', '$curr_roll', '$curr_set')";
		$sql_insert=mysqli_query($conn, $qry_insert);
?>
<script>
function printout() {
printDivCSS = new String ('<link href="css/bootstrap.min.css" rel="stylesheet" /> <link href="css/style_avi.css" rel="stylesheet" />')
var newWindow = window.open();
    newWindow.document.write(printDivCSS + document.getElementById("printable").innerHTML);
    newWindow.print();
	newWindow.close();
}
</script>

<style>
#cssmenu > ul > li > a{
	padding: 0 12px;
}
</style>
<style>
td{
	text-align:center;
	font-size:16px;
	border:solid 1px #ddd;
}
</style>
<div class="col-md-12" id="printable" style="width: 21 cm; height: 29.7 cm; margin: 0;">
<div class="col-md-2">
</div>
<div class="col-md-8">
<h3 style="text-align:center"><img style="width:70px; height:75px;" src="img/002.jpg" />&nbsp;SIKKIM PUBLIC SERVICE COMMISSION</h3>
<h5 style="text-align:center">Exam:  <?php echo $_SESSION["exam"]; ?></h5>
<h5 style="text-align:center">Exam Center:  <?php echo $_SESSION["center"]; ?></h5>
<legend style="margin-top:10px;text-align:center;">Sitting Arrangement for Room <?php echo $room_no;?></legend>
<table class="table">
<?php
	$set = array('A','B','C','D');
	for($i=1;$i<=$row_no;$i++)
	{
		
		echo "<tr>";
		for($j=0;$j<$colmn_no;$j++)
		{
			if (($curr_roll+($row_no*$j)) < 10) 
				{
				$rlno = '000'.($curr_roll+($row_no*$j));     // Prepend values smaller than 10 with triple zero
				}
				else if (($curr_roll+($row_no*$j)) < 100) 
				{
				$rlno = '00'.($curr_roll+($row_no*$j));     // Prepend values smaller than 100 with double zero
				}
				else if (($curr_roll+($row_no*$j)) < 1000) 
				{
				$rlno = '0'.($curr_roll+($row_no*$j));     // Prepend values smaller than 1000 with a zero
				} 
				else 
				{
				$rlno = ($curr_roll+($row_no*$j));
				}
				echo "<td>" .$rollno_prefix.($rlno) . " - ".$set[($curr_set+($row_no*$j))%4]."</td>";
			
		}
		$roll++;
		
		$curr_set++;
		echo "</tr>";
	}
?>
</table>
</div>
<div class="col-md-2">
</div>
</div>
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-2">
<input type="submit" id="generate" style="background-color:#39F; color:#000;" class="btn-block" onclick="printout()" value="Print" />
</div>
<div class="col-md-2">
<button class="btn-block" style="background-color:#39F;"><a href="pe_generate_sitting_arrangement.php" style="color:#000;">Back</a></button>
</div>
<div class="col-md-4">
</div>
</div>

 <?php
	}
	else
	{
		header("location:pe_generate_sitting_arrangement.php?msg=error");
	}
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>