<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
  $sl_no_one=$_SESSION['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DashBoard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			   <?php $msg->display(); ?>
		  </div>
      <div class="row">
        <!-- end success or errot message alert  -->
        <div class="col-lg-12 ">
          <div class="box">
            <div class="panel panel-default">
              <div class="panel-heading text-center success">User Post</div>
              <div class="panel-body">
              
                <form class="form-horizontal" action="admin_dashboard_save_post.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd"></label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="pwd" name="serial" value="<?=$sl_no_one?>" placeholder="Enter password">
                      
                    </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="comment">Message:</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" name="Message" rows="5" id="comment" required=""></textarea>
                    </div>
                    <div class="col-sm-3">
                      <input type="file" name="file_upload" >
                      <span style="color: red"> Please Upload Photo </span>
                    </div>
                  </div> 
                  
                      <br>                    
                      <div class="form-group text-center">
                     
                      <button type="submit" class="btn btn-default text-center">Submit</button>
                    </div>                   
                  </form>
                </div>
              </div>        
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
              <div class="panel-body">
           <?php 
            $query="SELECT * FROM `admin_user_post` ORDER BY `slno` DESC LIMIT 30 ";
            $sql_exe=mysqli_query($conn,$query);
            while ($res=mysqli_fetch_assoc($sql_exe)) {
              $slno=$res['user_slno'];
              $query = "SELECT * FROM `master_user_registration` where `sl_no`='$slno'";
                $query_exe = mysqli_query($conn,$query);
                $rec=mysqli_fetch_assoc($query_exe);
              ?>
             
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" width="128" height="128" src="../upload/cadidate_reg_photo/<?php echo $rec['photo'];?>" alt="user image">
                    <!-- 128x128 -->
                        <span class="username">
                          <a href="#"><?php echo $rec['name'] ;?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - <?=$res['date']?>  <?=$res['time']?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                   <?=$res['text_message']?>
                  </p>
                  <?php if(!empty($res['attach_file'])){?>
                  <div class="col-sm-12 text-center">
                  <!-- <iframe src="../uploads/public_post/<?=$res['attach_file']?>" style="    width: 819px; height: 20pc;"></iframe> -->
                      <img class="img-responsive" src="../uploads/public_post/<?=$res['attach_file']?>" alt="Photo">
                    </div>
                    <?php }?>
                    <br>
                  <ul class="list-inline">
                    <!-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li> -->
                    <li><a href="update_like_status.php?post_id=<?=$res['slno']?>&status=1" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like (<?=$res['vote_up']?>)</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (<?=$res['comment']?>)</a></li>
                    </ul>
                    <form action="comment.php" method="Post">
                    <div class="col-md-10">
                    <input type="hidden" name="post_id" value="<?=$res['slno']?>">
                      <input class="form-control input-sm" name="comment_detail" placeholder="Type a comment" type="text" required="">
                      </div>
                      <div class="col-md-2">
                      <input class="form-control input-sm" type="submit" name="comment" value="POST">
                      </div>
                  </form>
                  <div class="row">
                    <div class="col-md-12">
                    
                    <?php 
                    $post_ids=$res['slno'];
                    $comment="SELECT * FROM `master_comment` WHERE `post_id`='$post_ids'  ORDER BY `date` DESC,`time` DESC LIMIT 3  ";

                    $sql_exe_comment=mysqli_query($conn,$comment);
                    while($res_comment=mysqli_fetch_assoc($sql_exe_comment)){
                    $slno_user=$res_comment['user_id'];
                    $query1 = "SELECT * FROM `master_user_registration` where `sl_no`='$slno_user'";
                      $query_exe1= mysqli_query($conn,$query1);
                      $rec1=mysqli_fetch_assoc($query_exe1);
                      ?>

                    <!-- the comments -->
                    <h4><i class="fa fa-comment"></i> <?=$rec1['name']?>:
                        <small> <?=$res_comment['time']?> on <?=$res_comment['date']?></small>
                    </h4>
                    <p><?=$res_comment['message']?></p>

                   <?php }?>
                    
                  
                  </div>
                  </div>
                  

                </div>
                
                <?php }?>
                <!-- /.post -->

                
             </div>
          </div>
          
          <!-- /.nav-tabs-custom -->
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
