<?php
include 'config.php';
$place=$_POST['place'];

$query="SELECT * FROM `rhc_master_excel_place_district_stocks` WHERE `district_id`='$place'";
$exe=mysqli_query($conn,$query);
$num=mysqli_num_rows($exe);
if($num==0){
echo "Currently no data is available";
return;
}else{
	?>
	<div class="table-responsive">
	<table class="table">
	<thead>
		<tr>
		<th>item</th>
		<th>Opening</th>
		<th>stock Received</th>
		<th>stock Distributd</th>
		<th>Closing</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	while ($result=mysqli_fetch_assoc($exe)) {?>
	<tr>
		<td><?=$result['item_detail']?></td>
		<td><?=$result['Opening_stock']?></td>
		<td><?=$result['Stock_Received']?></td>
		<td><?=$result['Stock_Distributed']?></td>
		<td><?=$result['Closing_Balance']?></td>
	</tr>
<?php		
	}

	?>
	</tbody>
	</table>
	</div>
	<?php
}