<?php

  session_start();
  ob_start();
if(isset($_SESSION['alumni_tech'])){
    require 'FlashMessages.php';
    include '../config.php';
  
    $msg = new \Preetish\FlashMessages\FlashMessages();
    // print_r($_REQUEST);
    // Array ( [serial] => 3// user table [receiver] => 2 [ids_uni] => 1 //postid) view_status
    // 
    // 
    $serial=$_REQUEST['serial']; // vied post
    
    $query_admin="SELECT * FROM `admin_admin_post` where `slno`='$serial' ";
    $sql_exe_admin=mysqli_query($conn,$query_admin);
    $res_admin=mysqli_fetch_assoc($sql_exe_admin); 
    ?>
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
  <section class="content-header">
      <h1>
          Message 
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Message Information </a></li>
          <li class="active">View Messages</li>
        </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
      <div class="text-center ">       
          <?php $msg->display(); ?>   
        </div>
       <div class="row">
        <div class="col-md-12"> 
          <div class="panel panel-default">
            <div class="panel-heading text-center success">Admin Post</div>
        <div class="panel-body">
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" width="128" height="128" src="../upload/kiit1.jpg" alt="user image">
              <!-- 128x128 -->
                  <span class="username">
                    <a href="#">Admin</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
              <span class="description">Shared publicly - <?=$res_admin['date']?>  <?=$res_admin['time']?></span>
            </div>
            <!-- /.user-block -->
            <p>
             <?=$res_admin['text_message']?>
            </p>
            <?php if(!empty($res_admin['attach_file'])){?>
            <div class="col-sm-12 text-center">
            <!-- <iframe src="../uploads/public_post/<?=$res['attach_file']?>" style="    width: 819px; height: 20pc;"></iframe> -->
                <img class="img-responsive" src="../uploads/admin_public_post/<?=$res_admin['attach_file']?>" alt="Photo">
              </div>
              <?php }?>
              <br>
            <ul class="list-inline">
              <!-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li> -->
              <li>
              </li>
              <li class="pull-right">
                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                  (<?=$res_admin['comment']?>)</a></li>
              </ul>
              
            <div class="row">
              <div class="col-md-12">
              
              <?php 
              $post_ids_admin=$res_admin['slno'];
              $comment_admin="SELECT * FROM `master_admin_comment` WHERE `post_id`='$post_ids_admin'  ORDER BY `date` DESC,`time` DESC ";

              $sql_exe_comment_admin=mysqli_query($conn,$comment_admin);
              while($res_comment_admin=mysqli_fetch_assoc($sql_exe_comment_admin)){
              $slno_user_admin=$res_comment_admin['user_id'];
              $query1_user = "SELECT * FROM `master_user_registration` where `sl_no`='$slno_user_admin'";
                $query_exe1_user= mysqli_query($conn,$query1_user);
                $rec1_user=mysqli_fetch_assoc($query_exe1_user);
                ?>

              <!-- the comments -->
              <h4><i class="fa fa-comment"></i> <?=$rec1_user['name']?>:
                  <small> <?=$res_comment_admin['time']?> on <?=$res_comment_admin['date']?></small>
              </h4>
              <p><?=$res_comment_admin['message']?></p>

             <?php }?>
              
            
            </div>
            </div>
            

          </div>
             <div class="row">
              <div class="text-center">
              <a href="alumni_dashboard.php">Back</a>
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
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>  