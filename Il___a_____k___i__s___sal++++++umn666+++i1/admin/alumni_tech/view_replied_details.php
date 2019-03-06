<?php

session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<style type="text/css">
  textarea {
    overflow-y: scroll;
    height: 100px;
    resize: none; /* Remove this if you want the user to resize the textarea */
}
</style>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Replied Details
        <small>New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Query</a></li>
        <li><a href="#">View Queries</a></li>
        <li class="active">Replied Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
          <div id="container">
          <?php 
          $serial=$_REQUEST['serial'];
           $s_user_id=$_SESSION['alumni_tech'];
            $query = "SELECT * FROM `master_queries_student` WHERE `status_answer`='1' and  `slno`='$serial'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)==1){
              While($rec=mysqli_fetch_array($query_exe)){?>
            <div id="chat_box">
                <div id="chat_data">
                    <span style="color:green;"><?php echo $rec['s_user_id'] ;?>: </span>
                    <span style="color:brown;"><?php echo $rec['msg_query_details'] ;?></span>
                    <span style="float:right;"><?php echo $rec['date_query'].'/'.$rec['time_query'] ;?></span>
                </div>
                <div id="chat_data">
                    <span style="color:blue;">Admin: </span>
                    <span style="color:black;"><?php echo $rec['reply_details'] ;?></span>
                    <span style="float:right;"><?php echo $rec['date_reply'].'/'.$rec['time_reply'] ;?></span>
                </div>
            </div>
            <?php } }?>
            <br>
            <!-- <form class="form-inline" action="alumni_sent_query_save.php" method="POST">
              <div class="form-group">
                <label for="email">Query/Issue:</label>
                <textarea name="Query" class="form-control" required="true" autocomplete="off" rows="5" cols="50"></textarea>
                
              </div>
              <br>
              <br>
              <div class="text-center">
                <input type="submit" class="btn btn-info" value="Submit Query">
              </div>
          </form> -->
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