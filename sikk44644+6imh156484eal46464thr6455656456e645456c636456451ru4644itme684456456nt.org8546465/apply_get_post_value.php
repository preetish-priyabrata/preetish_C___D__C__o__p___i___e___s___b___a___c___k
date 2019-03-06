<?php
// ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
	unset($_SESSION["cart_item"]);
	unset($_SESSION["group_id"]);
    require 'FlashMessages.php';
    $group_id=$_POST['Category_names'];
    $_SESSION["group_id"]=$group_id;
    $diploma_status_sess=$_SESSION['diploma_status'];

    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
    	#shopping-cart {
		    border-top: #79b946 2px solid;
		    margin-bottom: 30px;
		}
		#shopping-cart .txt-heading {
    background-color: #D3F5B8;
}
.txt-heading {
    padding: 5px 10px;
    font-size: 1.1em;
    font-weight: bold;
    color: #0e0053;
}
    </style>


<div id="product-grid">
	<div class="txt-heading">Post Information </div>
	<table id="example77" class="display nowrap" width="100%" cellspacing="0">
		<thead>
            <tr style="text-align: center;">
                <th>Sl.No</th>
                <th>Post Name</th>
                
                <th>Post Code</th>
                <th>Registration Fee</th>
              	<th>Action</th>
            </tr>
        </thead>
		<tfoot>
			<tr style="text-align: center;">
 				<th>Sl.No</th>
                <th>Post Name</th>
               
                <th>Post Code</th>
                 <th>Registration Fee</th>
              	<th>Action</th>
			</tr>
 	 	</tfoot>
 	 	<tbody>
 	 		<?php			
 	 			$x=0;
 	 			if($diploma_status_sess==1){
				$query_sql1="SELECT * FROM `ilab_exam_group_assign_post` WHERE `status`='1' and `group_slno`='$group_id'";
				}else if($diploma_status_sess==2){
					$query_sql1="SELECT * FROM `ilab_exam_group_assign_post` WHERE `status`='1' and `group_slno`='$group_id' and `diploma_status`='2'";
				}
				$sql_exe1=mysqli_query($conn,$query_sql1);
				while ($result1=mysqli_fetch_assoc($sql_exe1)){
					
					$in_session = "0";
					if(!empty($_SESSION["cart_item"])) {
						$session_code_array = array_keys($_SESSION["cart_item"]);
						if(in_array($result1['post_slno'],$session_code_array)) {
							$in_session = "1";
						}
					}
					
					$x++;
					
					?>
					<tr style="text-align: center;">
						<td><?=$x?></td>
						<td><?=$result1['post_name_det']?></td>
					    <td><?=$result1['post_code_id']?></td>
					    <td><?=$result1['post_price']?></td>
					    <td>
							<input type="button" id="add_<?php echo $result1['post_slno']; ?>" value="
							click to apply" class="btn btn-outline-success btn-sm btnAddAction cart-action" onClick = "cartAction('add','<?php echo $result1['post_slno']; ?>')" <?php if($in_session != "0") { ?> style="display:none"<?php } ?> />
							<input type="button" id="added_<?php echo $result1['post_slno']; ?>" 	value="applied" class="btn btn-outline-secondary btn-sm btnAdded" <?php if($in_session != "1") { ?> style="display:none" <?php } ?> />
				    	</td>
				    </tr>
<?php
			}

				?>

 	 	</tbody>
 	 </table>
	
</div>

	<div class="clear-float"></div>

	<div id="shopping-cart">
		<div class="txt-heading">Job Cart  || <a id="btnEmpty" class="btn btn-outline-danger cart-action" onClick="cartAction('empty','');">Empty Cart</a></div>
		<div id="cart-item"></div>
	</div>
	
	<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
	    

 <?php 
}else{
  header('Location:logout');
  exit;
}
// $content_details = ob_get_contents();
// ob_clean();
// include 'template1.php';

?>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">

	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
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
