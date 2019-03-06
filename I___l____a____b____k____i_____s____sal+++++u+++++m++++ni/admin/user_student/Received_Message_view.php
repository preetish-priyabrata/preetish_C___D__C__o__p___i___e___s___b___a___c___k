<?php

	session_start();
	ob_start();
	if($_SESSION['email']){
		require 'FlashMessages.php';
		include '../config.php';
  
	 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// print_r($_REQUEST);
		// Array ( [serial] => 1 [receiver] => 2 [ids_uni] => 1 [friend_id] => 1 ) 
		// 
		// 
	 	$serial_message=$_REQUEST['serial'];
    $serial=$_REQUEST['friend_id'];
		$sender=$_REQUEST['receiver'];
		$ids_uni=$_REQUEST['ids_uni'];

    $check="SELECT * FROM `master_message_send_friend` WHERE `slno`='$serial_message' and `status`='0'";
    $sql_exe_check=mysqli_query($conn,$check);
    $num=mysqli_num_rows($sql_exe_check);
    if($num=="1"){
      $date=date('Y-m-d');
      $time=date('H:i:s');
      $update_query="UPDATE `master_message_send_friend` SET `status`='1',`date_view`='$date',`time_view`='$time' WHERE `slno`='$serial_message'";
      $sql_exe_check=mysqli_query($conn,$update_query);
    }
      $query_friend="SELECT `message_detail` FROM `master_message_send_friend` WHERE `slno`='$serial_message'";
              $sql_exe=mysqli_query($conn,$query_friend);
              $rec2=mysqli_fetch_array($sql_exe);

	  	$query = "SELECT * FROM `master_user_registration` where `sl_no`='$ids_uni'";
        $query_exe = mysqli_query($conn,$query);
        $rec=mysqli_fetch_assoc($query_exe); 
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
    		<!-- end success or errot message alert  -->
    		<div class="col-lg-12 ">
    			<div class="box">
    				<div class="panel panel-default">
    					<div class="panel-heading text-center success"> <?=$rec['name']?></div>
    					<div class="panel-body">
    					
    						<form class="form-horizontal" >
								<div class="form-group">
								    <label class="control-label col-sm-2" for="pwd"></label>
								    <div class="col-sm-10">
								      <input type="hidden" class="form-control" id="pwd" name="serial" value="<?=$serial?>" placeholder="Enter password">
								      <input type="hidden" class="form-control" id="pwd" name="sender" value="<?=$sender?>" placeholder="Enter password">
								       <input type="hidden" class="form-control" id="pwd" name="ids_uni" value="<?=$ids_uni?>" placeholder="Enter password">
								        <input type="hidden" class="form-control" id="pwd" name="user_receiver_name" value="<?=$rec['name']?>" placeholder="Enter password">
								    </div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="comment">Message:</label>
									<div class="col-sm-6">
										<p><?=$rec2['message_detail']?></p>
									</div>
                  <div class="col-sm-4">
                    <?php if(!empty($rec2['attach_file'])){?>
                      <iframe src="../uploads/message<?=$rec2['attach_file']?>" width="335" height="400" ></iframe>
                    <?php }else{
                      ?>
                      <p>No Attachmernt is Received.</p>
                     <?php  }?>

                  </div>
								</div> 
							  	
		          				<br>						        
					        	<div class="form-group text-center">
						        	<a href="Received_Message.php" class="btn btn-info" role="button">Back</a>
						        	<a class="btn btn-primary btn-xs" href="message_friends_form.php?serial=<?=$serial?>&sender=<?=$sender?>&ids_uni=<?=$ids_uni?>&status=2&msg_id=<?=$serial_message?>">Reply</a> 
					        	</div>						       
					       	</form>
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