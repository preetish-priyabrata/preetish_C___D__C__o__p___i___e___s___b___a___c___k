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
<style type="text/css">
  input[type=file]{
    width:100%;
    color:transparent;
}
</style>
    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			   <?php $msg->display(); ?>
		  </div>
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7">        
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
                        <!-- <input type="file" name="file_upload" > -->
                        <input type='file' title="Choose a Photo please" id="aa"  name="file_upload"  onchange="pressed()">
                        <br>
                        <label id="fileLabel">Choose a photo file</label>
                        <br>
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
              $query="SELECT * FROM `admin_user_post` where `status`='1' ORDER BY `slno` DESC LIMIT 30 ";
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
                       <input type="hidden" name="post_id_type" value="11">
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
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5">
      <div class="row">
          <div class="col-md-12"> 
              <div class="panel panel-default">
              <div class="panel-heading text-center success">Admin Post</div>
                <div class="panel-body">
             <?php 
              $query_admin="SELECT * FROM `admin_admin_post` ORDER BY `slno` DESC LIMIT 30 ";
              $sql_exe_admin=mysqli_query($conn,$query_admin);
              while ($res_admin=mysqli_fetch_assoc($sql_exe_admin)) {
                // $slno=$res['user_slno'];
                // $query = "SELECT * FROM `master_user_registration` where `sl_no`='$slno'";
                //   $query_exe = mysqli_query($conn,$query);
                //   $rec=mysqli_fetch_assoc($query_exe);
                ?>
               
                  <!-- Post -->
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
                      <form action="comment.php" method="Post">
                      <div class="col-md-8">
                      <input type="hidden" name="post_id_type" value="22">
                      <input type="hidden" name="post_id" value="<?=$res_admin['slno']?>">
                        <input class="form-control input-sm" name="comment_detail" placeholder="Type a comment" type="text" required="">
                        </div>
                        <div class="col-md-4">
                        <input class="form-control input-sm" type="submit" name="comment" value="POST">
                        </div>
                    </form>
                    <div class="row">
                      <div class="col-md-12">
                      
                      <?php 
                      $post_ids_admin=$res_admin['slno'];
                      $comment_admin="SELECT * FROM `master_admin_comment` WHERE `post_id`='$post_ids_admin'  ORDER BY `date` DESC,`time` DESC LIMIT 3  ";

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
                  
                  <?php }?>
                  <!-- /.post -->
               </div>
            </div>
            
            <!-- /.nav-tabs-custom -->
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
  window.pressed = function(){
    var a = document.getElementById('aa');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose file";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};
</script>