<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
$sl_no_receiver=$_GET['serial'];
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
<section class="content">
<!-- success or error message alert -->
<div class="text-center">
<?php $msg->display(); ?>
</div>
<!-- end success or error message alert  -->
<div class="box">
 <ul class="nav nav-pills nav-tabs nav-justified">
  <li class="active"><a data-toggle="pill" href="#home">View Profile Details </a></li>
 </ul>
       <div class="panel-body">
       <div class="panel panel-default" style="padding-left: 177px;">
        <form action="Send_friend_request.php" method="POST">
        <?php
        $sl_no= $_SESSION['sl_no'];
        $query = "SELECT * FROM `master_user_registration` where `sl_no`='$sl_no_receiver'";
        $query_exe = mysqli_query($conn,$query);
        if(mysqli_num_rows($query_exe)){
        while($rec=mysqli_fetch_assoc($query_exe)){      
        ?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="img"> Image:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="id" value="<?php echo $sl_no; ?>"  />
                 <img width="400" height="200" src="../uploads/gallery/<?php echo $rec['photo'];?>">
                  <br>
                  <br>
               <span id="myerror" style="color: red;"></span>
             </div>
           </div>
           
         <div class="form-group">
           <label class="control-label col-sm-3" for="img"> Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="sl_no_receiver" value="<?php echo $sl_no_receiver; ?>"/>
                 <div><h4><?php echo $rec['name'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

          <div class="form-group">
           <label class="control-label col-sm-3" for="img"> Year Passing:</label>
              <div class="col-sm-10 col-md-8">
                
                 <div><h4><?php echo $rec['pass_year'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
           <label class="control-label col-sm-3" for="img"> Stream:</label>
              <div class="col-sm-10 col-md-8">
                
                 <div><h4><?php echo $rec['stream'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
           <label class="control-label col-sm-3" for="img"> Email:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="email" value="<?php echo $rec['email']; ?>"/>
                 <div><h4><?php echo $rec['email'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
     
         <?php
         $query = "SELECT * FROM `master_personal_profile` where `sl_no`='$sl_no'";
         $query_exe = mysqli_query($conn,$query);
         if(mysqli_num_rows($query_exe)){
         While($rec=mysqli_fetch_array($query_exe)){      
         ?> 
           
          <div class="form-group">
           <label class="control-label col-sm-3" for="img"> Current Occupation:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="id" value="<?php echo $sl_no; ?>"/>
                 <div><h4><?php echo $rec['current_occupation'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <div class="form-group">
             <label class="control-label col-sm-3" for="img"> Designation:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="id" value="<?php echo $sl_no; ?>"/>
                 <div><h4><?php echo $rec['designation'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
             <label class="control-label col-sm-3" for="img"> Tribe:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="id" value="<?php echo $sl_no; ?>"/>
                 <div><h4><?php echo $rec['tribe'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
             <label class="control-label col-sm-3" for="img"> Employer:</label>
              <div class="col-sm-10 col-md-8">
                <input type="hidden" name="id" value="<?php echo $sl_no; ?>"/>
                 <div><h4><?php echo $rec['employer_name'];?></h4></div>
                 <br>
                 <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

           <div class="panel-body">
             <?php  
            }
          }
            ?>
             <?php  
            }
          }
            ?>
           <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <a href="search_friends.php">Back</a>
            <center>
              <input type="submit" name="submit" class="btn btn-primary btn-xs" value="Friend Request Sent">
             </center>

            </div>
           </div>
          </div>
          </form>
         </div>
        </div>
       <br>
        
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

