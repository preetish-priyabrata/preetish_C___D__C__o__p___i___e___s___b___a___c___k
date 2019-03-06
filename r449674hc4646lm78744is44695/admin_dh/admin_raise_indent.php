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
        Indent Raising Form
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Indent</a></li>
        <li class="active"><a href="#">Raise Indent</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>
<style type="text/css">
  .btn1 {
    border: 1px solid blue;
    background: #420202;
    color: white;
}

</style>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Indent  Form</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="indent" action="admin_raise_indent_save.php" method="POST">
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
                <input type="hidden" name="place_id" id="place_id" value="<?=$_SESSION['place_id']?>">
                <input type="hidden" name="place_status" id="place_status" value="<?=$_SESSION['designation']?>">
                <?php $place_id_dh=$_SESSION['place_id']?>
                <?php 
                $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$place_id_dh'";
                $sql_exec_dh=mysqli_query($conn,$get_dh);
                $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
                echo strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']'?>
                <input type="hidden" name="top_place_id" value="<?=$dh_fetch_detail['place_district_id']?>">
                <input type="hidden" name="raise_place_id" value="<?=$dh_fetch_detail['place_hostpital_id']?>">
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
                <th id="btnAdd" class="button-add"><span class="btn1">Add New Item</span></th>
              </tr>
              </thead>
              <tbody id="list_items_check">
               
              </tbody>
            </table>
            <div class="row text-center">
              <span  id="error" style="color: red;"></span>
            </div>
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
            <span class="text-center" id="error" style="color: red;"></span>
          <span class="pull-right">
           <a href="admin_raise_indent.php"  class="btn btn-default">Reset</a>  
           <button type="button" onclick="check_values();" class="btn btn-default">Submit</button>
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
                
             
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
               ?>
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>             
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
var ids=0;
var ctr =1;
var idssd=0;
$('#myTable').on('click', '.button-add', function () {
   ids=ctr;
    var itemcodes = "itemcode" + ctr;
    var itemtypes = "itemtype" + ctr;
    var text_quantitys = "text_quantity" + ctr;
    var txtOccupation = "txtOccupation" + ctr;
     var txtOccupationss = "txtOccupations" + ctr;
    var newTr = '<tr><td><input type="text" size="1" ></td><td><select name="item_code[]" id=' + itemcodes + '><option value="">--select Item code--</option><?php while ($res_item_code=mysqli_fetch_assoc($sql_exe_item_code)) {?><option value="<?=$res_item_code['item_code']?>"><?=$res_item_code['item_name']?>[<?=$res_item_code['item_code']?>]</option><?php }?></select></td><td><select required onchange="get_details('+ctr+')" id='+itemtypes+' name="item_type[]" required=""><option value="">....</option><?php while ($res_item_type=mysqli_fetch_assoc($sql_exe_item_type)) {?><option value="<?=$res_item_type['item_type']?>"><?=$res_item_type['item_type_name']?>[<?=$res_item_type['item_type']?>]</option><?php }?></select></td><td><input type="text" id=' + text_quantitys + ' name="item_quantity[]" required/><input type="hidden" id=' + txtOccupation + ' name="txtOccupation[]" required/><br><span id='+txtOccupationss+' style="color:red"><span></td><td><input type="button" class="btn btn-primary btn-xs" id="delPOIbutton" value="Delete" onclick="deleteRow(this)"/></td></tr>';
    $('#myTable').append(newTr);
     ctr++;
});

function deleteRow(row){
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('myTable').deleteRow(i);
}
// function get_item(id){
// var ids=$
//   alert(ids);
// }
// var idssd=0;
function get_details(id) { 
  // show
  var idss=id;
    idssd=id;
   console.log(idssd);
   // // alert(idss);
   // alert(idssd);
  var itemcodes=$('#itemcode'+id).val();
  var itemtypes=$('#itemtype'+id).val();
   var place_ids=$('#place_id').val();
   var place_status=$('#place_status').val();
   
 if(itemcodes!="" && itemtypes!=""){ 
              // alert(class_name);             
            $.ajax({
                type:'POST',
                url:'admin_get_item_indent_calculation.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_status:place_status,place_id:place_ids,ids:idss},
                success:function(html){  
                  if(html){
                  $('#hide').html(html);
                  get_quantity(idss)
                  // alert(md);
                 
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
// alert(idssd);
$('#text_quantity'+idssd).val($('#vard').val());
$('#txtOccupation'+idssd).val($('#vard').val());
});
var arr = [];
var isd = 0;

function check_values() {
  var arr = [];
var erroe=0;
var erroe1=0;

  for (var i = 1; i <= ids; i++) {
    var element = $('#text_quantity'+i).val();
    if (typeof element !== "undefined" ) {

      
    

    var quantity=$('#text_quantity'+i).val();
    
       var quantity1=$('#txtOccupation'+i).val();
       console.log(quantity);
      
       
    if(parseInt(quantity1)>=parseInt(quantity)){     
      document.getElementById("txtOccupations"+i).innerHTML = "";
    }else{
     console.log(i);
      document.getElementById("txtOccupations"+i).innerHTML = "Please Insert a value less  Than or equal ("+quantity1+")";
      $('#text_quantity'+i).val(quantity1);
      erroe++;
    }

arr.push($('#itemcode'+i).val()+$('#itemtype'+i).val());

// alert(arr);
// console.log(arr);
    
  }else{
    arr.push(i+i);
  }
}
  var i_count=arr.length;
  for (var j = 0; j <= arr.length; j++) {
    for (var k = 0; k <= arr.length; k++) {
      if(j!=k){
        // alert(j);
        if(arr[j]==arr[k]){
          erroe++;
          //  var quantity1=$('#txtOccupation'+k).val();
          // document.getElementById("txtOccupations"+k).innerHTML = "Please Insert a value less  Than or equal ("+quantity1+")";
          //   $('#text_quantity'+k).val(quantity1);
          
          var y=parseInt(k)+1;
          var x =parseInt(j)+1;

           $('#itemcode'+j).focus();
           $('#itemtype'+j).focus();
            document.getElementById("txtOccupations"+x).innerHTML="Currently Available Quantity of the Selected Item Code and Type is 0";
            document.getElementById("txtOccupations"+y).innerHTML="";


        }
      }
    }
  }

  if((erroe==0) && (erroe1==0) ){
       document.getElementById("error").innerHTML="";
       $("#indent").submit(); 
    }else{
      // document.getElementById("error").innerHTML="Available Quantity For The Selected Item  Code with Type has already been Exhausted";
      return false;
    }
  
}



function get_quantity(id) {
   var itemcodes=$('#itemcode'+id).val();
  var itemtypes=$('#itemtype'+id).val();
   var place_ids=$('#place_id').val();
   var place_status=$('#place_status').val();
   var idss2=id;
   // alert(idss2);
   $.ajax({
                type:'POST',
                url:'admin_get_item_indent_calculations.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_status:place_status,place_id:place_ids,ids:idss2},
                success:function(html){  
                  if(html){
                     $('#text_quantity'+idss2).val(html);
                     $('#txtOccupation'+idss2).val(html);
                    return html;
                    }
  }
            });
        }

</script>
