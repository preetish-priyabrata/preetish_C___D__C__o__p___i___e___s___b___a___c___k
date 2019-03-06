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
        Indent Raise Form
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Indent</a></li>
        <li class="active"><a href="#">Raise Indent</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
     <div class="row">
    <div class="col-sm-8">
    <div class="box box-info">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Fill Indent Form</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline">
              <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Date :</label>
                <?=date('Y-m-d')?>
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div>
               <div class="col-sm-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <!-- <input type="password" class="form-control" id="pwd"> -->
                <?=date('H:i:s')?>
              </div>
              </div>  
               <div class="col-sm-6 pull-right">       
              <div class="form-group pull-right">
                <label for="email">Location :</label>
                <input type="hidden" name="place_id" id="place_id" value="Pat">
                <input type="hidden" name="place_status" id="place_status" value="2">
                xyz
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Quantity</th>
                <th id="btnAdd" class="button-add">Add New Item</th>
              </tr>
              </thead>
              <tbody>
               <!--  <tr>
                    <td>
                       
                       1
                    </td>
                    <td>
                        <select>
                          <option value="">--Item--</option>
                        </select>
                    </td>
                    <td>
                        <select onchange="get_details(1)" id="itemtype1" name="item_type[]" required=""></select>
                    </td>
                    <td>
                        <input type="text" id="text_quantity1" name="item_quantity[]" required="" />
                    </td>
                    <td></td>
                    
                </tr> -->
              </tbody>
            </table>
            <div class="row">
            <div class="col-sm-12">
             <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
          <span class="pull-right">
           <button type="submit" class="btn btn-default">Submit</button>
           </span>
           </div>
        </div>
          </form>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading text-center" style="background-color: palevioletred;"><strong>Item Details</strong></div>
          <div class="panel-body">

            <table class="table table-striped" id="hide">
              <tr id="">
                <td>Item Code :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Item Type :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Total Indent Quantity :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Received Quantity</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Available Indent Quantity</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Indent Upper Limit Quantity</td>
                <td class="user_click">0
                <input type="hidden" id="vard" value="0">
                </td>                
              </tr>
              
            </table>
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
<?php 
                $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
                $sql_exe_item_code=mysqli_query($conn,$query_item_code);
                // while ($res_item_code=mysqli_fetch_assoc($sql_exe_item_code)) {?>
               
                <!-- <option value="<?=$res_item_code['item_code']?>"><?=$res_item_code['item_name']?>[<?=$res_item_code['item_code']?>]</option> -->
              <?php 
            // }
              ?>
               <?php 
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
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
var ids;
var ctr =1;
$('#myTable').on('click', '.button-add', function () {
   ids=ctr;
    var itemcodes = "itemcode" + ctr;
    var itemtypes = "itemtype" + ctr;
    var text_quantitys = "text_quantity" + ctr;
    var txtOccupation = "txtOccupation" + ctr;
     var txtOccupationss = "txtOccupations" + ctr;
    var newTr = '<tr><td>'+ctr+'</td><td><select name="item_code[]" id=' + itemcodes + '><option value="">--select Item code--</option><?php while ($res_item_code=mysqli_fetch_assoc($sql_exe_item_code)) {?><option value="<?=$res_item_code['item_code']?>"><?=$res_item_code['item_name']?>[<?=$res_item_code['item_code']?>]</option><?php }?></select></td><td><select required onchange="get_details('+ctr+')" id='+itemtypes+' name="item_type[]" required=""><option value="">....</option><?php while ($res_item_type=mysqli_fetch_assoc($sql_exe_item_type)) {?><option value="<?=$res_item_type['item_type']?>"><?=$res_item_type['item_type_name']?>[<?=$res_item_type['item_type']?>]</option><?php }?></select></td><td><input type="text" id=' + text_quantitys + ' name="item_quantity[]" required/><input type="hidden" id=' + txtOccupation + ' name="item_quantity[]" required/><span id='+txtOccupationss+' style="color:red"><span></td><td></td></tr>';
    $('#myTable').append(newTr);
     ctr++;
});
// function get_item(id){
// var ids=$
//   alert(ids);
// }
function get_details(id) { 
  // show
  var itemcodes=$('#itemcode'+id).val();
  var itemtypes=$('#itemtype'+id).val();
   var place_ids=$('#place_id').val();
   var place_status=$('#place_status').val();
   var ids=id;
 if(itemcodes!="" && itemtypes!=""){ 
              // alert(class_name);             
            $.ajax({
                type:'POST',
                url:'admin_get_item_indent_calculation.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_status:place_status,place_id:place_ids,ids:ids},
                success:function(html){  
                  if(html){
                  $('#hide').html(html);
                  $('#text_quantity'+id).val(get_quantity(ids));
                   }
                    // if(html){
                    //     document.getElementById("myerror"+id).innerHTML = "";
                    //     return false;
                    //     // $("#reli").submit(); 
                    // }else{
                    //     document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                    //     return false;
                    // }
                }
            });
        }
 
}
$('#hide').on('click', '.user_click', function () {
var vard=$('#vard').val();
//alert(vard);
$('#text_quantity'+ids).val($('#vard').val());
});
function check_before_submit() {
  
}

</script>
