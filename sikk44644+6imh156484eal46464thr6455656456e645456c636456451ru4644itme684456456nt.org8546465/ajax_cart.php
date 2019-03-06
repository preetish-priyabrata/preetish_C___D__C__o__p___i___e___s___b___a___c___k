<?php
session_start();
require_once("config.php");
// if((time() - $_SESSION['last_login_timestamp']) > 300){  // 900 = 15 * 60 
//    session_destroy();
// }else{
//     $_SESSION['last_login_timestamp'] = time();
// }
// $db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["code"])) {
			$code=trim($_POST['code']);
				$productByCode ="SELECT * FROM `ilab_post` WHERE `status`='1' and `slno_post`='$code'";

				$sql_exe1=mysqli_query($conn,$productByCode);
				$result1_new=mysqli_fetch_assoc($sql_exe1);
				// `slno_post`, ``, ``, ``
				$slno_post=$result1_new['slno_post'];
				$post_name=$result1_new['post_name'];
				$post_code=$result1_new['post_code'];
				$price_detail=$result1_new['price_detail'];
			############################################################################################
			// $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			$itemArray=array($result1_new['slno_post']=>array('slno_post'=>$slno_post,'post_name'=>$post_name,'post_code'=>$post_code,'price_detail'=>$price_detail));
			
			// if(!empty($_SESSION["cart_item"])) {
			// 	if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
			// 		foreach($_SESSION["cart_item"] as $k => $v) {
			// 				if($productByCode[0]["code"] == $k)
			// 					$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
			// 		}
			// 	} else {
			// 		$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			// 	}
			// } else {
			// 	$_SESSION["cart_item"] = $itemArray;
			// }
			if(!empty($_SESSION["cart_item"])) {
					if(in_array($result1_new['slno_post'],$_SESSION["cart_item"])) {
						
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
		}
	break;
	case "remove":
		// if(!empty($_SESSION["cart_item"])) {
		// 	foreach($_SESSION["cart_item"] as $k => $v) {
		// 			if($_POST["code"] == $k)
		// 				unset($_SESSION["cart_item"][$k]);
		// 			if(empty($_SESSION["cart_item"]))
		// 				unset($_SESSION["cart_item"]);
		// 	}
		// }
		if(!empty($_SESSION["cart_item"])) {
				
				foreach($_SESSION["cart_item"] as $k => $v) {
					
					if(in_array($_POST["code"],$_SESSION["cart_item"][$k])) {
						unset($_SESSION["cart_item"][$k]);
					}						
				}
			}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<form action="apply_job_save" id="proceed_paid" method="POST">
<table id="example7" class="display nowrap" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th><strong>Post Name</strong></th>
			<th><strong>Post Code</strong></th>
			<th><strong>Fee</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>

<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
					<input type="hidden" class="secondary_details" name="slno_post_id[]" value="<?=$item['slno_post']?>">
					<input type="hidden" name="post_name[]" value="<?=$item['post_name']?>">
					<input type="hidden" name="post_code[]" value="<?=$item['post_code']?>">
					<input type="hidden" name="price_detail[]" value="<?=$item['price_detail']?>">
				<td><strong><?php echo $item["post_name"]; ?></strong></td>
				<td><?php echo $item["post_code"]; ?></td>
				
				<td ><?php echo "Rs".$item["price_detail"]; ?></td>
				<td><a onClick="cartAction('remove','<?php echo $item["slno_post"]; ?>')" class="btnRemoveAction cart-action btn btn-outline-warning btn-sm">Remove Post</a></td>
				</tr>
				<?php
        $item_total += ($item["price_detail"]);
		}
		?>

				<tr>
				<td colspan="5" align=right><strong>Total Fee:</strong> <?php echo "Rs ".$item_total; ?></td>
		</tr>
		</tbody>
</table>
<button type="button" onclick="check_it_before()" class="btn btn-primary btn-sm pull-right">Procced To  Pay</button>
</form>	
  <?php
}
?>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example7 tfoot th').not(":eq(0),:eq(4)").each( function () {
        var title = $('#example7 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example7').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4 ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
  
} );
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">