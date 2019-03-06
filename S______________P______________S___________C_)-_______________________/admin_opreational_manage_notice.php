<?php 
error_reporting(0);
ob_start();
session_start();
require 'FlashMessages.php';
include "config.php";
	if($_SESSION['admin_operational_exam']){
$msg = new \Preetish\FlashMessages\FlashMessages();
 
 echo ' <div class="text-center">';
   $msg->display();  
 echo  '</div>';


	}else{
  		header('location:logout.php');
      exit;
	}

	$contents = ob_get_contents();
	ob_clean();
	include_once 'template_data_table.php';
?>
<div class="container-fluid">
  <h2>List Of Notice</h2>
  <p class="text-right"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Add Notice</button>
</p>            
  <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th>Slno</th>
        <th>Heading</th>       
        <th>Attachment</th>       
        <th>Status Display</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $qry_exam="SELECT * FROM `notice_master_data` WHERE `status`!='3'";
      $sql_exam=mysqli_query($conn,$qry_exam);
      $x=0;
      while ($res_exam=mysqli_fetch_array($sql_exam)) {
        $x++;
        ?>
        <tr>
        <td><?=$x?></td>
        <td><?=$res_exam['heading']?></td>
        
        <td><a href="uploads/notices/<?=$res_exam['notice_attachment']?>">click here view</a></td>
        
        <td>
          <?php
        if(($res_exam['status'])=='0')
        {
        ?>
        <a class="btn btn-warning btn-sm" href="admin_operation_save_manage_notice.php?status=<?php echo $res_exam['slno'];?>" 
          onclick="return confirm('Activate <?php echo $data?>');">De-Activate</a>
        
        <?php
        }
        if(($res_exam['status'])=='1')
        {
        ?>
        <a class="btn btn-info btn-sm" href="admin_operation_save_manage_notice.php?status=<?php echo $res_exam['slno'];?>"  onclick="return confirm('De-activate <?php echo $data?>');">Activate</a>
        
        <?php
        }
        ?>
       </td>
        <td>
      
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?=$x?>">Update</button>
          <br>
         <br>
         
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$x?>">Delete</button>
        </td>
        </tr>
   <?php   

   } ?>

    </tbody>
  </table>
</div>

<!--add Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Notice</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="add_users" action="admin_operation_save_manage_notice.php" role="form" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Exam">Notice Heading : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			    <textarea class="form-control" rows="5" name="notice_heading" required=""></textarea>
			    </div>
          
			  </div>
        
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">File Attachement: <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="file" id="file_attach" name="file_attach"  required="" />
			     
			    </div>
			  </div>
			 
			  
			
        </div>
        <div class="modal-footer">
        <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit"  class="btn btn-primary" name="save" >Save</button>
			      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>
			  </div>
          
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal delete center -->
   <?php 
 $qry_center1="SELECT * FROM `notice_master_data`";
      $sql_center1=mysqli_query($conn,$qry_center1);
      $i=0;
      while ($res_exam1=mysqli_fetch_array($sql_center1)) {
        $i++;
        
        ?>
  
  <div class="modal fade"  role="dialog" id="delete<?=$i?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:red;">Delete Notice :- <?=$res_exam1['heading']?>
</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="admin_operation_save_manage_notice.php" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Notice Heading:</label>
          <div class="col-sm-10">
             <?=$res_exam1['heading']?>
            </div>
        </div>
        
        
      </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="slno" value="<?=$res_exam1['slno']?>" >
            <input type="submit" class="btn btn-danger" value="Delete" name="Deleted">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
          
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php  }?>
  <?php 
 $qry_center12="SELECT * FROM `notice_master_data`";
      $sql_center12=mysqli_query($conn,$qry_center12);
      $ii=0;
      while ($res_exam12=mysqli_fetch_array($sql_center12)) {
        $ii++;
        
        ?>
  <!--add Modal -->
  <div class="modal fade" id="update<?=$ii?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Notice</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="add_users" action="admin_operation_save_manage_notice.php" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-4" for="Exam">Notice Heading : <span style="color:red;">*</span></label>
          <div class="col-sm-8">
          <textarea class="form-control" rows="5" name="notice_heading" required="" ><?=$res_exam12['heading']?></textarea>
          </div>
          
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4" for="Attach">File Attachement: <span style="color:red;">*</span></label>
          <div class="col-sm-8">
            <input type="hidden" name="slno" value="<?=$res_exam12['slno']?>" >
           <input type="file" id="file_attach" name="file_attach"   />
            <input type="hidden" id="file_attach" name="upload_file"  value="<?=$res_exam12['notice_attachment']?>" />
          </div>
        </div>
       
        
      
        </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit"  class="btn btn-primary" name="update_notice" >Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
          
        </div>
        </form>
      </div>
    </div>
  </div>
  
   <?php } ?>
   <script>
            $(function () {
             
        $("#date_exam").datepicker({
                     changeMonth: true,
                    changeYear: true,
          
          dateFormat: "yy-mm-dd" 
                });
        $("#StartDate").datepicker({
    dateFormat: 'yy-mm-dd',
    minDate: 0,
    showOtherMonths: true,
    selectOtherMonths: true,
    onSelect: function (selectedDate) {
        if (this.id == 'StartDate') {
            //console.log(selectedDate);//2014-12-30
            var arr = selectedDate;
             //console.log(arr);
            //var date = new Date(arr[2]+"-"+arr[1]+"-"+arr[0]);
             var date = new Date(arr);
            var d = date.getDate();
            //console.log(d);
            var m = date.getMonth();
            // console.log(m);
            var y = date.getFullYear();
            //console.log(y);
            var minDate = new Date(y, m, d + 40);
            $("#EndDate").datepicker('setDate', minDate);

        }
    }
});
$("#EndDate").datepicker({dateFormat: 'yy-mm-dd',showOtherMonths: true,
    selectOtherMonths: true});
       
          });
        </script>