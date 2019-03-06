<?php
//include '../config.php';

if(isset($_REQUEST['submit']))
{
$dist = $_REQUEST['dist'];
$block = $_REQUEST['block'];
$tribe = $_REQUEST['tribe'];
$dialect = $_REQUEST['dialect'];
$join_class = $_REQUEST['join_class'];
$vocational = $_REQUEST['vocational'];
$gender = $_REQUEST['gender'];
$dob = $_REQUEST['dob'];
$num_std = $_REQUEST['num_std'];
$age_from = $_REQUEST['age_from'];
$age_to = $_REQUEST['age_to'];
$name = $_REQUEST['name'];

$qry = "";
if($dist!="" && $dist!='all')
{
	$qry .= " AND b.district_name='$dist'";	
}
if($block!="")
{
	$qry .= " AND b.block_name='$block'";	
}
if($tribe!="")
{
	$qry .= " AND b.tribe_type='$tribe'";	
}
if($dialect!="")
{
	$qry .= " AND b.dialect_speek='$dialect'";	
}
if($join_class!="")
{
	$qry .= " AND a.join_class='$join_class'"	;
}
if($gender!="")
{
	$qry .= " AND a.gender='$gender'";
}
if($dob!="")
{
	$qry .= " AND a.dob='$dob'";	
}

if($age_from!="")
{
	function reverse_birthday( $years ){
	$date = date('Y-m-d', strtotime($years . ' years ago'));
	$rel_date = date_create($date);
	return date_format($rel_date,"Y");
	}
	$age_from = reverse_birthday($age_from);
	$age_to = reverse_birthday($age_to);
	
	$qry .= " AND date_format(str_to_date(a.dob,'%d/%M/%Y'),'%Y') BETWEEN '$age_to' AND '$age_from'";
	
}
if($name!="")
{
	$qry .= " AND a.std_name LIKE '%$name%'";
}
if($num_std!="")
{
	$qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
}

$str = "SELECT * FROM std_general_information a, std_general_geo b WHERE a.std_id=b.std_id".$qry;
//include 'pagination/paginate.php';

?>
<div id="wrapper" style="width:1200px; padding-top:10px;">
    <fieldset>
        <legend>Student Information</legend>
        <table id="example" class="display" width="100%" border="1" cellpadding="2"  cellspacing="2">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Student Name </th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Sl.No</th>
                <th>Student Name </th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            <?php
		
            $sql = mysqli_query($con, $str);
            $num_row = mysqli_num_rows($sql);
			
            if ($num_row != 0) {
                $sl = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $sl++
                    ?>
                    <tr>
                        <td align="center"><?php echo $sl; ?></td>
                        <td align="center"><?php echo $data['std_name']; ?></td>
                        <td align="center"><?php echo $data['father_name']; ?></td>
                        <td align="center"><?php echo $data['mother_name']; ?></td>
                        <td align="center"><a href="student_info2.php?s_id=<?php echo $data['std_id']; ?>" target="_blank">View</a></td>
                    </tr>
        <?php
    }
} else {
    ?>
                <tr><td colspan="5" align="center">-No Record Found-</td></tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </fieldset>
    
</div>
<?php
}
?>