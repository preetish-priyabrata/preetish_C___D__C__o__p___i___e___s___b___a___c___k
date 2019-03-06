<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
//$sl_no=$_GET['user_id'];
$msg = new \Preetish\FlashMessages\FlashMessages();

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       View Approved Post
        <small> </small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
      <div class="text-center ">
       
        <?php $msg->display(); ?>
    
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">View Approved Post </a></li>
    
  </ul>
  
<?php
 $s_user_id=$_SESSION['email'];
 $query1 ="SELECT * FROM `user_sharing_info_details` where `status`='1' and `user_id`='$s_user_id'";
 $query_exe1 = mysqli_query($conn,$query1);

  while($fetch = mysqli_fetch_array($query_exe1)){

     $post_type=$fetch['post_type'];
          switch ($post_type) {
            case '1':
              ?>
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                    <div class="panel-body"><img class="img-responsive" src="../uploads/photo/<?php echo $fetch['photo'];?> "?>
                    </div>
                  </div>
                    
                </div>  
                </div>
              <?php
              break;
            case '2':?>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                      <div class="panel-body"><p class="text-center"> <?php echo $fetch['text'];?></p>
                      </div>
                    </div>
                    
                  </div>  
                </div>
           
            <?php
              break;
            case '3':
              ?>
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                      <div class="panel-body"><iframe src="<?php echo $fetch['url'];?>" width="800" height="700"></iframe>
                      <p><a href="<?php echo $fetch['url'];?>" target="iframe_a">Click Here To view </a></p>
                      </div>
                    </div>
                    
                  </div>  
                </div>
              
              <?php
              break;
            case '4':
             ?>
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                      <div class="panel-body"><img class="img-responsive" src="../uploads/photo/<?php echo $fetch['photo'];?> "?>
                      <p class="text-center"> <?php echo $fetch['text'];?></p>
                      </div>
                    </div>                    
                  </div>  
                </div>
             <?php
              break;
            default:
              # code...
              break;
          }
  }

 ?>

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
