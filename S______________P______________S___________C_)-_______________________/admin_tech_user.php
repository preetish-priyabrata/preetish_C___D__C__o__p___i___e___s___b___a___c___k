<?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['admintech_exam'])
{
  require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
 ?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>





<?php }else{
	header("location:logout.php");
	exit;
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';
?>



<div class="container">
  <h2>List Of Admin Users</h2>
  <p class="text-right"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Add Manage Users</button>
</p>            
  <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th>Slno</th>
        <th>Users Type</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Id</th>
        <th>Status Display</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $qry_answer="SELECT * FROM `user_master_data` WHERE `status`!='3'";
      $sql_answer=mysqli_query($conn,$qry_answer);
      $x=0;
      while ($res_admin=mysqli_fetch_array($sql_answer)) {
        $x++;
        ?>
        <tr>
        <td><?=$x?></td>
        <td><?=$res_admin['usertype']?></td>
        <td><?=$res_admin['username']?></td>
        <td><?=$res_admin['user_email']?></td>
        <td><?=$res_admin['userid']?></td>
        <td>
          <?php
        if(($res_admin['status'])=='0')
        {
        ?>
        <a class="btn btn-warning btn-sm" href="admin_tech_user_save.php?status=<?php echo $res_admin['slno'];?>" 
          onclick="return confirm('Activate <?php echo $data?>');">De-Activate</a>
        
        <?php
        }
        if(($res_admin['status'])=='1')
        {
        ?>
        <a class="btn btn-info btn-sm" href="admin_tech_user_save.php?status=<?php echo $res_admin['slno'];?>"  onclick="return confirm('De-activate <?php echo $data?>');">Activate</a>
        
        <?php
        }
        ?>
       </td>
        <td>
        <?php $data1="Password will send To ".$res_admin['user_email']." very soon Thank You"; ?>
         <a class="btn btn-info btn-sm" href="admin_tech_user_save.php?passwordreset=<?php echo $res_admin['slno'];?>"  onclick="return confirm('Reset Password <?php echo $data1?>');">Reset Password</a><br>
         <br>
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#update<?=$x?>">Delete</button>
        </td>
        </tr>
   <?php   

   } ?>

    </tbody>
  </table>
</div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Admin User</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="add_users" action="admin_tech_user_save.php" role="form" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Exam">User Type :</label>
			    <div class="col-sm-10">
			     <select id="utype1" name="utype1" class="form-control text-center" required="">
                  <option value="">--Select User Type--</option>
                  <option value="pre exam">Pre-Exam Officer</option>
                  <option value="post exam">Post-Exam Officer</option>
                  <!-- <option value="admin exam">Admin-Exam Officer</option> -->
                  <option value="verification exam">First Verification-Exam Officer</option>
                  <option value="admintech exam">Admin Tech-Exam Officer</option>
                  <option value="final verification">Final Verification-Exam Officer</option>
                  <option value="admin operational">Admin Operational Officer</option>
                  </select>
                   <span id="errorne" style="color:red" ></span>
			    </div>
          
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Attach">User Name : </label>
			    <div class="col-sm-10">
			     <input type="text" id="uname" name="uname" class="form-control" required="" />
			     <span id="errornew" style="color:red" ></span>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Attach">Phone No : </label>
			    <div class="col-sm-10">
			     <input type="text" id="phone" name="phone" class="form-control" required="" />
			     <span id="errornews1" style="color:red" ></span>
			    </div>
			  </div>
			 <div class="form-group">
			    <label class="control-label col-sm-2" for="Attach">User Email : </label>
			    <div class="col-sm-10">
			     <input type="text" id="uname1" name="uname1" class="form-control" required="" />
			     <span id="errornews" style="color:red" ></span>
			    </div>
			  </div>
			  
			 <input type="hidden" name="add_user" value="add_users">
        </div>
        <div class="modal-footer">
        <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" onclick="check_users()" class="btn btn-primary" >Save</button>
			      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>
			  </div>
          
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php 
 $qry_answer1="SELECT * FROM `user_master_data`";
      $sql_answer1=mysqli_query($conn,$qry_answer1);
      $i=0;
      while ($res_admin1=mysqli_fetch_array($sql_answer1)) {
        $i++;
        ?>
  <!-- Modal -->
  <div class="modal fade"  role="dialog" id="update<?=$i?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:red;">Delete Admin User id :-<?=$res_admin1['userid']?>
</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="admin_tech_user_save.php" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">User Type :</label>
          <div class="col-sm-10">
            <?=$res_admin1['usertype']?>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">User Name :</label>
          <div class="col-sm-10">
            <?=$res_admin1['username']?>
            </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">User Email :</label>
          <div class="col-sm-10">
            <?=$res_admin1['user_email']?>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">User id :</label>
          <div class="col-sm-10">
            <?=$res_admin1['userid']?>
            </div>
        </div>

          
        
       
        
      
        </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="slno" value="<?=$res_admin1['slno']?>" >
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

  <script type="text/javascript">
    function check_users(){
        var cat=$('#uname1').val();
        var uname1=$('#uname').val();
        
        var phone1=$('#phone').val();
        var utype11=$('#utype1').val();
         
        if(utype11!=""){
            document.getElementById("errornew").innerHTML = "";
                  
          if(uname1!=""){
             document.getElementById("errornew").innerHTML = "";
                 
            if(phone1!=""){
            
               document.getElementById("errornews1").innerHTML = "";
                  
              if(cat!=""){ 
                 
                      $.ajax({
                          type: "POST",
                          url: "search_admin_user.php",
                           data: {email:cat,usertype:utype11},
                          success: function(result)   {
                              if(result==1){
                                   document.getElementById("errornews").innerHTML = "";
                                  $("#add_users").submit(); 
                              }else{
                                document.getElementById("errornews").innerHTML = "This Email Is Present In Our Datebase ,"+cat;
                                return false;
                              }
                          }
                      });           
              }else{
                  document.getElementById("errornews").innerHTML = "Admin Email id Should Not Left Blank ";
                  return false;

              }
            }else{
               document.getElementById("errornews1").innerHTML = "Admin User Phone Nos Should Not Left Blank";
                  return false;
            }
          }else{
            
             document.getElementById("errornew").innerHTML = "Admin User Name Should Not Left Blank";
                  return false;
          }
        }else{
           document.getElementById("errorne").innerHTML = "Admin Type Should Be Selected";
                  return false;
        }
        

    }
    </script>