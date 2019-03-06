<?php
// print_r($_REQUEST);
// exit;
	session_start();
if(isset($_SESSION['alumni_tech'])){
		require 'FlashMessages.php';
		include '../config.php';
  
	 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// print_r($_REQUEST);
		// Array ( [serial] => 3// user table [receiver] => 2 [ids_uni] => 1 //postid) view_status
		// 
		// 
	 	// $serial=$_REQUEST['serial']; // vied post
    // $receiver=$_REQUEST['receiver'];// view id
    //$ids_uni=$_REQUEST['ids_uni']; //postid
    // $sl_no_one=$_SESSION['sl_no']; 

    // $check="SELECT * FROM `master_user_post_admin` WHERE `slno`='$serial' and `user_id`='$sl_no_one'";
    // $sql_exe_check=mysqli_query($conn,$check);
    // $num=mysqli_num_rows($sql_exe_check);
    // if($num=="1"){
    //   $fetch=mysqli_fetch_assoc($sql_exe_check);
    //   $status=$fetch['view_status'];
    //   if($status=="0"){
    //     $date=date('Y-m-d');
    //     $time=date('H:i:s');
    //     $update_query="UPDATE `master_user_post_admin` SET `view_status`='1' WHERE `slno`='$serial'";
    //     $sql_exe_check=mysqli_query($conn,$update_query);
    //   }
    // }else{
    //   $msg->warning('Some went worng please Contact admin');
    //   header('Location:alumni_dashboard.php');
    //   exit();
    // }
   // $query_admin="SELECT * FROM `admin_admin_post_temp` where `slno`='$ids_uni' ";
    //$sql_exe_admin=mysqli_query($conn,$query_admin);
   // $res_admin=mysqli_fetch_assoc($sql_exe_admin); 
    //?>
		
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
	<section class="content-header">
    	<h1>
        	Notice 
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li><a href="#"> Notice Information </a></li>
       		<li class="active">View Notices</li>
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
             <?=$res_admin['notice']?>
            </p>
            <?php if(!empty($res_admin['attach_file'])){?>
            <div class="col-sm-12 text-center">
            <!-- <iframe src="../uploads/public_post/<?=$res['attach_file']?>" style="    width: 819px; height: 20pc;"></iframe> -->
                <img class="img-responsive" src="../uploads/admin_public_post/<?=$res_admin['attach_file']?>" alt="Photo">
              </div>
              <?php }?>
              <br>
      
         
      <div id="container">
          <?php 
              $serial=$_REQUEST['serial'];
              //$s_user_id=$_SESSION['admin_user'];
              $query = "SELECT * FROM `kitt_admin_send_individual_notice` WHERE  `sl_no`='$serial'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)==1){
              While($rec=mysqli_fetch_array($query_exe)){?>
            <div id="chat_box">
                <div id="chat_data">
                    <span style="color:green;"><b>Title: </b></span>
                   <span style="color:brown;"><?php echo $rec['title'] ;?></span>
                </div>

               <div id="chat_data">
                  <span style="color:green;"><b>Notice: </b></span>
                  <span style="color:brown;"><?php echo $rec['notice'] ;?></span>
                  <span style="float:right;"><?php echo $rec['date'].'/'.$rec['time'] ;?></span>
              </div> 
             </div>
            <?php } }?>
          <br>
          <div class="row">
            <div class="col-md-12">
              <a href="admin_post_individual_notice_to_student_view.php" class="btn btn-info" role="button">Back</a>
            </div>
          </div>
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