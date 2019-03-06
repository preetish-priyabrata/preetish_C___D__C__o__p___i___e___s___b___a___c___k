<?php
error_reporting(0);
session_start();
include "../config.php";

 $qry=($_REQUEST['query']);


if(isset($_REQUEST['submit']))
{

$str=$qry;

if($_REQUEST['activity']!="false")
{
	
	$str.=" AND (c.activity!='' OR c.activity_other!='')";
}
if($_REQUEST['sports']!="false")
{
	
	$str.=" AND (c.games!='' OR c.game_other!='')";	
}
if($_REQUEST['music']!="false")
{
	
	$str.=" AND (c.music!='' OR c.music_other!='')";	
}
if($_REQUEST['dance']!="false")
{
	
	$str.=" AND (c.dance!='' OR c.dance_other!='')";	
}
if($_REQUEST['instrumental']!="false")
{
	
	$str.=" AND (c.instrumental!='' OR c.instrumental_other!='')";	
}
if($_REQUEST['yogameditation']!="false")
{
	
	 $str.=" AND (c.yoga!='' OR c.yoga_other!='')";	
}
if($_REQUEST['vocational']!="false")
{
	
	$str.=" AND (c.vocational!='' OR c.vocational_other!='')";	
}
if($_REQUEST['englishaccess']!="false")
{
	
	$str.=" AND c.english_access='Attended'";	
}
}
else
{
	$str=$qry;

}
$sql=mysqli_query($conn,$str);
?>
 <script type="text/javascript">
    function showrecords(id) {
        alert(id);
        // body...
    }
</script>

<form action="" name="chkbox" method="post" >
<input type="checkbox" onclick="showactivities();" name="activity" id="activity"<?php if($_REQUEST['activity']=="true"){echo "checked";} ?>/>Activity
  &nbsp;<input type="checkbox" name="sports_games" id="sports_games"<?php if($_REQUEST['sports']=="true"){echo "checked";} ?>/>Sports & Games
  &nbsp;<input type="checkbox" name="music" id="music"<?php if($_REQUEST['music']=="true"){echo "checked";} ?>/>Music
  &nbsp;<input type="checkbox" name="dance" id="dance"<?php if($_REQUEST['dance']=="true"){echo "checked";} ?>/>Dance
  &nbsp;<input type="checkbox" name="instrumental" id="instrumental"<?php if($_REQUEST['instrumental']=="true"){echo "checked";} ?>/>Instrumental
  &nbsp;<input type="checkbox" name="yoga_meditation" id="yoga_meditation"<?php if($_REQUEST['yogameditation']=="true"){echo "checked";} ?>/>Yoga & Meditation
  &nbsp;<input type="checkbox" name="voca" id="voca"<?php if($_REQUEST['vocational']=="true"){echo "checked";} ?>/>Vocational
  &nbsp;<input type="checkbox" name="english" id="english"<?php if($_REQUEST['englishaccess']=="true"){echo "checked";} ?>/>English Access
  &nbsp;<button type="button" onclick="get_students(this.value);" class="btn_btn_primary" name="submit" id="submit" value="<?php echo $qry; ?>">SHOW</button>
  </form>

<div id="stu_details">
   
        
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
  </div>
