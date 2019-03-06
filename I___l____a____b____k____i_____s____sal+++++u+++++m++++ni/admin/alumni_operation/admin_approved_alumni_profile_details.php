<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
    	<div class="text-center ">
			 
        <?php $msg->display(); ?>
    
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
    
  
  <div class="tab-content">
  
    
    <table  class="table  table-striped">
    
 <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"><h4>View Alumni Information</h4> </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>



    
      <tr>
        <td>
        
          <table class="table">

          <?php
        $query ="SELECT * FROM `master_user_registration` where `sl_no`='$sl_no'";   
        $query_exe = mysqli_query($conn,$query);
        if(mysqli_num_rows($query_exe)){          
        while($rec = mysqli_fetch_array($query_exe)){
        ?>
            <tr>
              <td><h4><b>Sl.No</b></h4></td>
              <td>:</td>
              <td> <input type="hidden" name="slno" value="<?php echo $rec['sl_no'];?>"><?php echo $rec['sl_no'];?></td>
            </tr>
            <tr>
              <td><h4><b>Name</b></h4></td>
              <td>:</td>
              <td><?php echo $rec['name'];?></td>
            </tr>
            <tr>
              <td><h4><b>E-mail</h4></b></td>
              <td>:</td>
              <td><?php echo $rec['email'];?></td>
            </tr>
            <tr>
              <td><h4><b>Mobile No</h4></b></td>
              <td>:</td>
              <td><?php echo $rec['Mobile_no'];?></td>
            </tr>
            <tr>
              <td><h4><b>Passing Year</h4></b></td>
              <td>:</td>
              <td><?php echo $rec['pass_year'];?></td>
            </tr>
             <tr>
              <td><h4><b>Stream</h4></b></td>
              <td>:</td>
              <td><?php echo $rec['stream'];?></td>
            </tr>
             <tr>
              <td><h4><b>Password</h4></b></td>
              <td>:</td>
              <td><?php echo $rec['password'];?></td>
            </tr>
               <tr>
              <td><h4><b>Redg.No</h4></b></td>
              <td>:</td>
              <td><?php echo $rec['reg_no'];?></td>
            </tr>
          </table>
        </td>
        <td><img height="200" width="200" src="../../upload/cadidate_reg_photo/<?php echo $rec ['photo'];?> "?>                 
      </td>        
      </tr>
      <?php
        }
        }
      ?>
      <tr>
       <tr>
      <td>
    <b> Rejected </b><input type="radio" name="click" value="Rejected">




      <b>Approved</b><input type="radio" name="click" value="Approved"> <br>
     <td> 
     <input type="submit" name="submit" value="Ok">
      </tr>
     
     <!-- <input type="submit" name="submit" value="Ok"> -->
      </tr>
    </table>
     <a href="admin_profile_approved.php" class="btn">Back</a>
   
  </div>
  </div>
 
  <br>
          
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
