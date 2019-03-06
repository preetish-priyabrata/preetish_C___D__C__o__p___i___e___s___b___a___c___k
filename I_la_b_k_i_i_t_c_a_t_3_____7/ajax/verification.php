<?php
include '../conf.php';
if($_REQUEST['q']!="")
{

$sql = "SELECT * FROM tbl_certificate WHERE ref_no='$_REQUEST[q]'";
$query = mysqli_query($con,$sql);
$num_row = mysqli_num_rows($query);
if($num_row>0)
{
$data = mysqli_fetch_array($query);
?>
<table width="100%" border="0">
  <tr>
    <td align="right">Name</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['name'];?></td>
  </tr>
  <tr>
    <td align="right">Roll Number</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['roll_no'];?></td>
  </tr>
  <tr>
    <td align="right">Branch</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['branch'];?></td>
  </tr>
  <tr>
    <td align="right">Course</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['course'];?></td>
  </tr>
  <tr>
    <td align="right">Dt_From</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['dt_from'];?></td>
  </tr>
  <tr>
    <td align="right">Dt_To</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['dt_to'];?></td>
  </tr>
  <tr>
    <td align="right">Ref.No.</td>
    <td align="center">:</td>
    <td align="left"><?php echo $data['ref_no'];?></td>
  </tr>
</table>
<?php
}else{
		echo "Ref. No. does not exist";
	}
}
else
{
echo "this field should not be left blank";
}
?>