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
  <h2>List Of Centers</h2>
  <p class="text-right"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Add Center</button>
</p>            
  <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th>Slno</th>
        <th>Center Name</th>
        <th>Address</th>
        <th>Contact Person</th>
        <th>Contact email</th>
        <th>Contact Mobile</th>
        <th>Capactiy</th>
        <th>Status Display</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $qry_center="SELECT * FROM `center_master_data` WHERE `status`!='3'";
      $sql_center=mysqli_query($conn,$qry_center);
      $x=0;
      while ($res_center=mysqli_fetch_array($sql_center)) {
        $x++;
        ?>
        <tr>
        <td><?=$x?></td>
        <td><?=$res_center['examcenter']?></td>
        <td><?=$res_center['address']?></td>
        <td><?=$res_center['contact_person']?></td>
        <td><?=$res_center['contact_no']?></td>
        <td><?=$res_center['emailid']?></td>
         <td><?=$res_center['sitting_capacity']?></td>
        <td>
          <?php
        if(($res_center['status'])=='0')
        {
        ?>
        <a class="btn btn-warning btn-sm" href="admin_operation_save_manage_center.php?status=<?php echo $res_center['slno'];?>" 
          onclick="return confirm('Activate <?php echo $data?>');">De-Activate</a>
        
        <?php
        }
        if(($res_center['status'])=='1')
        {
        ?>
        <a class="btn btn-info btn-sm" href="admin_operation_save_manage_center.php?status=<?php echo $res_center['slno'];?>"  onclick="return confirm('De-activate <?php echo $data?>');">Activate</a>
        
        <?php
        }
        ?>
       </td>
        <td>
      
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update<?=$x?>">update</button><br>
         <br>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#view<?=$x?>">view Details</button>
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
          <h4 class="modal-title">Add Center</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="add_users" action="admin_operation_save_manage_center.php" role="form" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Exam">Center Name : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			    <input type="text" id="center_name" name="center_name" class="form-control" required="" />
			    </div>
          
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">center Address : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     
			     <textarea name="center_address" class="form-control" rows="5" required=""></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Contact Person : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="contact_person" name="contact_person" class="form-control" required="" />
			     
			    </div>
			  </div>
			 <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Contact Mobile : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="contact_mobile" name="contact_mobile" class="form-control" required="" />
			     
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Contact Email : <span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="contact_email" name="contact_email" class="form-control" required="" />
			     
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Alt Contact Person :<span style="color:blue;">(optional)</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="alt_conatct_person" name="alt_conatct_person" class="form-control" />
			     
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Alt Contact Mobile :<span style="color:blue;">(optional)</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="alt_conatct_mobile" name="alt_conatct_mobile" class="form-control" />
			     
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Alt Contact Email :<span style="color:blue;">(optional)</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="alt_conatct_email" name="alt_conatct_email" class="form-control"  />
			     
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="Attach">Capacity Of Sitting :<span style="color:red;">*</span></label>
			    <div class="col-sm-8">
			     <input type="text" id="capacity_center" name="capacity_center" class="form-control" required=""  />
			     
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
 $qry_center1="SELECT * FROM `center_master_data`";
      $sql_center1=mysqli_query($conn,$qry_center1);
      $i=0;
      while ($res_center1=mysqli_fetch_array($sql_center1)) {
        $i++;

        ?>
  
  <div class="modal fade"  role="dialog" id="delete<?=$i?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:red;">Delete Center :- <?=$res_center1['examcenter']?>
</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="admin_operation_save_manage_center.php" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Center Name :</label>
          <div class="col-sm-10">
             <?=$res_center1['examcenter']?>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Center Address :</label>
          <div class="col-sm-10">
           <?=$res_center1['address']?>
            </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Sitting Capacity:</label>
          <div class="col-sm-10">
            <?=$res_center1['sitting_capacity']?>
            </div>
        </div>
      </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="slno" value="<?=$res_center1['slno']?>" >
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
  
  <!-- modal view center -->
   <?php 
 $qry_center12="SELECT * FROM `center_master_data`";
      $sql_center12=mysqli_query($conn,$qry_center12);
      $ij=0;
      while ($res_center12=mysqli_fetch_array($sql_center12)) {
        $ij++;

        ?>
  
  <div class="modal fade"  role="dialog" id="view<?=$ij?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:blue;">View Center :- <?=$res_center12['examcenter']?>
</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" >
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Center Name :</label>
          <div class="col-sm-10">
             <?=$res_center12['examcenter']?>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Center Address :</label>
          <div class="col-sm-10">
           <?=$res_center12['address']?>
            </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Sitting Capacity:</label>
          <div class="col-sm-10">
            <?=$res_center12['sitting_capacity']?>
            </div>
        </div>
        <div class="form-group">
           <label class="control-label col-sm-2" for="Attach">Contact Person : </label>
          <div class="col-sm-8">
          <?=$res_center12['contact_person']?>
           
          </div>
        </div>
       <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Contact Mobile : </label>
          <div class="col-sm-8">
           <?=$res_center12['contact_no']?>
           
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Contact Email : </label>
          <div class="col-sm-8">
          <?=$res_center12['emailid']?>
           
          </div>
        </div>
        <?php if($res_center12['alt_contact_person']!=""){?>
         <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Alt Contact Person :</label>
          <div class="col-sm-8">
          <?=$res_center12['alt_contact_person']?>
           
          </div>
        </div>
        <?php }
          if($res_center12['alt_mobile_no']!=""){
        ?>        <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Alt Contact Mobile :</label>
          <div class="col-sm-8">
           <?=$res_center12['alt_mobile_no']?>
           
          </div>
        </div>
        <?php }
        if($res_center12['alt_email_id']!=""){?>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Alt Contact Email :</label>
          <div class="col-sm-8">
           <?=$res_center12['alt_email_id']?>
           
          </div>
        </div>
        <?php }?>
      </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
          </div>
        </form>
       
      </div>
    </div>
  </div>
  <?php  }?>

   <!-- modal view center -->
   <?php 
 $qry_center123="SELECT * FROM `center_master_data`";
      $sql_center123=mysqli_query($conn,$qry_center123);
      $ijz=0;
      while ($res_center123=mysqli_fetch_array($sql_center123)) {
        $ijz++;

        ?>
  
  <div class="modal fade"  role="dialog" id="update<?=$ijz?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:blue;">View Center :- <?=$res_center123['examcenter']?>
</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal"  action="admin_operation_save_manage_center.php" role="form" method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Center Name :</label>
          <div class="col-sm-10">
          <input type="text" id="center_name" name="center_name" class="form-control" required="" value=" <?=$res_center123['examcenter']?>" />
            
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Center Address :</label>
          <div class="col-sm-10">
          <textarea name="center_address" class="form-control" rows="5" required=""><?=$res_center123['address']?></textarea>
         
            </div>
        </div>
       
        <div class="form-group">
           <label class="control-label col-sm-2" for="Attach">Contact Person : </label>
          <div class="col-sm-8">
          <input type="text" id="contact_person" name="contact_person" class="form-control" required="" value="<?=$res_center123['contact_person']?>" />
         
           
          </div>
        </div>
       <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Contact Mobile : </label>
          <div class="col-sm-8">
          
           <input type="text" id="contact_mobile" name="contact_mobile" class="form-control" required="" value="<?=$res_center123['contact_no']?>" />
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Contact Email : </label>
          <div class="col-sm-8">
         
           <input type="text" id="contact_email" name="contact_email" class="form-control" required="" value="<?=$res_center123['emailid']?>" />
          </div>
        </div>
        
         <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Alt Contact Person :</label>
          <div class="col-sm-8">
          
           <input type="text" id="alt_conatct_person" name="alt_conatct_person" class="form-control" value="<?=$res_center123['alt_contact_person']?>" />
          </div>
        </div>
                <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Alt Contact Mobile :</label>
          <div class="col-sm-8">
         
           <input type="text" id="alt_conatct_mobile" name="alt_conatct_mobile" class="form-control" value="<?=$res_center123['alt_mobile_no']?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Alt Contact Email :</label>
          <div class="col-sm-8">
          
           <input type="text" id="alt_conatct_email" name="alt_conatct_email" class="form-control"  value="<?=$res_center123['alt_email_id']?>" />
          </div>
        </div>
          <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Sitting Capacity:</label>
          <div class="col-sm-10">
          <input type="text" id="capacity_center" name="capacity_center" class="form-control" required=""  value="<?=$res_center123['sitting_capacity']?>" />
           
            </div>
        </div>
      </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
           <input type="hidden" name="slno" value="<?=$res_center123['slno']?>" >
            <input type="submit" class="btn btn-info" value="Update" name="update">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
          </div>
        </form>
       
      </div>
    </div>
  </div>
  <?php  }?>