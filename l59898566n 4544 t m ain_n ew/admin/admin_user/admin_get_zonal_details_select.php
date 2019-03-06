<?php
session_start();
if($_SESSION['admin']){
	require 'config.php';

// hq_id	hq1
?>
<div class="form-group">
	<label class="control-label col-lg-4 text-right">Site Store</label>
	<div class="col-lg-8">
		<select name="site_store_name" onchange="detail_field_store()" id="site_store_name" class="form-control" type="dropdown" required="">
<?php
	$hq_id=$_POST['hq_id'];
	$query="SELECT * FROM `lt_master_zonal_place` WHERE `hq_code`='$hq_id' and `status`='1'";
	$sql_exe=mysqli_query($conn,$query);
	$num=mysqli_num_rows($sql_exe);

	if($num=="0"){
		?>
		<option value="">--No Zonal Is Enter To This HeadQuarter--</option>
		<?php
	}else{
		?>
		<option value="">--Select Zonal--</option>

		<?php
		while ($res=mysqli_fetch_assoc($sql_exe)) {
		?>
			<option value="<?=$res['zonal_code']?>"><?=$res['zonal_name']?></option>
			<?php
		}
	}
	?>
		</select>
	</div>
</div>

 <div id="show_field_store">
						<!--  <span id="show_site_store"></span> -->

</div>
<br>
	<?php 

}else{
	header('Location:logout.php');
	exit;
}
?>
<script type="text/javascript">
function detail_field_store(){
			var hq_code=$('#headquarter').val();
			var site_store_code=$('#site_store_name').val();
			var user_role=$('#user_role').val();
			
			if(hq_code!="" && site_store_code!="" && user_role=="4"){
				$("#show_field_store").hide(1000);
				$.ajax({
		          	type:'POST',
		          	url:'admin_get_field_details_select.php',
		          	data:'hq_id='+hq_code+'&site_id='+site_store_code,
		          	success:function(html){
		            	  // $remove_display
		             	// $("#remove_display").remove();
		             	 $("#show_field_store").show(1000);
		              	$('#show_field_store').html(html);
		             
		          	}
	      		}); 
			}else{
							
				$("#show_field_store").hide(1000); 
				if(document.getElementById("site_field_name") == null){

				}else{
					document.getElementById('site_field_name').value = '';
       				document.getElementById("site_field_name").removeAttribute("required");				
					$("#show_field_store").hide(1000); 
				}
				
			}
		}	
</script>
<?php 

exit;
