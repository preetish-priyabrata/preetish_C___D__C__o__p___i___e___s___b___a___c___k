<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Edit Academy";
$A_slno = $_GET['sl_no'];
?>
<style type="text/css">
	.form-control[disabled], .form-control[readonly] {
    color: #223135;
}
</style>
<!--Page Header-->
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
          Edit Academy
          <small>New</small>
        </h1>
        <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Academy</a></li>
           <li class="active"> Edit Academy</li>
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
          <div class="panel-heading"> <h4><b>Academy</b></h4></div>
          <div class="panel-body">
          <br>
          <form class="form-inline" action="admin_accademy_edit_save.php" method="POST">

               <?php
           	    $query ="SELECT * FROM `kiit_accademy` where `A_slno`='$A_slno'";   
             	  $query_exe = mysqli_query($conn,$query);
                if(mysqli_num_rows($query_exe)){          
                while($rec = mysqli_fetch_array($query_exe)){
               ?>
                <?php $msg->display(); ?>

	             <div class="form-group">
	                <label class="control-label col-sm-5" for="A_name">Academy :</label>
	                <div class="col-sm-4">
                    <input type="text"  name="A_name" id="A_name" class="form-control" autocomplete="off" required="" value="<?php echo $rec['A_name'] ;?>">
	               </div>
               </div>

		          <br>
		          <br>
	            <br>
              
 <?php } }?> 
	             <div class="text-center">
	            <input type="submit" name="submit" class="btn btn-info" value="Update" onclick="myFunction()">
	          </div>
          </form>
          </div>
          </div>
          </div>
          </div>
       
          </section>
    <!-- /.content -->
          </div>

        
  <!-- /.content-wrapper -->

<?php
}
else{
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
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>