<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 include '../config.php'
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
          Add Branch
          <small>New</small>
        </h1>
        <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Branch</a></li>
           <li class="active"> Add Branch</li>
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
          <div class="panel-heading"> <h4><b>Branch</b></h4></div>
          <div class="panel-body">
          <br>
          <form class="form-inline" action="admin_branch_add_save.php" method="POST">

              <div class="form-group">
                <label class="control-label col-sm-5" for="B_academy_id">Academy :</label>
                <div class="col-sm-4">
                   <select name="B_academy_id" onchange="detail_site_store()" id="B_academy_id" class="form-control" type="dropdown"  autocomplete="off" required="">
                  <option value="">--Select Academy--</option>
                  <?php 
                    $query_sql="SELECT * FROM `kiit_accademy` WHERE `A_Status`=1";
                        $sql_exe=mysqli_query($conn,$query_sql);
                        while ($result=mysqli_fetch_assoc($sql_exe)) {
                      
                      ?>
                        <option value="<?=$result['A_slno']?>"><?=$result['A_name']?></option>
                      <?php }?>
                </select>
               
                </div>
              </div>

              <br>
              
              <BR>

             
            <div class="form-group">
                <label class="control-label col-sm-5" for="Title">Add Branch :</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" required="true" autocomplete="off"  name="B_branch">
                </div>
              </div>
            
               <br>
              <br>
             <div class="text-center">
            <input type="submit" name="submit" class="btn btn-info" value="Save">
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
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>