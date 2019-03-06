<?php
error_reporting(0);
session_start();
//include '../config.php';
if($_SESSION['updation_user_id'])
  {
		if(isset($_REQUEST['submit']))
		{
		$class = $_REQUEST['class'];
		$section = $_REQUEST['section'];
		
		
		
		if($class!="")
		{
			$qry .= " AND a.class='$class'";	
		}
		if($section!="")
		{
			$qry .= " AND a.section='$section'";	
		}
		
		$str = "SELECT * FROM `std_general_information` a, `std_general_geo` b WHERE a.std_id=b.std_id".$qry;
		}
?>



<!--all results-->
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
                        <td align="center"><a href="update_student_info.php?s_id=<?php echo $data['std_id']; ?>" target="_blank">Edit</a></td>
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