
<!DOCTYPE html>
<html>
<head>
	<title>marks</title>
<script src="../assert/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<body>
<table>
<tr>
	
    <td>slno</td>
   <td>1 </td> 
   <td>2</td>
   <td>3</td>
   <td>4</td>
   <td>total</td>
   </tr>
<?php
for ($i=0; $i < 50; $i++) { ?>

	<tr>
	<td><?=$i+1;?></td>
   
    <td><input onkeyup="calculate(<?=$i?>)" id="sub1<?=$i?>" value="0"></td>
    <td><input onkeyup="calculate(<?=$i?>)" id="sub2<?=$i?>" value="0"></td>
    <td><input onkeyup="calculate(<?=$i?>)" id="sub3<?=$i?>" value="0"></td>
    <td><input onkeyup="calculate(<?=$i?>)" id="sub4<?=$i?>" value="0"></td>
    <td><input id="total<?=$i?>"></td>
   <td>
   </tr>
  <?php }
?>
</table>


</body> 
<script type="text/javascript">
	function calculate(id) {
		var x=$('#sub1'+id).val();
		
		var x1=$('#sub2'+id).val();
		var x2=$('#sub3'+id).val();
		var x3=$('#sub4'+id).val();
     if(x!="" && x1!="" && x2!="" && x3!=""){
		  var total=parseInt(x)+parseInt(x1)+parseInt(x2)+parseInt(x3);
		  $('#total'+id).val(total);

     }
		// body...
	}
</script>
</html> 
 