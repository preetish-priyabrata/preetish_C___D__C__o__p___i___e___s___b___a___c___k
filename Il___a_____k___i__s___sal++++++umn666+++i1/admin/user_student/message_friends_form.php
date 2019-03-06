<?php
	session_start();
	ob_start();
	if($_SESSION['email']){
		require 'FlashMessages.php';
		include '../config.php';

	 	$msg = new \Preetish\FlashMessages\FlashMessages();
		// print_r($_REQUEST);
		// Array ( [serial] => 1 [sender] => 2 [ids_uni] => 1 ) 
		// 
		// 
	 	$serial=$_REQUEST['serial'];
		$sender=$_REQUEST['sender'];
		$ids_uni=$_REQUEST['ids_uni'];
    $status=$_REQUEST['status'];

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
        	<li><a href="#"> Message Info </a></li>
       		<li class="active">Send Message</li>
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
    					
    						<form class="form-horizontal" action="message_friends_form_save.php" method="POST" enctype="multipart/form-data">
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
									<div class="col-sm-7">
										<textarea class="form-control" name="Message" rows="5" id="comment" required=""></textarea>
									</div>
                  <div class="col-sm-3">
                    <input type="file" name="file_upload" >
                    <span style="color: red"> Please Upload Photo & PDF Files Only</span>
                  </div>
								</div> 
							  	
		          				<br>						        
					        	<div class="form-group text-center">
                      <?php if($status=="1"){?>
						        	 <a href="friend_message_list.php" class="btn btn-info" role="button">Back</a>
                       <?php }else{
                        $msg_id=$_REQUEST['msg_id'];
                      ?>
                        <a class="btn btn-primary btn-xs" href="Received_Message_view.php?serial=<?=$msg_id?>&receiver=<?=$sender?>&ids_uni=<?=$ids_uni?>&friend_id=<?=$serial?>">Back</a> 
                      <?php }?>
						        	<button type="submit" class="btn btn-default text-center">Submit</button>
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