<?php
require '../config.php';

if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM `ilab_login` WHERE `mobile_no_L` LIKE '" . $_POST["keyword"] . "%' ORDER BY `slno_L` ";
$sql_insert=mysqli_query($conn,$query);

$num=mysqli_num_rows($sql_insert);
if(!empty($num)) {
?>
<ul id="country-list">
<?php
while ( $mobile_result=mysqli_fetch_assoc($sql_insert)) {
	# code...

?>
<li onClick="selectCountry('<?php echo $mobile_result["mobile_no_L"]; ?>');"><?php echo $mobile_result["mobile_no_L"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>