<?php
error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){


	if(!empty($_POST['place_id'])){
		$state_id=trim($_POST['state_id']);
		$district_id=trim($_POST['district_id']);
		$block_dh_uphc=trim($_POST['block_dh_uphc']);
		$phc_aphc=trim($_POST['phc_aphc']);
		$place_id=trim($_POST['place_id']);
    $hsc_ids=trim($_POST['hsc_ids']);
		// exit;
		switch ($place_id) {
      case '4';
              ?>
              <h3 class="text-center">Current Stock Of Bihar[BR]</h3>
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
               
                <th>Avaliable Quantity</th>

              
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php
              $x=0;
                $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  $x++;

                  ?>
                 <tr>
                  <td><?=$x?></td>
                  <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
                  <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
                  
                  <td><?=$result_list_item['item_quantity']?>

                  </td>
                 </tr>

                 <?php
                }


              ?>
                <input type="hidden"  id="total" name="total" value="<?=$x?>">
              </tbody>
            </table>
              <?php
        break;
			case '1':
				# code...
				 
		            $place_district_id=$district_id;
		            $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
		            $sql_exec_block=mysqli_query($conn,$get_block);
		            $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
		            $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
			?>
			<h3 class="text-center">Current Stock Of <?=$place_name?></h3>
      <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                
                <th>Avaliable Quantity</th>

              
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php
              $x=0;
                $query_item="SELECT * FROM `rhc_master_stock_district_items` WHERE `distrct_place_id`='$district_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  $x++;

                  ?>
                 <tr>
                  <td><?=$x?></td>
                  <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
                  <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
                 
                  <td><?=$result_list_item['item_quantity']?>

                  </td>
                 </tr>

                 <?php
                }


              ?>
                <input type="hidden"  id="total" name="total" value="<?=$x?>">
              </tbody>
            </table>
			
	 <?php
	    	break;
		case '2':
      $block_id=$block_dh_uphc;
      $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
      $sql_exec_block=mysqli_query($conn,$get_block);

      $dh_id=$block_dh_uphc;
      $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$dh_id'";
      $sql_exec_dh=mysqli_query($conn,$get_dh);
                            
      $dh_id1=$block_dh_uphc;
      $get_dh1="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id1'";
      $sql_exec_dh1=mysqli_query($conn,$get_dh1);

      $num_hos1=mysqli_num_rows($sql_exec_dh1);
      $num_block=mysqli_num_rows($sql_exec_block);
      $num_hos=mysqli_num_rows($sql_exec_dh);

      if($num_hos1!="0"){
       	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh1);
       	$place_name=strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';
?>
        <h3 class="text-center">Current Stock Of <?=$place_name?></h3>
        <table id="myTable" class="table table-striped text-center" border="1">
          <thead align="center">
            <tr>
              <th>Slno</th>
              <th>Item Code</th>
              <th>Type</th>
              
              <th>Avaliable Quantity</th>

              
            </tr>
          </thead>
          <tbody id="list_items_check">
            <?php
            $x=0;
            $query_item="SELECT * FROM `rhc_master_stock_uphc_items` WHERE `uphc_place_id`='$block_dh_uphc'";
            $sql_exe=mysqli_query($conn,$query_item);
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            $x++;

            ?>
            <tr>
              <td><?=$x?></td>
              <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
              <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
              
              
              <td><?=$result_list_item['item_quantity']?>

              </td>
            </tr>

            <?php
            }


            ?>
         
          </tbody>
        </table>
<?php
      }
      if($num_hos!="0"){
       	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
        $place_name=strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']';
?>
        <h3 class="text-center">Current Stock Of <?=$place_name?></h3>
        <table id="myTable" class="table table-striped text-center" border="1">
          <thead align="center">
            <tr>
              <th>Slno</th>
              <th>Item Code</th>
              <th>Type</th>
             
              <th>Avaliable Quantity</th>

              
            </tr>
          </thead>
          <tbody id="list_items_check">
            <?php
            $x=0;
            $query_item="SELECT * FROM `rhc_master_stock_district_hospital_items` WHERE `dh_place_id`='$block_dh_uphc'";
            $sql_exe=mysqli_query($conn,$query_item);
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            $x++;

            ?>
            <tr>
              <td><?=$x?></td>
              <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
              <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
              
              
              <td><?=$result_list_item['item_quantity']?>

              </td>
            </tr>

            <?php
            }


            ?>
         
          </tbody>
        </table>
<?php
      }
      if($num_block!="0"){
       	$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
      	$place_name=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
?>
      <h3 class="text-center">Current Stock Of <?=$place_name?></h3>
        <table id="myTable" class="table table-striped text-center" border="1">
          <thead align="center">
            <tr>
              <th>Slno</th>
              <th>Item Code</th>
              <th>Type</th>
              <!-- <th>Receive Quantity</th>
              <th>Issue Quantity</th> -->
              <th>Avaliable Quantity</th>

              <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
            </tr>
          </thead>
          <tbody id="list_items_check">
            <?php
            $x=0;
            $query_item="SELECT * FROM `rhc_master_stock_block_items` WHERE `block_place_id`='$block_dh_uphc'";
            $sql_exe=mysqli_query($conn,$query_item);
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            $x++;

            ?>
            <tr>
              <td><?=$x?></td>
              <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
              <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
              
              
              <td><?=$result_list_item['item_quantity']?>

              </td>
            </tr>

            <?php
            }


            ?>
         
          </tbody>
        </table>
<?php
      }
                       

		
				break;
			case '3':

				$phc_id=$phc_aphc;
        $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
        $sql_exec_phc=mysqli_query($conn,$get_phc);
        $num_phc=mysqli_num_rows($sql_exec_phc);
        if($num_phc!=0){
					$phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
         	$place_name= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';
?>
          <h3 class="text-center">Current Stock Of <?=$place_name?></h3>
        <table id="myTable" class="table table-striped text-center" border="1">
          <thead align="center">
            <tr>
              <th>Slno</th>
              <th>Item Code</th>
              <th>Type</th>
              
              <th>Avaliable Quantity</th>

              
            </tr>
          </thead>
          <tbody id="list_items_check">
            <?php
            $x=0;
            $query_item="SELECT * FROM `rhc_master_stock_phc_items` WHERE `phc_place_id`='$phc_aphc'";
            $sql_exe=mysqli_query($conn,$query_item);
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            $x++;

            ?>
            <tr>
              <td><?=$x?></td>
              <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
              <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
              
              
              <td><?=$result_list_item['item_quantity']?>

              </td>
            </tr>

            <?php
            }


            ?>
         
          </tbody>
        </table>
<?php
				}    
                
        $place_id_aphc=$phc_aphc;
        $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
        $sql_exec_aphc=mysqli_query($conn,$get_aphc);
        $num_aphc=mysqli_num_rows($sql_exec_aphc);
        if($num_aphc!=0){
					$aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
          $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
?>
          <h3 class="text-center">Current Stock Of <?=$place_name?></h3>
        <table id="myTable" class="table table-striped text-center" border="1">
          <thead align="center">
            <tr>
              <th>Slno</th>
              <th>Item Code</th>
              <th>Type</th>
              
              <th>Avaliable Quantity</th>

            
            </tr>
          </thead>
          <tbody id="list_items_check">
            <?php
            $x=0;
            $query_item="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `aphc_place_id`='$phc_aphc'";
            $sql_exe=mysqli_query($conn,$query_item);
            while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
            $x++;

            ?>
            <tr>
              <td><?=$x?></td>
              <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
              <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
              
              
              <td><?=$result_list_item['item_quantity']?>

              </td>
            </tr>

            <?php
            }


            ?>
         
          </tbody>
        </table>
<?php
        }
                          
			
				break;
      case '5':
        # code...
         
               $hsc_ids=$hsc_ids;
                $get_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE`place_phc_sub_id`='$hsc_ids'";
                $sql_exec_hsc=mysqli_query($conn,$get_hsc);
                $hsc_fetch_detail=mysqli_fetch_assoc($sql_exec_hsc);
                $place_name=strtoupper($hsc_fetch_detail['phc_sub_center_name']).'['.$hsc_fetch_detail['place_phc_sub_id'].']';
      ?>
      <h3 class="text-center">Current Stock Of <?=$place_name?></h3>
      <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                
                <th>Avaliable Quantity</th>

               
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php
              $x=0;
                $query_item="SELECT * FROM `rhc_master_stock_phc_subcenter_items` WHERE `phc_sub_place_id`='$hsc_ids'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  $x++;

                  ?>
                 <tr>
                  <td><?=$x?></td>
                  <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
                  <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
                  
                  <td><?=$result_list_item['item_quantity']?>

                  </td>
                 </tr>

                 <?php
                }


              ?>
                
              </tbody>
            </table>
      
   <?php
        break;
			default:
				header('Location:logout.php');
				exit;
				break;
		}
	}

}else{
	header('Location:logout.php');
	exit;
}
?>
<script src="../assert/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assert/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>