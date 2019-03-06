<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
$indent_id=$_GET['indent_id'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $place_id=$_SESSION['place_id'];
  $query_list="SELECT * FROM `rhc_master_district_indent` WHERE `indent_place_raised_to`='$place_id' and `indent_id`='$indent_id' AND `status`='1'";
  $sql_exe_list=mysqli_query($conn,$query_list);
  $num_rows=mysqli_num_rows($sql_exe_list);
  // if($num_rows==0){
    
  //   header('Location:admin_dashboard.php');
  //   exit;
  // }
  $date=date('d-m-Y');
  $time=date('h:i:s a');
  $date1=date('Y-m-d');
  $time1=date('H:i:s');
  $result_list=mysqli_fetch_assoc($sql_exe_list);
  $place_id_district=$result_list['indent_place_raised_by'];
  $get_district="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_id_district'";
  $sql_exec_district=mysqli_query($conn,$get_district);
  $district_fetch_detail=mysqli_fetch_assoc($sql_exec_district);
  echo strtoupper($district_fetch_detail['district_name']).'['.$district_fetch_detail['place_district_id'].']';
  

  // while(1){        
  //       // generate unique random number
  //        $numbers = "0123456789";
  //        $appno = "chal".substr( str_shuffle( $numbers ), 0, 6 );
          
  //       // check if it exists in database
  //       $qry_check = "SELECT * FROM `rhc_master_challan_no_creation` WHERE `place_issuer_id`='$place_id' And `place_issue_to`='$place_id_district' AND `challen_no`='$appno'";       
  //       $sql_check = mysqli_query($conn, $qry_check);         
  //        $rowCount = mysqli_num_rows($sql_check);      
  //       // if not found in the db (it is unique), break out of the loop
  //       if($rowCount < 1){
  //         $challen_no=$appno;
  //         $query="INSERT INTO `rhc_master_challan_no_creation`(`slno`, `challen_no`, `place_issuer_id`, `place_issue_to`, `date_creation`, `time_creation`) VALUES (NULL,'$challen_no','$place_id' ,'$place_id_district','$date1','$time1')";
  //         $sql_check = mysqli_query($conn, $query);
  //         break;
  //       }
  //     }
                      
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View indent Details
        <mdall></mdall>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Indent</a></li>
        <li><a href="admin_receive_indent_history.php">Indent History</a></li>
        <li class="active"><a href="#">View Indent Details</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Detail Indent</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="issue_forms" action="admin_issue_indent_save.php" method="POST">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Date :</label>                 
                    <?=$date?>  
                  <input type="hidden" class="form-control" name="date" value="<?=$date1?>" > 
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <input type="hidden" class="form-control" name="time" value="<?=$time1?>">
                <?=$time?>  
              </div> 
              </div> 
              <!-- <div class="col-md-6">
              <div class="form-group">
                <label for="email">Challan No :</label>
                 <?=$challen_no?>
                 <input type="hidden" name="challen_no" value="<?=$challen_no?>">
                <input type="email" class="form-control" id="email">
              </div>
              </div>   -->
              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Indent No :</label>
                  <?=$result_list['indent_id'];?>
                <input type="hidden" class="form-control" name="indent_id" value="<?=$result_list['indent_id'];?>">
              </div>
              </div> 
              
              <div class="col-md-6">      
              <div class="form-group">
                <label for="email">Indent Location :</label>
                <input type="hidden" name="receiver_id" value="<?=$district_fetch_detail['place_district_id']?>">
                <?php  echo strtoupper($district_fetch_detail['district_name']).'['.$district_fetch_detail['place_district_id'].']';?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label for="email">Issue Location :</label>
                <input type="hidden" name="issuer_id" id="issuer_id" value="<?=$place_id?>">
                BIHAR[<?=$place_id?>]
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label for="email">Status :</label>
                <input type="hidden" name="issuer_id" id="issuer_id" value="<?=$place_id?>">
                <span style="color: red">Not Issued</span>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
            </div>
              
 
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Qty Indented</th>
                 <!-- <th>Qty to Be Issued</th> -->
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody>
                  <?php 
                  $x=0;
                $query_list_item="SELECT * FROM `rhc_master_district_indent_id_details` WHERE `indent_id`='$indent_id'";
                $sql_exe_list_item=mysqli_query($conn,$query_list_item);

                while ($res_item=mysqli_fetch_assoc($sql_exe_list_item)) {
                  $x++
                  ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$res_item['item_code']?>
                      <input type="hidden" name="item_code[]" id="item_code<?=$x?>" value="<?=$res_item['item_code']?>">
                    </td>
                    <td><?=$res_item['Item_type']?>
                      <input type="hidden" name="Item_type[]" id="Item_type<?=$x?>" value="<?=$res_item['Item_type']?>">
                    </td>
                    <td><?=$res_item['item_quantity']?>
                      <input type="hidden" name="item_quantity[]" id="item_quantity<?=$x?>" value="<?=$res_item['item_quantity']?>">
                    </td>
                   <!--  <td><input type="text" name="qnt_issue[]" onclick="get_batch(<?=$x?>)" id="qnt_issue<?=$x?>" value="<?=$res_item['item_quantity']?>">
                    <br>
                    <span id="error<?=$x?>" style="color: red;"></span>
                    </td> -->
                </tr>
                <?php  ; }?>
                <input type="hidden" name="ids" id="ids" value="<?=$x?>">
              </tbody>
            </table>
            <a href="admin_receive_indent_history.php"  class="btn btn-default">Back</a> 
           <!-- <button type="button" onclick="check_before_submit();" class="btn btn-default pull-right">Submit</button> -->

                           
            
          </form>
        </div>
      </div>
      </div>
      </div>
      <!-- <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center" style="background-color: palevioletred;"><strong>Item Batch Details</strong></div>
          <div class="panel-body">
            <table class="table table-striped" >
              <tr>
                <th>Item Code</th>
                <th>Type</th>
                <th>Batch No</th>
                <th>Qty</th>
                <th>Date Of Exp.</th>
              </tr>
              <tbody id="details">
                
              </tbody>

            </table>
          </div>
        </div>

      </div> -->
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
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 
<script type="text/javascript">
var check_ajax=0;
function get_batch(id) {
  var itemcodes=$('#item_code'+id).val();
  var itemtypes=$('#Item_type'+id).val();
  var place_ids=$('#issuer_id').val();
  // var item_quantity=$('#item_quantity'+id).val();
   var item_quantity=document.getElementById("item_quantity"+id).value;
  var qnt_issue=document.getElementById("qnt_issue"+id).value;
  // var qnt_issue=$('#qnt_issue'+id).val();
  // alert((parseInt(qnt_issue)>parseInt(item_quantity)));
  if(qnt_issue!=""){
    if(parseInt(qnt_issue)>parseInt(item_quantity)){
      
      document.getElementById("error"+id).innerHTML = "Please Insert a value less  Than or equalto ("+item_quantity+")";
    }else{
       document.getElementById("error"+id).innerHTML = "";
       $.ajax({
                type:'POST',
                url:'admin_get_item_batch_details_district.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_id:place_ids,qnt_issue:qnt_issue},
                success:function(html){  
                  if(html){
                  $('#details').html(html);
                  get_quantity(id)
                  check_ajax++;
                 
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
  }else{
     document.getElementById("error"+id).innerHTML = "It should not Be left Blank ";
  }
}
function get_quantity(id) {
   var itemcodes=$('#item_code'+id).val();
  var itemtypes=$('#Item_type'+id).val();
  var place_ids=$('#issuer_id').val();
  var item_quantitys=$('#item_quantity'+id).val();
  var qnt_issues=$('#qnt_issue'+id).val();
  // alert(qnt_issue);
  if(qnt_issues!=""){
    if(parseInt(item_quantitys)>=parseInt(qnt_issues)){
      document.getElementById("error"+id).innerHTML = "";
       $.ajax({
                type:'POST',
                url:'admin_get_item_batch_details_districts.php',
                data:{itemtypes:itemtypes,itemcodes:itemcodes,place_id:place_ids,qnt_issue:qnt_issues},
                success:function(html){  
                  if(html){
                     check_ajax++;
                  // $('#details').html(html);
                  $('#qnt_issue'+id).val(html);
                  // alert(md);
                 
                   }
                   
                }
            });
        }else{
      document.getElementById("error"+id).innerHTML = "Please Insert a value less  Than or equalto ("+item_quantity+")";
     
    }
  }else{
     document.getElementById("error"+id).innerHTML = "It should not be left Blank ";
  }
}
function check_before_submit() {
  var ides=$('#ids').val();
  // alert(ides);
  var che_count=0;
 if(parseInt(check_ajax)==0){
  // alert(check_ajax);
  alert('Click On Qty To Be Issued Box');
  return false;
 }else{
  if(parseInt(check_ajax)>parseInt(ides)){
    // alert(ides);
    for (var i = 1; i <= (ides); i++) {
        var qnt_issues=$('#qnt_issue'+i).val();
        if(qnt_issues!=""){
          if(parseInt(qnt_issues)==0){
              che_count++;
              document.getElementById("error"+i).innerHTML = "";
           }
        }else{
          document.getElementById("error"+i).innerHTML = "This field can't Be Left Blank";
          alert("This field can't Be Left Blank");
        }

    }
    if(parseInt(che_count) < parseInt(ides)){
      for (var i = 1; i <= (ides); i++) {
        var qnt_issues=$('#qnt_issue'+i).val();
        if(qnt_issues!=""){
          var coun=0;
        }else{
          var coun=1;
        }

      }
      if(coun==0)
      {
        $("#issue_forms").submit(); 
      }
    }else{
      alert("Form Can't Submitted Due To Non-Availablity Of Stocks");
      return false;
    }
  }else{
     alert('Click On Qty To Be Issued Box');
     return false;
  }

 }
}
</script>
