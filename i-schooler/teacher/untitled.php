<!DOCTYPE html>
<html>
<head>
	<title>marks</title>
<script src="../assert/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<body>

<?php
print_r($_POST);
// Array ( [fields] => 4 [rows] => 30 [submit] => submit ) 
$fields=$_POST['fields'];
$rows=$_POST['rows'];
$submit=$_POST['submit'];
if(isset($_POST['submit'])){?>
<table>
<tr>
<th>slno</th>
<?php 
for ($j=0; $j <$fields ; $j++) { ?>
<th><?=$j?></th>
			
<?php		}

	for ($i=0; $i <$rows ; $i++) { ?>
	<tr>
	<td><?=($i+1)?></td>
	<?php	for ($j=0; $j <$fields ; $j++) { ?>
			<td><input onkeyup="calculate(<?=$i?>)" id="sub<?=$j?><?=$i?>" value="<?=$j?><?=$i+1?>"></td>

			<?php
		}?>
		<td><input id="total<?=$i?>"></td>
	</tr>
	<?php }
}?>
</tr>


<script type="text/javascript">
	function calculate(id) {
		var total=0;
		// var x
		for (var i =0; i < <?=$fields?>; i++) {
				
			// var $x=;
			 var y=$('#sub'+i+id).val();
			if(y!=""){
				 var total=parseInt(y)+parseInt(total);
				 $('#total'+id).val(total);
			}
		}
		
		
		// var x2=$('#sub3'+id).val();
		// var x3=$('#sub4'+id).val();
  //    if(x!="" && x1!="" && x2!="" && x3!=""){
		//   var total=parseInt(x)+parseInt(x1)+parseInt(x2)+parseInt(x3);
		//   $('#total'+id).val(total);

     }
		// body...
	
</script>