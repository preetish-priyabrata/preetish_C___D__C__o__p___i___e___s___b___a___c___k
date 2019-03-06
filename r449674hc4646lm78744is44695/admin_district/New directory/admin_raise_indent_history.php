<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Indent History
        <small>Indent Raised</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Indent</a></li>
        <li><a href="#">Indent History</a></li>
        <li class="active"><a href="#">Indent Raised</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
    <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <!-- end message displayed -->
      <div class="box box-info">
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of Indent Raised</strong></div>
        <div class="demo">
          <div class="panel-body">
          <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>                        
                        <th>Indent Id</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                      $x=1;
                      $place_id=$_SESSION['place_id'];
                      $query_list="SELECT * FROM `rhc_master_district_indent` WHERE `indent_place_raised_by`='$place_id' AND `status`!='0'";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      while($result_list=mysqli_fetch_assoc($sql_exe_list)){
                    ?>
                    <tr>
                      <td><?=$x?></td>
                      <td>
                        <?php 
                        $place_district_id=$result_list['indent_place_raised_by'];
                        $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
                        $sql_exec_block=mysqli_query($conn,$get_block);
                        $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                        echo strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']'?>
                      </td>
                      <td><?=$result_list['indent_id'];?></td>
                      <td><?=date('d-m-Y',strtotime(trim($result_list['date_creation'])));?></td>
                      <td><?=date('h:i:s a',strtotime(trim($result_list['time_creation'])));?></td>
                      <td><?php
                            if($result_list['status']==2){
                              echo "<small style='color:green'>Issued</small>";
                            }else{
                              echo "<small style='color:red'>Not Issued</small>";
                            }
                      ?></td>
                      <td><?php
                            if($result_list['status']==2){?>
                      <a href="admin_raise_indent_history_view.php?indent_id=<?=$result_list['indent_id'];?>" class="btn btn-info" role="button">More</a></td>
                      <?php  }else{ ?>
                       <a href="admin_raise_indent_history_view1.php?indent_id=<?=$result_list['indent_id'];?>" class="btn btn-info" role="button">More</a></td>
                      <?php 
                    }
                    ?>
                    </tr>
                    <?php 
                      $x++;
                    }?>
                    </tbody>
              </table>
        </div>
        <div class="row">
            <div class="col-sm-12">
             <div class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      
    </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
<script type="text/javascript">
//   function deleteRow(row)
// {
//     var i=row.parentNode.parentNode.rowIndex;
//     document.getElementById('POITable').deleteRow(i);
// }


// function insRow()
// {
//     console.log( 'hi');
//     var x=document.getElementById('POITable');
//     var new_row = x.rows[1].cloneNode(true);
//     var len = x.rows.length;
//     new_row.cells[0].innerHTML = len;
    
//     var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
//     inp1.id += len;
//     inp1.value = '';
//     var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
//     inp2.id += len;
//     inp2.value = '';
//     var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
//     inp3.id += len;
//     inp3.value = '';
//     x.appendChild( new_row );
// }
var ctr = 1;
$('#myTable').on('click', '.button-add', function () {
    ctr++;
    var itemcodes = "itemcode" + ctr;
    var itemtypes = "itemtype" + ctr;
    var text_quantitys = "text_quantity" + ctr;
    var txtOccupation = "txtOccupation" + ctr;
    var newTr = '<tr><td>'+ctr+'</td><td><input required onkeyup="get_item('+ctr+')" type="text"  name="item_code[]" id=' + itemcodes + ' /></td><td><select required onchange="get_details('+ctr+')" id='+itemtypes+' name="item_type[]" required=""></select></td><td><input type="text" id=' + text_quantitys + ' name="item_quantity[]" required/></td><td></td></tr>';
    $('#myTable').append(newTr);
});
function get_item(id){
var ids=id;
  alert(ids);
}
function get_details(id) {
  var idsd=id;
  alert(idsd);
}
</script>
